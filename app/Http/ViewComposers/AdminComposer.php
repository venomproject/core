<?php

namespace App\Http\ViewComposers;

use App\Pages;
use Illuminate\Contracts\View\View;

class AdminComposer {

	protected $parentPages;

	public function __construct() {

		$this->parentPages = Pages::whereNull('pages_id')->where('show_menu', 1)->orderBy('position', 'desc')->get();

	}

	public function compose(View $view) {
		$view->with('parentPages', $this->parentPages);
	}
}