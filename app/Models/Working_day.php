<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Working_day extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'working_days';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [];

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


    public function working_days_ar()
    {
        return $this->hasOne(\App\Models\Arabic\Working_day::class, 'working_days_id', 'id');
    }

    public function working_days_en()
    {
        return $this->hasOne(\App\Models\English\Working_day::class, 'working_days_id', 'id');
    }
}
