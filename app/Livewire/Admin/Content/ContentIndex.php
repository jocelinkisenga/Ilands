<?php

namespace App\Livewire\Admin\Content;

use App\Models\Content;
use Livewire\Component;

class ContentIndex extends Component
{
    public function render()
    {
        return view(
            'livewire.admin.content.content-index',
            [
                'contents' => Content::latest()->get()
            ]
        );
    }
}