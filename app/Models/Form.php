<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'form';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'formId', 'page_id', 'tracking_id', 'header_code', 'body_code'];

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

    public function service()
    {
        return $this->hasOne(Service::class, 'form_id', 'id')->with('clinic_en');
    }

}
