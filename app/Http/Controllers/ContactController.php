<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $contacts = $user->contacts;
        return view('dashboard.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'image' => 'required|file|mimes:jpeg,jpg,png',
            'description' => 'required|min:3',
            'youtube_links_1' => 'required|string',
            'youtube_links_2' => 'required|string',
            'youtube_links_3' => 'required|string',
            'textcolor' => 'required|string',
            'backgroundcolor' => 'required|string',
        ]);

        $user = Auth::user();

        // Access the 'video' file from the validated data
        $contact = $request->file('image');

        // Store the video file in the 'public/videos' directory
        $contactPath = $contact->store('images', 'public');

        $newContact = $user->contacts()->create([
            'title' => $validatedData['title'],
            'image_path' => $contactPath,
            'description' => $validatedData['description'],
            'youtube_links_1' => $validatedData['youtube_links_1'],
            'youtube_links_2' => $validatedData['youtube_links_2'],
            'youtube_links_3' => $validatedData['youtube_links_3'],
            'textcolor' => $validatedData['textcolor'],
            'backgroundcolor' => $validatedData['backgroundcolor'],
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        // $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([

        ]);

        $contact->update($request->all());

        return redirect('/contacts')->with('success', 'Contact is aangepast!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
              // $contact = Contact::find($id);
        $contact->delete();

        return back()->with('success', 'Contact is verwijderd!');
    }
}
