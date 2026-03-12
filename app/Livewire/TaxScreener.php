<?php

namespace App\Livewire;

use App\Models\Lead;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.guest')]
class TaxScreener extends Component
{
    public $step = 1;
    public $totalSteps = 4;

    // Champs du formulaire
    public $income_source = '';
    public $annual_income = '';
    public $tracking_status = '';
    public $tax_concern = '';
    public $first_name = '';
    public $email = '';

    public $recommendation = null;

    
    public function nextStep()
    {
        if ($this->step == 1) {

            $this->validate(['income_source' => 'required'], ['income_source.required' => 'Veuillez sélectionner une source de revenus.']);
        } elseif ($this->step == 2) {
            
            $this->validate(['annual_income' => 'required'], ['annual_income.required' => 'Veuillez sélectionner une tranche de revenus.']);
        } elseif ($this->step == 3) {
            $this->validate(['tracking_status' => 'required'], ['tracking_status.required' => 'Veuillez sélectionner une option de suivi.']);
        }

        if ($this->step < $this->totalSteps) {
            $this->step++;
        }
    }

    public function submit()
    {
        
        $this->validate([
            'first_name' => 'required|min:2',
            'email'      => 'required|email|unique:leads,email',
        ], [
            'first_name.required' => 'Le prénom est obligatoire.',
            'email.required' => 'Une adresse email valide est requise.'
        ]);

       
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

    public function previousStep()
{
    if ($this->step > 1) {
        $this->step--;
        $this->resetErrorBag(); 
    }
}

    public function render()
    {
        return view('livewire.tax-screener');
    }
}