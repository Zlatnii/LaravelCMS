<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class Page extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = true;

    protected $fillable = [
        'img_path',
        'title',
        'slug',
        'subtitle',
        'content',
    ];

    public function user()
    {   
        return $this->belongsTo(User::class);
    }
}
