<?php

namespace App\Livewire;

use App\Services\TaxProfileService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Nnjeim\World\World;
use Livewire\Attributes\Validate;

class TaxProfile extends Component
{
   
    #[Validate('required|min:3')] 
    public string $filing_status = 'single';
    #[Validate('required|min:0')]
    public float $annual_income = 0;
    #[Validate('required|min:0')]
    public int $depends = 0;
    #[Validate('required|min:0')] 
    public float $business_income = 0;
    #[Validate('required|min:0')] 
    public float $other_income = 0;
    public bool $crypto_activity = false;

    public $countries = [];
    public $states = [];
    public $cities = [];

    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    public $country;
    public $state;



        public $step = 1;
    public $totalSteps = 8;

    public $form = [
        'income' => [],
        'business' => [],
        'expenses' => [],
        'assets' => [],
        'life_events' => [],
        'risk' => [],
        'goals' => [],
        'personal' => [],
    ];

    public $scores = [];


    
    

    public function mount()
    {
        dd($this->countries = World::countries()->data);
    }


        public function updatedSelectedCountry($value)
    {

        $this->states = [];
        $this->cities = [];
        $this->selectedState = null;
        $this->selectedCity = null;

        if ($value) {
            $this->states = World::states([
                'filters' => ['country_id' => $value]
            ])->data;

            }
            $action = World::countries([
                'filters' => [
                    'id' => $value]
                ])->data;

            if ($action) {
                $this->country = $action->first();
                }
    }

    public function updatedSelectedState($value)
    {
        $this->cities = [];
        $this->selectedCity = null;

        if ($value) {
            $this->cities = World::cities([
                'filters' => ['state_id' => $value]
            ])->data;

        }

            $action = World::states([
                'filters' => ['id'=> $value]
            ])->data;

             if ($action) {
                $this->state = $action->first();
                }
    }

    public function save(TaxProfileService $service) {
        
        

       $validatedData = $this->validate();
        $fullData = array_merge($validatedData, [
            'user_id' => Auth::id(),
            'country' => $this->country['name'],
            'state' => $this->state['name'],
            'town' => $this->selectedCity,
            'business_income' => $this->business_income,
            'other_income' => $this->other_income,
            'crypto_activity' => $this->crypto_activity,
            'raw_payload' => $this->all(), // Capture l'état complet au moment du clic 
        ]);


        try {
            
            $service->register($fullData);

            session()->flash('message', 'profile saved successfuly.');
            
            return redirect()->to('/dashboard'); 

        } catch (\Exception $e) {
            
            $this->addError('save_error', 'an error occurade while saving');
        }

    }

        public function nextStep()
    {
        if ($this->step < $this->totalSteps) {
            $this->step++;
        }
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function render()
    { 

        return view('livewire.tax-profile');
    }
}
