<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CommentModel;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\StoreBlogComment;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkId')->only('editGet', 'del', 'delPicture', 'more', 'addCommentGet', 'delComment', 'like');
    }

    public function index()
    {
        $listing = BlogModel::listing();
        $date = ['title' => 'Сайты-визитки. Блог', 'listing' => $listing];
        return view('blog', $date);
    }

    public function addingGet()
    {
        $this->authorize('before', BlogModel::class);
        $date = ['title' => 'Сайты-визитки. Блог'];
        return view('blog/adding', $date);
    }

    public function addingPost(StoreBlogPost $request)
    {
        $this->authorize('before', BlogModel::class);
        $picture = null;
        if (!empty($request->picture)) {
            $picture = Storage::disk('public')->url($request->picture->store('blog', 'public'));
        }
        BlogModel::addingPost($picture, $request->topic, $request->tell);
        return redirect('blog');
    }

    public function editGet($id)
    {
        $this->authorize('before', BlogModel::class);
        $more = BlogModel::editGet($id);
        $comments = CommentModel::listComments($id);
        $date = ['title' => 'Сайты-визитки. Блог', 'more' => $more, 'comments' => $comments];
        return view('blog/edit', $date);
    }

    public function editPost(StoreBlogPost $request, $id)
    {
        $this->authorize('before', BlogModel::class);
        $picture = null;
        if (!empty($request->picture)) {
            $picture = Storage::disk('public')->url($request->picture->store('blog', 'public'));
        }
        BlogModel::editPost($id, $picture, $request->topic, $request->tell);
        return redirect('blog');
    }

    public function del($id)
    {
        $this->authorize('before', BlogModel::class);
        BlogModel::del($id);
        return redirect('blog');
    }

    public function delPicture($id)
    {
        $this->authorize('before', BlogModel::class);
        BlogModel::delPicture($id);
        return back();
    }

    public function more($id)
    {
        $more = BlogModel::editGet($id);
        $comments = CommentModel::listComments($id);
        $date = ['title' => 'Сайты-визитки. Блог', 'more' => $more, 'comments' => $comments];
        return view('blog/more', $date);
    }

    public function addCommentGet($id)
    {
        $more = BlogModel::editGet($id);
        $comments = CommentModel::listComments($id);
        $date = ['title' => 'Сайты-визитки. Блог', 'more' => $more, 'comments' => $comments];
        return view('blog/addComment', $date);
    }

    public function addCommentPost(StoreBlogComment $request, $id)
    {
        CommentModel::addCommentPost($id, $request->name, $request->comment);
        return redirect('blog/more/' . $id);
    }

    public function delComment($id)
    {
        $this->authorize('before', CommentModel::class);
        CommentModel::delComment($id);
        return back();
    }

    public function like($id)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        BlogModel::like($id, $ip);
        return back();
    }
}
