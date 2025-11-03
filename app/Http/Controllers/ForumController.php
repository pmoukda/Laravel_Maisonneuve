<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Auth;


class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forums = Forum::with('user')->paginate(5);
        return view('forum.index', compact('forums'));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'title_en' => 'max:100',
            'title_fr' => 'required|max:100',
            'content_en' => 'max:1100',
            'content_fr' => 'required|max:1100',
            'published_at' => 'date|nullable',
            'language' => 'required|in:fr,en',
            
        ],
        [],
        [
            'title_en' => trans('lang.title_en'),
            'title_fr' => trans('lang.title_fr'),
            'content_en' => trans('lang.content_en'),
            'content_fr' => trans('lang.content_fr'),
            'published_at' => trans('lang.publish_at'),
            'language' => trans('lang.language'),
            
        ]);
        
        // Filtrer les langues remplies
        $titles = array_filter([
            'fr' => $request->input('title_fr'),
            'en' => $request->input('title_en'),
        ]);

        $contents = array_filter([
            'fr' => $request->input('content_fr'),
            'en' => $request->input('content_en'),
        ]);

        $forum = Forum::create([
            'language' => $request->input('language'),
            'title' => $titles,
            'content' => $contents,
            'published_at' => $request->input('published_at'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forum.show', $forum->id)->with('success', trans('lang.success_create_forum_msg'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        $lang = $forum->language;
       return view('forum.show', compact('forum', 'lang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Forum $forum)
    {
        return view('forum.edit', compact('forum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        $request-> validate([
            'title_en' => 'max:100',
            'title_fr' => 'required|max:100',
            'content_en' => 'max:1100',
            'content_fr' => 'required|max:1100',
            'published_at' => 'date|nullable',
            'language' => 'required|in:fr,en',
            
        ],
        [],
        [
            'title_en' => trans('lang.title_en'),
            'title_fr' => trans('lang.title_fr'),
            'content_en' => trans('lang.content_en'),
            'content_fr' => trans('lang.content_fr'),
            'published_at' => trans('lang.publish_at'),
            'language' => trans('lang.language'),
            
        ]);
        
        // Filtrer les langues remplies
        $titles = array_filter([
            'fr' => $request->input('title_fr'),
            'en' => $request->input('title_en'),
        ]);

        $contents = array_filter([
            'fr' => $request->input('content_fr'),
            'en' => $request->input('content_en'),
        ]);

        $forum->update([
            'language' => $request->input('language'),
            'title' => $titles,
            'content' => $contents,
            'published_at' => $request->input('published_at'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forum.show', $forum->id)->with('success', trans('lang.success_edit_msg'));
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        if(auth::user()){

            $forum->delete();
        }
        
        return redirect()->route('forum.index')->with('success', trans('lang.success_deleted_forum_msg'));
    
    }
}
