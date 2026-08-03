<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationPayment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'registration_id',
        'payment_method',
        'amount',
        'payment_proof',
        'status',
        'verified_by',
        'verified_at',
        'notes',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',

        'verified_at' => 'datetime',
    ];


    /**
     * Get the registration that owns the payment.
     */
    public function registration(): BelongsTo
    {
        return $this->belongsTo(
            Registration::class,
            'registration_id'
        );
    }
}