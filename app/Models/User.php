<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $role = [
        '1' => 'Admin',
        '2' => 'Hr',
        '3' => 'Team Leader',
        '4' => 'Users',
        '5' => 'Intern',
    ];
    
    public function geEmployeeRole()
    {
       return $this->role[$this->attributes['role_as']];
    }   
    public function getrole(){
        $role = [
            '1' => 'Admin',
            '2' => 'Hr',
            '3' => 'Team Leader',
            '4' => 'Users',
            '5' => 'Intern',
        ];
        return $role;
    }

}
