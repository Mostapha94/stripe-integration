<?php

namespace App\Repositories;

interface PaymentCardRepositoryInterface
{
    /**
     * Save the user card details to the user's profile.
     *
     * @param array $data The user card details.
     * @return void
     */
    public function saveCardDetails(array $data);
}
