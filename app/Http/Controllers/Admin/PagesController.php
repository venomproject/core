<?php

namespace App\Http\Controllers\Admin;

use App\Files;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\PageRequest;
use App\Pages;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Image;
use Validator;

class PagesController extends Controller {
	public function __construct() {
		/*
			 * $this->beforeFilter ( function () {
			 * } );
		*/
	}
	public function usun($id) {
		dd(request());
	}
	public function seo_generator() {
		return Str::slug(Input::get('name'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$rows = Pages::whereNull('pages_id')->orderBy('position', 'asc')->paginate(20);

		return view('admin.pages.index', [
			'pages' => $rows,
			'title' => 'Lista',
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id = null) {

		$parentCategory = Pages::lists('name', 'id')->prepend('-- brak --', 0);

		return view('admin.pages.create')->with([
			'parentID' => $id,
			'urlPath' => 'pages',
			'title' => 'Nowa strona',
			'parentCategory' => $parentCategory,
		]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(PageRequest $request) {

		$input = $request->all();
		$input['create_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $input['create_date'])->format('Y-m-d');
		$input['public_date'] = \Carbon\Carbon::createFromFormat('d-m-Y', $input['public_date'])->format('Y-m-d');
		$input['show_footer'] = $request->has('show_footer');
		$input['show_menu'] = $request->has('show_menu');
		$input['show_page'] = $request->has('show_page');

		if ($request->input('seo') == null) {
			$input['seo'] = Str::slug($request->input('name'));
		}

		Pages::create($input);
		return redirect('admin/pages')->with('status', 'Wpis został dodany pomyślnie');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function show($id) {
		abort(404);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function edit($id) {

		if (!File::isDirectory('uploads/' . $id)) {
			File::makeDirectory('uploads/' . $id);
			File::makeDirectory('uploads/' . $id . '/thumb');
		}

		$file = Files::where('pages_id', $id)->get();
		$page = Pages::findOrFail($id);

		$parentCategory = Pages::where('id', '!=', $id)->lists('name', 'id')->prepend('-- brak --', 0);

		$childs = Pages::where('pages_id', '=', $id)->orderBy('position', 'asc')->get();

		return view('admin.pages.edit')->with([
			'page' => $page,
			'childs' => $childs,
			'urlPath' => 'pages',
			'title' => 'Edycja',
			'file' => $file,
			'parentCategory' => $parentCategory,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param PageRequest $request
	 * @param int $id
	 * @return Response
	 */
	public function update(PageRequest $request, $id) {
		$files = Input::file('images');

		$file_count = count($files);
		$uploadcount = 0;
		foreach ($files as $file) {
			$rules = array(
				'file' => 'required',
			); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
			$validator = Validator::make(array(
				'file' => $file,
			), $rules);
			if ($validator->passes()) {
				$destinationPath = 'uploads/' . $id;
				$filename = $file->getClientOriginalName();
				$upload_success = $file->move($destinationPath, $filename);

				$photo = new Files();
				$photo->name = $filename;
				$photo->file_name = $filename;
				$photo->pages_id = $id;
				if ($file_count - 1 == $uploadcount) {
					$photo->masterPhoto = 1;
				}

				$photo->save();

				$img = \Image::make('uploads/' . $id . '/' . $filename);
				$img->resize(320, 240);
				$img->save('uploads/' . $id . '/thumb/' . $filename);

				$uploadcount++;
			}
		}

		if ($request->input('filename') != null) {

			foreach ($request->input('filename') as $key => $value) {
				$rowFile = Files::find($key);

				if ($request->input('remove.' . $key)) {
					File::delete('uploads/' . $id . '/' . $rowFile->name);
					File::delete('uploads/' . $id . '/thumb/' . $rowFile->name);
					Files::find($key)->delete();
				}

				$rowFile->file_name = $value;

				if ($request->input('masterPhoto.' . $key)) {
					$rowFile->masterPhoto = 1;
				}

				$rowFile->save();

			}
		}
		$page = Pages::find($id);

		$page->name = $request->input('name');
		$page->description = $request->input('description');
		$page->create_date = \Carbon\Carbon::createFromFormat('d-m-Y', $request['create_date'])->format('Y-m-d');
		$page->public_date = \Carbon\Carbon::createFromFormat('d-m-Y', $request['public_date'])->format('Y-m-d');
		$page->show_footer = $request->has('show_footer');
		$page->show_menu = $request->has('show_menu');
		$page->show_page = $request->has('show_page');

		$page->pages_id = ($request->input('pages_id') != 0) ? $request->input('pages_id') : null;
		$page->seo = Str::slug($request->input('seo'));
		$page->meta_keywords = $request->input('meta_keywords');
		$page->meta_description = $request->input('meta_description');
		$page->meta_title = $request->input('meta_title');

		$page->save();

		return redirect('admin/pages')->with('status', 'Wpis został pomyślnie zmodyfikowany');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id) {
		Pages::destroy($id);
		return redirect('admin/pages')->with('status', 'Wpis został pomyślnie usunięty');
	}

	public function changePosition(Request $request) {

		$id = $request->input('itemID');
		$position = $request->input('itemIndex');

		$page = Pages::find($id);
		$page->position = $position;
		$page->save();

		return 'success';
	}
}
