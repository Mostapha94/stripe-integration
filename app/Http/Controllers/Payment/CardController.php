<?php

namespace App\Http\Controllers\Payment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\SaveCardDetailsRequest;
use App\Repositories\PaymentCardRepositoryInterface;
use App\Traits\ApiResponse;
class CardController extends Controller
{
    use ApiResponse;

    /**
     * The PaymentCardRepository instance.
     *
     * @var \App\Repositories\PaymentCardRepositoryInterface
     */
    private $paymentCard;

    /**
     * Create a new CardController instance.
     *
     * @return void
     */
    public function __construct(PaymentCardRepositoryInterface $paymentCard)
    {

        $this->paymentCard = $paymentCard;
    }

    /**
     * Save the user card details
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveCardDetails(SaveCardDetailsRequest $request)
    {
        $this->paymentCard->saveCardDetails($request->all());
        return $this->success('Card details saved successfully');
    }
}
