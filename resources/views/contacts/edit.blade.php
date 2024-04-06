<x-app-layout>
    <x-slot name="header">
        <h2
        style="color: {{ $contact->textcolor }}; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"
        class="font-semibold text-xl text-gray-800 leading-tight text-center">
           Edit: {{ $contact->title }}
        </h2>
    </x-slot>

    <div class="mx-auto">
        <div
        style="border-left: 20px solid; border-right: 20px solid; border-color: {{ $contact->backgroundcolor }}"
        class="bg-white border-x-12 border-indigo-500 m-auto min-h-40 text-center shadow-xl rounded-md mt-8 mx-12 p-4">
        <div class="m-auto w-4/5">
    <form enctype="multipart/form-data" action="{{ route('dashboard.contacts.update', ['contact' => $contact->id]) }}" method="post" class="grid gap-3 p-4">
        @csrf
        @method("PATCH") <!-- Use PUT method for editing existing records -->

        <input type="hidden" name="id" id="id" value="{{ $contact->id }}" id="id" />

        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="Insert title" class="rounded-md" value="{{ $contact->title }}"/>

        <label for="description">Description:</label>
        <textarea rows="1" name="description" placeholder="Insert description" class="rounded-md">{{ $contact->description }}</textarea>

        <label for="biography">Biography:</label>
        <textarea rows="6" name="biography" placeholder="Insert biography" class="rounded-md mb-4">{{ $contact->biography }}</textarea>

        <div class="border-t-2 py-4">
            <label for="image">Image:</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="image"/>
        </div>

        <div class="border-y-2 py-4">
            <div id="youtube_links_container" class="grid gap-3 pb-4">
                @php
                    $youtube_links_array = explode('|', $contact->youtube_links);
                @endphp
                @foreach($youtube_links_array as $index => $youtube_link)
                    <div class="youtube_link">
                        <label for="youtube_links">YouTube Link {{ $index + 1 }}: </label>
                        <input type="text" class="rounded-md" name="youtube_links[]" placeholder="Enter YouTube Link" value="{{ $youtube_link }}">
                    </div>
                @endforeach
            </div>
        </div>




            </div>
        <div class="flex gap-8 py-4 justify-center">
            <div>
                <label for="backgroundcolor">Background color:</label>
                <input type="color" class="rounded-md" value="{{ $contact->backgroundcolor }}" name="backgroundcolor"/>
            </div>

            <div>
                <label for="textcolor">Text color:</label>
                <input type="color" class="rounded-md" value="{{ $contact->textcolor }}" name="textcolor"/>
            </div>
        </div>

        <button class="p-2 bg-indigo-400 w-1/3 m-auto rounded-md text-neutral-50" type="submit">Submit</button>
    </form>
</div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('add_youtube_link').addEventListener('click', function() {
        var container = document.getElementById('youtube_links_container');
        var inputsCount = container.querySelectorAll('.youtube_link').length;
        if (inputsCount < 4) {
            var index = inputsCount + 1;
            var newInput = document.createElement('div');
            newInput.classList.add('youtube_link');
            newInput.innerHTML = '<label for="youtube_links">YouTube Link ' + index + ': </label>' +
                                 '<input type="text" class="rounded-md" name="youtube_links[]" placeholder="Enter YouTube Link">';
            container.appendChild(newInput);
            if (inputsCount == 3) {
                document.getElementById('add_youtube_link').style.display = 'none';
            }
        }
    });
</script>
