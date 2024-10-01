<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailing extends Model
{
    use HasFactory;
    protected $fillable = ([
        "name", 
        "email",
        "phone",
        "message",
        "priority",
        "read"
    ]);
}
