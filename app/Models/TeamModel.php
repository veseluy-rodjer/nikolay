<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TeamModel extends Model
{
    protected $table = 'teams';

    public function scopeListing($quest)
    {
        return TeamModel::all();
    }

    
    public function scopeStore($quest, $picture, $name, $profession)
    {
        $add = new TeamModel;
        $add->picture = $picture;
        $add->name = $name;
        $add->profession = $profession;
        $add->save();
    }
    
    public function scopeEdit($quest, $id)
    {
        return TeamModel::find($id);
    }        

    public function scopeUp($quest, $id, $picture, $name, $profession)
    {
        $up = TeamModel::find($id);
        if (!empty($picture)) {
            if ($up->picture != null) {
                $path = array_slice(explode('/', $up->picture), 4);
                $path = implode('/', $path);
                Storage::disk('public')->delete($path);
            }
            $up->picture = $picture;
        }
        $up->name = $name;
        $up->profession = $profession;
        $up->save();        
    }    

    public function scopeDestroy($quest, $id)
    {
        $destroy = TeamModel::find($id);
        if (!empty($destroy->picture)) {
            $path = array_slice(explode('/', $destroy->picture), 4);
            $path = implode('/', $path);
            Storage::disk('public')->delete($path);
         }
         $destroy->delete();         
    }

    public function scopeDelPicture($quest, $id)
    {
        $delPicture = TeamModel::find($id);
        if (!empty($delPicture->picture)) {
            $path = array_slice(explode('/', $delPicture->picture), 4);
            $path = implode('/', $path);
            Storage::disk('public')->delete($path);
        $delPicture->picture = null;
        $delPicture->save();
        }
    }
}
