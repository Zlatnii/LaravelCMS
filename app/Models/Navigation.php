<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Page;

class Navigation extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'page',
    ];

    public function page(){
        $this->hasMany(Page::class);
    }
}



