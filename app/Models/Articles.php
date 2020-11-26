<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = [
		'title', 'content', 'auther_id',
	];


	public function auther()
    {
    	return $this->belongsTo(\App\models\Authers::class, 'auther_id', 'id');
    }

    public function keywords()
    {
        return $this->belongsToMany(\App\models\Keywords::class, 'article_keyword', 'article_id', 'keyword_id');
    }
}
