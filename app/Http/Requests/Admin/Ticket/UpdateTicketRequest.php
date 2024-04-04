<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'agent' => ['string', 'max:255'],
			'title' => ['required', 'string', 'max:255'],
			'description' => ['required', 'string'],
			'category' => ['required', 'string'],
			'label' => ['required', 'string'],
			'priority' => ['required', 'string'],
			'status' => ['required', 'string'],
			'comments' => ['required', 'string', 'max:255'],
		];
	}
}
