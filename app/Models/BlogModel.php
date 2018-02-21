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
            $path = explode('/', $del->picture);
            $path[1] = 'public';
            Storage::delete(implode('/', $path));
         }
         $del->delete();         
    }

    public function scopeDelPicture($quest, $id)
    {
        $delPicture = BlogModel::find($id);
        if (!empty($delPicture->picture)) {
            $path = explode('/', $delPicture->picture);
            $path[1] = 'public';
            Storage::delete(implode('/', $path));
        $delPicture->picture = null;
        $delPicture->save();
        }
    }

    public function comments()
    {
        return $this->hasMany('App\Models\CommentModel');
    }
}