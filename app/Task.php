<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'date', 'category_id', 'priority', 'completed', 'event_id', 'attributed', 'created_by'];

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
}
