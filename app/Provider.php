<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'provider';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone', 'description', 'providerCategory_id', 'website', 'email', 'instagram_name', 'facebook_name', 'active'];

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
}
