<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use App\Pages;
class FrontendComposer
{
    
    protected $header_menu;
	protected $footer_menu;

    public function __construct()
    {
        
        $this->footer_menu = Pages::with ( 'files' )->where('show_page',1)->where('public_date' ,'<=', date('Y-m-d'))->where('show_footer', 1)->get();
		
		$this->header_menu = Pages::with ( 'files' )->where('show_page',1)->where('public_date' ,'<=', date('Y-m-d'))->where('show_menu', 1)->get();
    }

    public function compose(View $view)
    {
		$view->with('header_menu', $this->header_menu);
        $view->with('footer_menu', $this->footer_menu);
    }
}