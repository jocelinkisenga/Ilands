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
        'encrypted_dependents', 
        'income_details', 
        'deductions', 
        'life_events', 
        'goals', 
        'raw_payload'
        ];

    protected $casts = [
            'encrypted_dependents' => 'encrypted:array',
            'income_details' => 'array',
            'deductions' => 'array',
            'life_events' => 'array',
            'goals' => 'array',
            'raw_payload' => 'array',
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}