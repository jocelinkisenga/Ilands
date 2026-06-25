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
    public $video; // Nouvelle propriété pour la vidéo

    // Validation dynamique
    protected function rules()
    {
        $rules = [
            'title' => 'required|min:3',
            'type' => 'required|in:blog,video,document,pack',
            'content' => 'required',
            'thumbnail' => 'nullable|image|max:2048',
        ];

        // On adapte les règles selon le type sélectionné
        if ($this->type === 'document') {
            $rules['document'] = 'nullable|mimes:pdf|max:10240'; // 10MB max
        } elseif ($this->type === 'video') {
            $rules['video'] = 'nullable|mimes:mp4,mov,avi|max:51200'; // 50MB max (exemple)
        }

        return $rules;
    }

    public function save()
    {
        $this->validate();

        $thumbnailPath = $this->thumbnail ? $this->thumbnail->store('thumbnails', 'public') : null;
        $documentPath = null;
        $videoPath = null;

        
        if ($this->type === 'document' && $this->document) {
            $documentPath = $this->document->store('documents', 'public');
        } elseif ($this->type === 'video' && $this->video) {
            $videoPath = $this->video->store('videos', 'public');
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
            'video_url' => $videoPath, 
        ]);

        session()->flash('success', 'Content created successfully.');
        return redirect()->to('/admin/dashboard');
    }

    public function render()
    {
        return view('livewire.admin.content.content-create');
    }
}