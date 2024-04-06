<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $contacts = $user->contacts;
        return view('dashboard', ['contacts' => $contacts]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'image' => 'required|file|mimes:jpeg,jpg,png',
            'description' => 'required|min:3',
            'biography' => 'required|min:3',
            'youtube_links' => 'required|array',
            'youtube_links.*' => 'url',
            'textcolor' => 'required|string',
            'backgroundcolor' => 'required|string',
        ]);

        $user = Auth::user();

        // Access the 'image' file from the validated data
        $image = $request->file('image');

        // Store the image file in the 'public/images' directory
        $imagePath = $image->store('images', 'public');

        $newContact = $user->contacts()->create([
            'title' => $validatedData['title'],
            'image_path' => $imagePath,
            'description' => $validatedData['description'],
            'biography' => $validatedData['biography'],
            'youtube_links' => implode('|', $validatedData['youtube_links']),
            'textcolor' => $validatedData['textcolor'],
            'backgroundcolor' => $validatedData['backgroundcolor'],
        ]);

        return back();
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function list(Request $request)
{
    $query = $request->input('query');

    if ($query) {
        $contacts = Contact::where('title', 'like', '%' . $query . '%')
                            ->orWhere('description', 'like', '%' . $query . '%')
                            ->get();
    } else {
        $contacts = Contact::all();
    }

    return view('welcome', ['contacts' => $contacts, 'query' => $query]);
}



    public function edit(Contact $contact)
    {
        // $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required|min:3',
        'description' => 'required|min:3',
        'biography' => 'required|min:3',
        'image' => 'nullable|file|mimes:jpeg,jpg,png', // Optionally validate the image if it's being updated
        'backgroundcolor' => 'required|string',
        'textcolor' => 'required|string',
    ]);

    // Update the contact with the validated data
    $contact->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'biography' => $validatedData['biography'],
        'backgroundcolor' => $validatedData['backgroundcolor'],
        'textcolor' => $validatedData['textcolor'],
    ]);

    // If the request contains an updated image, update the image
    if ($request->hasFile('image')) {
        // Handle image upload and update logic here
        // Example:
        $imagePath = $request->file('image')->store('images', 'public');
        $contact->image_path = $imagePath;
        $contact->save();
    }

    // Redirect back with a success message
    return redirect()->route('dashboard.index');
}

    public function destroy(Contact $contact)
    {
              // $contact = Contact::find($id);
        $contact->delete();

        return back()->with('success', 'Contact is verwijderd!');
    }


}
