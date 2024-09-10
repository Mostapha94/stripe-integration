<?php

namespace App\Http\Requests\Payment;
use App\Http\Requests\FormRequest;

class SaveCardDetailsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'card_number' => [
                'required',
                'numeric',
                'digits:16',
                'unique:user_payment_cards,card_number'
            ],
            'expiry_date' => [
                'required',
                'date_format:m/y',
            ],
            'card_holder_name' => [
                'required',
                'string',
            ],
        ];
    }

    public function messages()
    {
        return [
            'card_number.required' => 'The card number is required.',
            'card_number.numeric' => 'The card number must be numeric.',
            'card_number.digits' => 'The card number must be 16 digits.',
            'expiry_date.required' => 'The expiry date is required.',
            'expiry_date.date_format' => 'The expiry date must be in the format MM/YY.',
            'card_holder_name.required' => 'The card holder name is required.',
            'card_holder_name.string' => 'The card holder name must be a string.',
        ];
    }
}
