<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller;
use App\Slider;
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
		}

		$newPage = Slider::create($input);

		//dd($newPage);
		//$this->uploadFiles($newPage['id'], $request->only('filename', 'remove', 'masterPhoto'));
		return redirect('admin/slider')->with('status', 'Wpis został dodany pomyślnie');
	}

	protected function uploadFiles($pageID, $fileData) {
		if (!File::isDirectory('uploads/' . $pageID)) {
			File::makeDirectory('uploads/' . $pageID);
			File::makeDirectory('uploads/' . $pageID . '/thumb');
		}
	}

}
