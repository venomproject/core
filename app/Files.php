<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {
	protected $fillable = [
		'name', 'masterPhoto', 'pages_id',
	];

	public function Files() {
		return $this->belongsTo('App\Pages', 'pages_id');
	}
}
