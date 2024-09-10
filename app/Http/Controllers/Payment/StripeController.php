<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StripeChargeRequest;
use App\Models\PaymentCard;
use App\Traits\ApiResponse;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Token;
use Exception;

class StripeController extends Controller
{
    use ApiResponse;

    /**
     * Charge a customer using Stripe.
     *
     * @param StripeChargeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function charge(StripeChargeRequest $request)
    {
        try {
            $stripeToken = $this->getStripeToken($request);

            Stripe::setApiKey(config('services.stripe.secret'));

            // Create a new stripe customer
            $customer = Customer::create([
                'email' => auth()->user()->email,
                'source' => $stripeToken->id,
            ]);

            // Charge
            Charge::create([
                'customer' => $customer->id,
                'amount' => $request->amount*100,
                'currency' => 'usd',
            ]);

            return $this->success('Payment successful');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Get the stripe token.
     *
     * @param StripeChargeRequest $request
     * @return string
     */
    private function getStripeToken(StripeChargeRequest $request)
    {
        $selectedCard = PaymentCard::where('user_id', auth()->id())
            ->where('card_number', $request->selected_card_number)
            ->first();
            if (!$selectedCard) {
                throw new Exception('Card not found');
            }

        Stripe::setApiKey(config('services.stripe.key'));

        return Token::create(array(
            "card" => array(
              "number"    => $selectedCard->card_number,
              "exp_month" => $selectedCard->expiry_month,
              "exp_year"  => $selectedCard->expiry_year,
              "cvc"       => $request->cvv_number,
              "name"      => auth()->user()->name
        )));
    }
}
