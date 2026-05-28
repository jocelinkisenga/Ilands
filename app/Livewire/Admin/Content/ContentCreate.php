<?php

namespace App\Livewire\Admin\Content;

use App\Models\Content;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContentCreate extends Component
{
    use WithFileUploads;

    public string $title = '';

    public string $type = 'blog';

    public string $excerpt = '';

    public string $content = '';

    public string $access_level = 'free';

    public $thumbnail;

    public $document;

    public function save()
    {
        $this->validate([

            'title' => 'required|min:3',

            'type' => 'required',

            'content' => 'required',

            'thumbnail' => 'nullable|image|max:2048',

            'document' => 'nullable|mimes:pdf|max:10240',

        ]);

        $thumbnailPath = null;

        if ($this->thumbnail) {

            $thumbnailPath = $this->thumbnail
                ->store('thumbnails', 'public');

        }

        $documentPath = null;

        if ($this->document) {

            $documentPath = $this->document
                ->store('documents', 'public');

        }

        Content::create([

            'title' => $this->title,

            'slug' => Str::slug($this->title),

            'type' => $this->type,

            'excerpt' => $this->excerpt,

            'content' => $this->content,

            'access_level' => $this->access_level,

            'thumbnail' => $thumbnailPath,

            'document_path' => $documentPath,

        ]);

        session()->flash(
            'success',
            'Content created successfully.'
        );

        return redirect()
            ->route('admin.content.index');
    }

    public function render()
    {
        return view(
            'livewire.admin.content.content-create'
        );
    }
}