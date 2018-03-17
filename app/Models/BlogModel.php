<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CommentModel;
use App\Models\IpModel;
use Illuminate\Support\Facades\Storage;

class BlogModel extends Model
{
    protected $table = 'blogs';

    public function scopeListing()
    {
        return BlogModel::orderBy('id', 'desc')->paginate(10);
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
            if ($edit->picture != null) {
                $path = array_slice(explode('/', $edit->picture), 4);
                $path = implode('/', $path);
                Storage::disk('public')->delete($path);
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
            $path = array_slice(explode('/', $del->picture), 4);
            $path = implode('/', $path);
            Storage::disk('public')->delete($path);
         }
         $del->comments()->delete();
         $del->ips()->delete();
         $del->delete();         
    }

    public function scopeDelPicture($quest, $id)
    {
        $delPicture = BlogModel::find($id);
        if (!empty($delPicture->picture)) {
            $path = array_slice(explode('/', $delPicture->picture), 4);
            $path = implode('/', $path);
            Storage::disk('public')->delete($path);
        $delPicture->picture = null;
        $delPicture->save();
        }
    }
    
    public function scopeLike($quest, $id, $ip)
    {
        $like = BlogModel::find($id);
        if ($like->ips()->where('ip', $ip)->count() == 0) {
            $ips = new IpModel;
            $ips->ip = $ip;
            $like->ips()->save($ips);
            $like->like += 1;
            $like->save();
        }
        else {
            $like->ips()->where('ip', $ip)->delete();
            $like->like -= 1;
            $like->save();
        }
    }        
    

    public function comments()
    {
        return $this->hasMany('App\Models\CommentModel');
    }
    
    public function ips()
    {
        return $this->hasMany('App\Models\IpModel');
    }
}
