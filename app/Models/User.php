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
    protected function role_as(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 'dfsd'.$value,
        );
        // if($value == '1'){
        //     return 'admin';
        //   }else if($value == '2'){
        //     return 'hr';
        //   }else if($value == '3'){
        //       return 'user';
        //   }else {
        //     return 'inten';
        //   }
    }
    public function getrole()
    {
       return $this->role[$this->attributes['role_as']];
    }   

}
