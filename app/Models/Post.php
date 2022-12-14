<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'category_id'];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function tags() {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    // formatto testo
    public function getAbstract() {
        return substr($this->content, 0, 50) .'...';
    }

    // formatto data

    public function getCreatedAt()
    {
        $date = new Carbon($this->created_at);
        
       
        return $date->format('d/m/Y H:i');
    }

    public function getUpdatedAt()
    {
        $date = new Carbon($this->updated_at);
        
       
        return $date->format('d/m/Y H:i');
    }


    // public function getUpdatedAt()
    // {
    //     return $this->updated_at->format('d/m/Y H:i');
    // }

}
