<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pages;
use DB;

class SiteController extends Controller
{
    public function show($id,$seo) {
		
		$page = Pages::with('files')->find($id);
		
		
		$file = \File::files ( 'uploads/' . $id.'/thumb' );
		return view ( 'frontend.pages' )->with ( [ 
				'page' => $page
		] );
	}
	
}
