<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Open_graph extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'open_graph';
    protected $connection = 'mysql';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['og_title', 'og_type', 'og_url', 'og_image', 'image_url', 'og_description', 'og_site_name'];

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

    public function open_graph_image()
    {
        return $this->belongsTo(Image::class, 'og_image', 'id');
    }



}
