<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Slider;
use File;
use Illuminate\Http\Request;

class SliderController extends Controller {

	public function index() {

		$rows = Slider::orderBy('position', 'asc')->paginate(10);

		return view('admin.sliders.index', [
			'rows' => $rows,
			'title' => 'Slider',
		]);
	}

	public function create() {
		return view('admin.sliders.create')->with([
			'title' => 'Nowa strona',
		]);

	}

	public function store(Request $request) {

		$input = $request->all();
		if ($request->file('images') != null) {
			$input['filename'] = $request->file('images')->getClientOriginalName();
			$this->uploadFiles($request->file('images'));
		}

		$newPage = Slider::create($input);

		//dd($newPage);

		return redirect('admin/slider')->with('status', 'Wpis został dodany pomyślnie');
	}

	protected function uploadFiles($file) {

		if (!File::isDirectory('uploads/sliders/')) {
			File::makeDirectory('uploads/sliders/');
		}

		$destinationPath = 'uploads/sliders/';
		$filename = $file->getClientOriginalName();
		$upload_success = $file->move($destinationPath, $filename);

	}

	public function edit($id) {

		if (!File::isDirectory('uploads/sliders/')) {
			File::makeDirectory('uploads/sliders/');
		}

		$page = Slider::findOrFail($id);

		return view('admin.sliders.edit')->with([
			'row' => $page,

			'title' => 'Edycja',

		]);
	}

	public function update(Request $request, $id) {

		$page = Slider::find($id);

		$page->name = $request->input('name');
		$page->description = $request->input('description');

		if ($request->file('images') != null) {
			$page->filename = $request->file('images')->getClientOriginalName();
			$this->uploadFiles($request->file('images'));
		}

		$page->save();

		return redirect('admin/slider')->with('status', 'Wpis został pomyślnie zmodyfikowany');
	}

	public function destroy($id) {

		Slider::destroy($id);

		return redirect('admin/slider')->with('status', 'Wpis został pomyślnie usunięty');
	}

}
