<?php

namespace App\Repositories;

use App\Models\PaymentCard;

class PaymentCardRepository implements PaymentCardRepositoryInterface
{
    /**
     * Save the credit card details to the user's profile.
     *
     * @param array $data The credit card details.
     * @return void
     */
    public function saveCardDetails(array $data)
    {
        PaymentCard::create([
            'user_id' => auth()->id(),
            'card_number' => $data['card_number'],
            'expiry_month' => $data['expiry_month'],
            'expiry_year' => $data['expiry_year'],
            'card_holder_name' => $data['card_holder_name'],
        ]);
    }
}

