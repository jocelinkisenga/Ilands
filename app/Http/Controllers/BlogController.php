<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function index () {
        return view("pages.blog", ["articles" => Content::where("type" ,"=", "blog")->get()]);
    }

    public function show (string $slug) {
        $article =  Content::whereSlug($slug)->firstOrFail();
        return view("pages.blog.details",["article" => $article]);
    }

    public function ckeditor (Request $request) {

    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        
        // 1. On sépare le nom et l'extension pour nettoyer proprement
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        
        // 2. On sécurise le nom (plus d'espaces, plus d'accents)
        $safeName = Str::slug($originalName);
        $fileName = time() . '_' . $safeName . '.' . $extension;
        
        // 3. Déplacement sécurisé vers public/media
        $file->move(public_path('media'), $fileName);

        $url = asset('media/' . $fileName);

        // 4. Retour au format booléen strict attendu par CKEditor
        return response()->json([
            'uploaded' => true,
            'fileName' => $fileName,
            'url' => $url
        ]);
    }

    return response()->json([
        'uploaded' => false, 
        'error' => [
            'message' => 'Aucun fichier reçu ou format invalide.'
        ]
    ], 400); // On renvoie un code 400 pour que CKEditor comprenne l'erreur

    }
}
