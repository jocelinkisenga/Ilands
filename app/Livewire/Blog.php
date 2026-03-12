<?php

namespace App\Livewire;

use App\Services\TaxProfileService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Nnjeim\World\World;
use Livewire\Attributes\Validate;

use Livewire\Attributes\Layout;


#[Layout('layouts.guest')]
class Blog extends Component
{
public $articles = [
        [
            'title' => 'Top 10 Tax Deductions for Uber Drivers',
            'slug' => 'tax-deductions-uber-drivers',
            'excerpt' => 'Maximize your take-home pay by identifying often-overlooked deductions specifically for rideshare partners.',
            'category' => 'Self-Employed',
            'read_time' => '5 min'
        ],
        [
            'title' => 'American Expat Tax Obligations: FEIE vs FTC',
            'slug' => 'expat-tax-feie-ftc',
            'excerpt' => 'Navigating international taxation doesn’t have to be complex. Understand Foreign Earned Income Exclusion vs Foreign Tax Credit.',
            'category' => 'Expat Tax',
            'read_time' => '8 min'
        ],
        [
            'title' => 'How to Track Mileage for Maximum Tax Savings',
            'slug' => 'track-mileage-tax-savings',
            'excerpt' => 'A guide to the most efficient mileage tracking methods that withstand IRS audits.',
            'category' => 'Audit Protection',
            'read_time' => '4 min'
        ],
    ];

    
    public function render()
    { 

        return view('livewire.blog');
    }
}
