<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BlogModel;

class CommentModel extends Model
{
    protected $table = 'comments';
    
    public function scopeListing()
    {
        return CommentModel::orderBy('id', 'desc')->get();
    }

    public function scopeAddCommentPost($quest, $id, $name, $comment)
    {
        $blog = BlogModel::find($id);
        $add = new CommentModel;
        $add->name = $name;
        $add->comment = $comment;
        $blog->comments()->save($add);
    }

    public function scopeDelComment($quest, $id)
    {
        $del = CommentModel::find($id);
        $del->delete();
    }

    public function scopeListComments($quest, $id)
    {
        return BlogModel::find($id)->comments;
    }        

    public function blogs()
    {
        return $this->belongsTo('App\Models\BlogModel');
    }    

}
