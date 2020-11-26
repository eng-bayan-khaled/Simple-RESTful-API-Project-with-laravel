<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
		'title', 'content', 'status', 'article_id', 'user_id',
	];


	public function article()
    {
    	return $this->belongsTo(\App\models\Articles::class, 'article_id', 'id');
    }

	public function user()
    {
    	return $this->belongsTo(\App\models\User::class, 'user_id', 'id');
    }
}
