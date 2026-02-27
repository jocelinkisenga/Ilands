<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
        protected $fillable = ['first_name',
                'email',
                'primary_income_source',
                'income_bracket',
                'tracking_status',
                'tax_concern',
                'recommended_tier'];
}
