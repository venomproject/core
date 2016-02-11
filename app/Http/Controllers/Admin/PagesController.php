<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Pages;
use Illuminate\Http\Request;

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
		$rows = Pages::orderBy ( 'id', 'desc' )->paginate ( 5 );
		
		return view ( 'admin.pages.index', [ 
				'pages' => $rows 
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
		
		/*
		 * $student = new Student();
		 * $student->imie = $request->imie;
		 * $student->nazwisko = $request->nazwisko;
		 * $student->adres = $request->adres;
		 * $student->kod_pocztowy = $request->kod_pocztowy;
		 * $student->miejscowosc = $request->miejscowosc;
		 * $student->telefon = $request->telefon;
		 * $student->save();
		 *
		 * return Redirect::to('new/request')->withInput();
		 */
		//
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
		return view ( 'admin.pages.edit' )->with ( 'page', $page );
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
		
		// $input['create_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $input['create_date'])->format('Y-m-d');
		// $input['public_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $input['public_date'])->format('Y-m-d');
		
		// $request->input('confirm', false);
		
		$page = Pages::find ( $id );
		$page->name = $request->input ( 'name' );
		$page->description = $request->input ( 'description' );
		$page->create_date = \Carbon\Carbon::createFromFormat ( 'd-m-Y', $request ['create_date'] )->format ( 'Y-m-d' );
		$page->public_date = \Carbon\Carbon::createFromFormat ( 'd-m-Y', $request ['public_date'] )->format ( 'Y-m-d' );
		$page->show_footer = $request->has ( 'show_footer' );
		$page->show_menu = $request->has ( 'show_menu' );
		
		$page->seo = $request->input ( 'seo' );
		$page->meta_keywords = $request->input ( 'meta_keywords' );
		$page->meta_description = $request->input ( 'meta_description' );
		$page->meta_title = $request->input ( 'meta_title' );
		
		$page->save ();
		
		echo $id;
		
		dd ( $page );
		diE ();
		
		// Pages::create ( $request->all () );
		return redirect ( 'admin/pages' )->with ( 'status', 'Wpis został dodany pomyślnie' );
		
		echo 'aastaa';
		die ();
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
