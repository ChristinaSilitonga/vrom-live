<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PharIo\Manifest\Author;

class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'item_id' => 'requred|integer|exists:items, id',
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'total' => 'required|numeric',
            'status' => 'required|string|in:PENDING, SUCCESS, CANCEL',
            'address' => 'nullable|text',
            'city' => 'nullable|text|max:255',
            'zip' => 'nullable|numeric',
            'status.*' => 'pending|max:255',
            'payment_method' => 'midtrans|max:255',
            'payment_status' => 'pending|max:255',
            'payment_url' => 'nullable|string|max:255',
            'total_price' => 'int|numeric',
            'star' => 'nullable|numeric',
            'review' => 'nullable|numeric',
            'user_id' => 'required|integer|exists:user,id',

        ];
    }
}