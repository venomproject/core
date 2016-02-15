<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;

class FileController extends Controller {
	
	public function upload($id) {
		
		$files = Input::file ( 'images' );
		
		
		dd($files);
		$file_count = count ( $files );
		$uploadcount = 0;
		foreach ( $files as $file ) {
			$rules = array (
					'file' => 'required',
					'required|mimes:png,jpg,gif,jpeg,txt,pdf,doc'
			); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
			$validator = Validator::make ( array (
					'file' => $file 
			), $rules );
			if ($validator->passes ()) {
				$destinationPath = 'uploads';
				$filename = $file->getClientOriginalName ();
				$upload_success = $file->move ( $destinationPath, $filename );
				$uploadcount ++;
			}
		}
		if ($uploadcount == $file_count) {
			echo 'Wpis został dodany pomyślnie' ;
			//return redirect ( 'admin/pages' )->with ( 'status', 'Wpis został dodany pomyślnie' );
		} else {
			dd($validator);
			return Redirect::to ( 'upload' )->withInput ()->withErrors ( $validator );
		}
	}
}