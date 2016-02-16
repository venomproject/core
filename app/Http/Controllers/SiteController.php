<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Pages;

class SiteController extends Controller {
	
	public function show($id, $seo) {
		$page = Pages::with ( 'files' )->findOrFail ( $id );
		
		$file = \File::files ( 'uploads/' . $id . '/thumb' );
		return view ( 'frontend.pages' )->with ( [ 
				'page' => $page 
		] );
	}
	
	public function index() {
		
		return view ( 'home' );
	}
}
