<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaxProfile extends Model
{
    protected $fillable = [
        'user_id',
         'filing_status', 
         'annual_income', 
         'country', 
        'state', 
        'town', 
        'depends', 
        'business_income', 
        'other_income', 
        'crypto_activity', 
        'raw_payload'
    ];

    protected $casts = [
        'annual_income' => 'double',
        'business_income' => 'double',
        'other_income' => 'double',
        'crypto_activity' => 'boolean',
        'raw_payload' => 'array', // Important pour la manipulation JSON
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}