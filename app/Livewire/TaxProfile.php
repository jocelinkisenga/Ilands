<?php

namespace App\Livewire;

use Livewire\Component;
use Nnjeim\World\World;

class TaxProfile extends Component
{
   
    public $countries = [];
    public $states = [];
    public $cities = [];

    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    public function mount()
    {
        $this->countries = World::countries()->data;
    }

        public function updatedSelectedCountry($value)
    {
        $this->states = [];
        $this->cities = [];
        $this->selectedState = null;
        $this->selectedCity = null;

        if ($value) {
            // $this->states = World::states([
            //     'filters' => ['country_id' => $value]
            // ])->data;
          $this->states =   World::countries([
    'fields' => 'states',
    'filters' => [
        'id' => $value,
    ]
]);

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
    }

    public function render()
    {
        

        return view('livewire.tax-profile');
    }
}
