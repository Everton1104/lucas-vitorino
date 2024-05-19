<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Whats extends Model
{
    protected $table = "whats";
    protected $fillable = ['whats', 'nome', 'password', 'remember_token'];
}
