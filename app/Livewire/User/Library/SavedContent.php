<?php

namespace App\Livewire\User\Library;

use Livewire\Component;

class SavedContent extends Component
{
    public function render()
    {
        return view(
            'livewire.user.library.saved-content',
            [
                'contents' => auth()
                    ->user()
                    ->savedContents()
                    ->latest()
                    ->get()
            ]
        );
    }
}