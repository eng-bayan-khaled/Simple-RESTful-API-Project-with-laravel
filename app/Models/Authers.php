<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authers extends Model
{
    use HasFactory;
    protected $table = 'authers';
    protected $fillable = [
		'name', 'email', 'password',
	];


}
