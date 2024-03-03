<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-between p-14">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 w-1/2">
            <div class="bg-white shadow-xl sm:rounded-lg p-4">
                <h1 class="text-center p-2">Band Form</h1>
                @if ($errors->any())
    <div class="alert alert-danger p-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form enctype="multipart/form-data" action="{{route('dashboard.store')}}" method="POST" class="grid gap-3 p-4">
                    @csrf
                    @method("post")
                    <label for="title">Title:</label>
                    <input type="text" name="title" placeholder="Insert title" class="rounded-md"/>

                    <label for="description">Description:</label>
                    <textarea rows="4" name="description" placeholder="Insert description" class="rounded-md"></textarea>

                    <label for="image">Image:</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="image"/>

                    <label for="youtube_links_1">YouTube Link 1:</label>
<input type="text" class="rounded-md" id="youtube_links_1" name="youtube_links_1" placeholder="Enter YouTube Link 1">

<label for="youtube_links_2">YouTube Link 2:</label>
<input type="text" class="rounded-md" id="youtube_links_2" name="youtube_links_2" placeholder="Enter YouTube Link 2">

<label for="youtube_links_3">YouTube Link 3:</label>
<input type="text" class="rounded-md" id="youtube_links_3" name="youtube_links_3" placeholder="Enter YouTube Link 3">

                    <label for="backgroundcolor">Background color:</label>
                    <input type="color" class="rounded-md" value="#24265B" name="backgroundcolor"/>

                    <label for="textcolor">Text color:</label>
                    <input type="color" class="rounded-md" value="#000000" name="textcolor"/>

                    <button class="p-2 bg-indigo-400 w-1/3 m-auto rounded-md text-neutral-50" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 w-1/2">
            <div class="bg-white shadow-xl sm:rounded-lg p-4">
                Your Personal Band list

                @if($contacts)
                        @foreach($contacts as $contact)
                            <div class="p-4 rounded-md">
                                <li>{{ $contact->title }}</li>
                                <!-- Display other contact details here -->
                            </div>
                        @endforeach
                        @else
                        <p>Geen contacten beschikbaar.</p>
                        @endif

            </div>
        </div>
    </div>
</x-app-layout>
