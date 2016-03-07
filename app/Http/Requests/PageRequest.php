<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PageRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {

		return [
			'name' => 'required',
			'create_date' => 'required|date_format:d-m-Y',
			'public_date' => 'required|date_format:d-m-Y',
		];
	}

	public function messages() {
		return [
			'same' => 'The :attribute and :other must match.',
			'size' => 'The :attribute must be exactly :size.',
			'between' => 'The :attribute must be between :min - :max.',
			'in' => 'The :attribute must be one of the following types: :values',
			'name.required' => 'nazwa jeest kiepska! haha',
		];
	}
}
