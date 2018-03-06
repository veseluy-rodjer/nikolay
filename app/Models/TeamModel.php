<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
    protected $table = 'teams';
    
    public function scopeAddingTeam($quest, $picture, $name, $profession)
    {
        $add = new TeamModel;
        $add->picture = $picture;
        $add->topic = $topic;
        $add->tell = $tell;
        $add->save();
    }
    
    public function scopeEditGet($quest, $id)
    {
        return TeamModel::find($id);
    }        

    public function scopeEditPost($quest, $id, $picture, $name, $profession)
    {
        $edit = TeamModel::find($id);
        if (!empty($picture)) {
            $edit->picture = $picture;
        }
        $edit->name = $name;
        $edit->profession = $profession;
        $edit->save();        
    }    

    public function scopeDel($quest, $id)
    {
        $del = TeamModel::find($id);
        if (!empty($del->picture)) {
            $path = explode('/', $del->picture);
            $path[1] = 'public';
            Storage::delete(implode('/', $path));
         }
         $del->delete();         
    }

    public function scopeDelPicture($quest, $id)
    {
        $delPicture = TeamModel::find($id);
        if (!empty($delPicture->picture)) {
            $path = explode('/', $delPicture->picture);
            $path[1] = 'public';
            Storage::delete(implode('/', $path));
        $delPicture->picture = null;
        $delPicture->save();
        }
    }
    
    
}
