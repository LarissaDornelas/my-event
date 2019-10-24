<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


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
    protected $fillable = ['id', 'name', 'cpf', 'phone', 'email',  'active', 'admin', 'cellPhone', 'password'];
    protected $hidden = ['remember_token'];
    //protected $primaryKey = 'id';


    //protected $fillable = ['id', 'name', 'cpf', 'phone', 'email',  'active', 'admin', 'cellPhone', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    //protected $hidden = [];

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
