<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keywords extends Model
{
    use HasFactory;

    protected $table = 'Keywords';
    protected $fillable = [
		'name',
	];


	public function articles()
    {
        return $this->belongsToMany(\App\models\Articles::class, 'movie-article_keyword', 'keyword_id', 'article_id');
    }
}
