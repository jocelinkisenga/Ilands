<?php
namespace App\Livewire;

use App\Models\Lead;
use Livewire\Component;
use Livewire\Attributes\Validate;

class TaxScreener extends Component
{
    public $step = 1;
    public $totalSteps = 4;

    // Champs du formulaire
    public $income_source = '';
    public $annual_income = '';
    public $tracking_status = '';
    public $tax_concern = '';
    
    #[Validate('required|min:2')]
    public $first_name = '';
    
    #[Validate('required|email')]
    public $email = '';

    public $recommendation = null;

    public function nextStep()
    {
        if ($this->step < $this->totalSteps) {
            $this->step++;
        } else {
            $this->submit();
        }
    }

    public function submit()
    {
        $this->validate();

        // Logique de recommandation
        if ($this->income_source === 'gig' && $this->tracking_status === 'no') {
            $this->recommendation = [
                'tier' => 'Business AI',
                'message' => 'Basé sur votre activité, vous pourriez optimiser vos déductions de 15 à 25%.'
            ];
        } elseif ($this->income_source === 'expat' || $this->annual_income === '100k+') {
            $this->recommendation = [
                'tier' => 'Enterprise / Consultation',
                'message' => 'Votre profil complexe nécessite une validation prioritaire par notre Enrolled Agent.'
            ];
        } else {
            $this->recommendation = [
                'tier' => 'Standard',
                'message' => 'Un rapport standard couvrira parfaitement vos besoins actuels.'
            ];
        }

        // Sauvegarde en base MySQL
        Lead::create([
            'first_name' => $this->first_name,
            'email' => $this->email,
            'primary_income_source' => $this->income_source,
            'income_bracket' => $this->annual_income,
            'tracking_status' => $this->tracking_status,
            'tax_concern' => $this->tax_concern,
            'recommended_tier' => $this->recommendation['tier'],
        ]);

        $this->step = 'results';
    }

    public function render()
    {
        return view('livewire.tax-screener')->extends('layouts.guest');
    }
}