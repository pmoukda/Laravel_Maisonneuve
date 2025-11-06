<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $folders = Folder::with('user')->paginate(10);
        return view('folder.index', compact('folders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('folder.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'max:100',
            'title_fr' => 'required|max:100',
            'published_at' => 'required|date',
            'language' => 'required|in:fr,en',
            'path' => 'required|file|mimes:pdf,doc,docx,zip|max:5000'
         ],
        [],
        [
            'title_en' => trans('lang.title_en'),
            'title_fr' => trans('lang.title_fr'),
            'published_at' => trans('lang.published_at'),
            'language' => trans('lang.language'),
            'path' => trans('lang.text_form_doc'),
        ]);

        // Filtrer les langues remplies
        $titles = array_filter([
            'fr' => $request->input('title_fr'),
            'en' => $request->input('title_en'),
        ]);
        
        if($request->hasFile('path')){
            $file = $request->file('path'); // récupérer le fichier 
            $filePath = $file->store('uploads', 'public'); // stocker le fichier
        }else{
            $filePath = null;
        }

        $folder = Folder::create([
            'language' => $request->input('language'),
            'title' => $titles,
            'published_at' => $request->input('published_at'),
            'path' =>$filePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('folder.index', $folder->id)->with('success', trans('lang.success_create_folder_msg'));

    }
  

    /**
     * Display the specified resource.
     */
    public function show(Folder $folder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Folder $folder)
    {
        return view('folder.edit', compact('folder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folder $folder)
    {
         $request->validate([
            'title_en' => 'max:100',
            'title_fr' => 'required|max:100',
            'published_at' => 'required|date',
            'language' => 'required|in:fr,en',
            'path' => 'required|file|mimes:pdf,doc,docx,zip|max:5000'
         ],
        [],
        [
            'title_en' => trans('lang.title_en'),
            'title_fr' => trans('lang.title_fr'),
            'published_at' => trans('lang.published_at'),
            'language' => trans('lang.language'),
            'path' => trans('lang.text_form_doc'),
        ]);

        // Filtrer les langues remplies
        $titles = array_filter([
            'fr' => $request->input('title_fr'),
            'en' => $request->input('title_en'),
        ]);
        
        if($request->hasFile('path')){
            $file = $request->file('path'); // récupérer le fichier 
            $filePath = $file->store('uploads', 'public'); // stocker le fichier

            if ($folder->path && Storage::disk('public')->exists($folder->path)) {
            Storage::disk('public')->delete($folder->path);
    }
        }else{
            $filePath = null;
        }

        $folder-> update([
            'language' => $request->input('language'),
            'title' => $titles,
            'published_at' => $request->input('published_at'),
            'path' =>$filePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('folder.index', $folder->id)->with('success', trans('lang.success_edit_msg'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        //
    }
}
