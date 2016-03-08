<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model {
	protected $fillable = [
		'name',
		'description',
		'show_menu',
		'show_home',
		'show_footer',
		'show_page',
		'public_date',
		'create_date',
		'seo',
		'meta_keywords',
		'meta_description',
		'meta_title',
		'position',
		'pages_id',
	];

	public function Files() {
		return $this->hasMany('App\Files', 'pages_id');
	}

	public function Languages() {
		return $this->HasOne('App\Languages', 'id');
	}
}
