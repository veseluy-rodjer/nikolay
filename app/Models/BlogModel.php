<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CommentModel;
use Illuminate\Support\Facades\Storage;

class BlogModel extends Model
{
    protected $table = 'blogs';

    public function scopeListing()
    {
        return BlogModel::orderBy('id', 'desc')->get();
    }

     public function scopeAddingPost($quest, $picture, $topic, $tell)
    {
        $add = new BlogModel;
        $add->picture = $picture;
        $add->topic = $topic;
        $add->tell = $tell;
        $add->save();
    }

     public function scopeEditGet($quest, $id)
    {
        return BlogModel::find($id);
    }        

     public function scopeEditPost($quest, $id, $picture, $topic, $tell)
    {
        $edit = BlogModel::find($id);
        if (!empty($picture)) {
            if (!empty($edit->picture)) {
                $count = BlogModel::where('picture', $edit->picture)->count();
                if ($count == 1) {
                    $path = explode('/', $edit->picture);
                    Storage::delete('public/blog/' . end($path));
                }
            }
            $edit->picture = $picture;
        }
        $edit->topic = $topic;
        $edit->tell = $tell;
        $edit->save();        
    }        

    public function scopeDel($quest, $id)
    {
        $del = BlogModel::find($id);
        if (!empty($del->picture)) {
            $count = $del::where('picture', $del->picture)->count();
            if ($count == 1) {
                $path = explode('/', $del->picture);
                Storage::delete('public/blog/' . end($path));
            }
        }
        $del->comments()->delete();
        $del->delete();
    }

    public function scopeDelPicture($quest, $id)
    {
        $delPicture = BlogModel::find($id);
        if (!empty($delPicture->picture)) {
            $count = $delPicture::where('picture', $delPicture->picture)->count();
            if ($count == 1) {
                $path = explode('/', $delPicture->picture);
                Storage::delete('public/blog/' . end($path));
            }
            $delPicture->picture = null;
            $delPicture->save();
        }
    }

    public function comments()
    {
        return $this->hasMany('App\Models\CommentModel');
    }
}
