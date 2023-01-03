<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class policy extends Model
{
    use HasFactory;
    public $table = 'policy';

    protected $fillable =[
        'policy_title',
        'policy_desc',
        'policy_link',
        'policy_image',
    ];
}
