<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blog';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['image_id', 'created_by',  'page_id', 'open_graph_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    public function blog_ar()
    {
        return $this->hasOne(\App\Models\Arabic\Blog::class, 'blog_id', 'id');
    }

    public function blog_en()
    {
        return $this->hasOne(\App\Models\English\Blog::class, 'blog_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }

    public function openGraph()
    {
        return $this->belongsTo(Open_graph::class, 'open_graph_id', 'id');
    }

}
