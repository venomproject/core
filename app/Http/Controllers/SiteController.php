<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Pages;
use Auth;

class SiteController extends Controller {

	public $activePages;
	public $navigation;
	public function __construct() {
		$this->activePages = Pages::with('files')->where('show_page', 1)->where('public_date', '<=', date('Y-m-d'));
	}

	public function index() {
		return view('home')->with([
			'page' => $this->activePages->first(),
		]);
	}

	public function show($id, $seo) {
		return view('frontend.pages')->with([
			'page' => $this->activePages->findOrFail($id),
		]);
	}

	public function prev($id, $seo) {

		if (Auth::check()) {
			echo 'tak';
		} else {
			echo 'nie';
		}

		$prev = Pages::with('files')->findOrFail($id);
		return view('frontend.pages')->with([
			'page' => $prev,
		]);
	}
}