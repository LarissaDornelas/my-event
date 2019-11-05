<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'event';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'date', 'description', 'maxPrice', 'currentPrice', 'created_at',
        'updated_at', 'completed', 'canceled', 'eventCategory_id', 'hour', 'image_url',
    ];

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
    protected $casts = ['completed' => 'boolean', 'canceled' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['date', 'created_at', 'updated_at'];
}
