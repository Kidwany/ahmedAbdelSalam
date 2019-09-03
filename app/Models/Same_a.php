<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Same_a extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'same_as';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url', 'rel', 'item_prop', 'created_by'];

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

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
