<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BlogModel;

use App\Models\CommentModel;

use App\Http\Requests\StoreBlogPost;

use App\Http\Requests\StoreBlogComment;

class BlogController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('checkBlog')->only('edit', 'del', 'more', 'addCommentPost');
    }

    public function index()
    {
        $listing = BlogModel::listing();
        $date = ['title' => 'Сайты-визитки. Блог', 'listing' => $listing];
        return view('blog', $date);
    }
    
    public function addingGet()
    {
        $date = ['title' => 'Сайты-визитки. Блог'];
        return view('blog/adding', $date);
    }

    public function addingPost(StoreBlogPost $request)
    {
        $picture = null;
        if (!empty($request->picture)) {
            $request->picture->storeAs('public/blog', $request->picture->getClientOriginalName());
            $picture = asset('storage/blog/' . $request->picture->getClientOriginalName());
        }
        BlogModel::addingPost($picture, $request->topic, $request->tell);
        return redirect('blog');
    }

    public function editGet($id)
    {
        $edit = BlogModel::editGet($id);
        $date = ['title' => 'Сайты-визитки. Блог', 'edit' => $edit];
        return view('blog/edit', $date);

    }

    public function editPost(StoreBlogPost $request, $id)
    {
        $picture = null;
        if (!empty($request->picture)) {
            $request->picture->storeAs('public/blog', $request->picture->getClientOriginalName());
            $picture = asset('storage/blog/' . $request->picture->getClientOriginalName());
        }
        BlogModel::editPost($id, $picture, $request->topic, $request->tell);
        return redirect('blog');
    }
    
    public function del($id)
    {
        BlogModel::del($id);
        return redirect('blog');
    }

    public function more($id)
    {
        $more = BlogModel::editGet($id);
        $comments = CommentModel::listComments($id);
        $date = ['title' => 'Сайты-визитки. Блог', 'more' => $more, 'comments' => $comments];
        return view('blog/more', $date);
    }

    public function addCommentGet()
    {
        $date = ['title' => 'Сайты-визитки. Блог'];
        return view('blog/addComment', $date);
    }

    public function addCommentPost(StoreBlogComment $request, $id)
    {
        CommentModel::addCommentPost($id, $request->name, $request->comment);
        return redirect('blog/more/' . $id);
    }

    public function delComment($id)
    {
        CommentModel::delComment($id);
        return redirect('blog/more/' . $id);
    }

}
