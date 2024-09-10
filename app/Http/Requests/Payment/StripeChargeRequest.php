<?php

namespace App\Http\Requests\Payment;
use App\Http\Requests\FormRequest;

class StripeChargeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'selected_card_number' => [
                'required',
                'exists:user_payment_cards,card_number,user_id,' . auth()->id(),
            ],
            'amount' => [
                'required',
                'numeric',
                'min:1',
            ],
            'cvv_number' => [
                'required',
                'numeric',
                'digits:3',
            ],
        ];
    }

    public function messages()
    {
        return [
            'selected_card_number.required' => 'The card number is required.',
            'selected_card_number.exists' => 'The selected card number is invalid.',
            'amount.required' => 'The amount is required.',
            'amount.numeric' => 'The amount must be numeric.',
            'amount.min' => 'The amount must be at least 1.',
            'cvv_number.required' => 'The CVV number is required.',
            'cvv_number.numeric' => 'The CVV number must be numeric.',
            'cvv_number.digits' => 'The CVV number must be 3 digits.',
        ];
    }
}
