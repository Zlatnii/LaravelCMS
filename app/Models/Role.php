<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class Role extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = true;


    protected $fillable = [
        'name',
        'slug',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}


