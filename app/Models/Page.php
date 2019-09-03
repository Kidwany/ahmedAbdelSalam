<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['url', 'name', 'description', 'key_words', 'open_graph_id'];

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


    public function blog()
    {
        return $this->hasOne(Blog::class, 'page_id', 'id');
    }

    public function open_graph()
    {
        return $this->belongsTo(Open_graph::class, 'open_graph_id', 'id');
    }

    public function service()
    {
        return $this->hasOne(Service::class, 'page_id', 'id');
    }


}
