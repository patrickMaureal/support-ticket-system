<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'name' => ['required', 'string', 'max:255'],
			'email' => [
				'required',
				'email:rfc,dns,spoof,filter',
				Rule::unique('users', 'email')->whereNull('deleted_at'),
			],
		];
	}
}
