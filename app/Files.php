<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
     protected $fillable = [
        'name','masterPhoto'
    ];
	
	
	public function Files()
    {
        return $this->belongsTo ('App\Pages', 'pages_id');
    }
}
