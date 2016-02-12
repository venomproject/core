<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Pages;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

class PagesController extends Controller {
	public function __construct() {
		/*
		 * $this->beforeFilter ( function () {
		 * } );
		 */
	}
	public function usun($id) {
		dd ( request () );
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		
		// return Pages::first();
		$rows = Pages::orderBy ( 'id', 'desc' )->paginate ( 10 );
		
		//$rows = DB::table('pages')->select('name', 'description','id','position')->get();
		
		
		return view ( 'admin.pages.index', [ 
				'pages' => $rows,
				'title' => 'Lista'
		] );
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view ( 'admin.pages.create' );
		//
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request        	
	 * @return Response
	 */
	public function store(Request $request) {
		$messages = [ 
				'same' => 'The :attribute and :other must match.',
				'size' => 'The :attribute must be exactly :size.',
				'between' => 'The :attribute must be between :min - :max.',
				'in' => 'The :attribute must be one of the following types: :values',
				'name.required' => 'nazwa jeest kiepska!' 
		]; // indywidualne tlumaczenie
		   
		// tlumczenia globalne / resorces/lang/en/validation.php
		
		$this->validate ( $request, [ 
				'name' => 'required',
				'create_date' => 'required',
				'description' => 'required' 
		], $messages );
		
		$input = $request->all ();
		$input ['create_date'] = \Carbon\Carbon::createFromFormat ( 'd-m-Y', $input ['create_date'] )->format ( 'Y-m-d' );
		$input ['public_date'] = \Carbon\Carbon::createFromFormat ( 'd-m-Y', $input ['public_date'] )->format ( 'Y-m-d' );
		Pages::create ( $input );
		return redirect ( 'admin/pages' )->with ( 'status', 'Wpis został dodany pomyślnie' );
		
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function show($id) {
		echo 'aa';
		dd ();
		//
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function edit($id) {
		$page = Pages::find ( $id );
		return view ( 'admin.pages.edit' )->with (['urlPath' => 'pages','title' => 'Edycja', 'page' => $page] );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request        	
	 * @param int $id        	
	 * @return Response
	 */
	public function update(Request $request, $id) {
		//
		$messages = [ 
				'same' => 'The :attribute and :other must match.',
				'size' => 'The :attribute must be exactly :size.',
				'between' => 'The :attribute must be between :min - :max.',
				'in' => 'The :attribute must be one of the following types: :values',
				'name.required' => 'nazwa jeest kiepska!' 
		]; // indywidualne tlumaczenie
		   
		// tlumczenia globalne / resorces/lang/en/validation.php
		
		$this->validate ( $request, [ 
				'name' => 'required',
				'create_date' => 'required',
				'public_date' => 'required',
				'description' => 'required' 
		], $messages );
		
		;
		
		$page = Pages::find ( $id );
		$page->name = $request->input ( 'name' );
		$page->description = $request->input ( 'description' );
		$page->create_date = \Carbon\Carbon::createFromFormat('d-m-Y', $request ['create_date'])->format('Y-m-d');
		$page->public_date = \Carbon\Carbon::createFromFormat('d-m-Y', $request ['public_date'])->format('Y-m-d');
		$page->show_footer = $request->has ( 'show_footer' );
		$page->show_menu = $request->has ( 'show_menu' );
		$page->show_page = $request->has ( 'show_page' );
		
		
		
		$page->seo = Str::slug($request->input ( 'name' )); 
		$page->meta_keywords = $request->input ( 'meta_keywords' );
		$page->meta_description = $request->input ( 'meta_description' );
		$page->meta_title = $request->input ( 'meta_title' );
		
		$page->save ();
		
		
		// Pages::create ( $request->all () );
		return redirect ( 'admin/pages' )->with ( 'status', 'Wpis został pomyślnie zmodyfikowany' );
		
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id        	
	 * @return Response
	 */
	public function destroy($id) {
		Pages::destroy ( $id );
		return redirect ( 'admin/pages' )->with ( 'status', 'Wpis został pomyślnie usunięty' );
	}
}
