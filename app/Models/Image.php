<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    protected $table = 'image';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path', 'album_id', 'alt'];

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

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class, 'clinic_images', 'image_id', 'clinic_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

}
