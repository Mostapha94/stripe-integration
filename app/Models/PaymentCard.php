<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    protected $table = 'user_payment_cards';

    protected $fillable = [
        'user_id',
        'card_number',
        'expiration_date',
        'card_holder_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
