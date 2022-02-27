<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = ['uuid','username','firstName','lastName','email','password'];
    protected $primaryKey = 'uuid';
    public $incrementing = false;
}
