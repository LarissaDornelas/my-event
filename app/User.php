<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{



    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'cpf', 'phone', 'email',  'active', 'admin', 'cellPhone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['active' => 'boolean', 'admin' => 'boolean'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
}
