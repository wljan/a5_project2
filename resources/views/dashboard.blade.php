<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-between gap-8 p-14">
        <div class="max-w-2xl mx-auto w-1/3">
            <div class="bg-white shadow-xl sm:rounded-lg p-4">
                <h1 class="font-semibold text-2xl text-center">Band Form</h1>
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
                    <textarea rows="1" name="description" placeholder="Insert description" class="rounded-md"></textarea>

                    <label for="biography">Biography:</label>
                    <textarea rows="6" name="biography" placeholder="Insert biography" class="rounded-md mb-4"></textarea>

                    <div class="border-t-2 py-4">
                    <label for="image">Image:</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="image"/>
                    </div>

                    <div class="border-y-2 py-4">
                    <div id="youtube_links_container" class="grid gap-4 pb-4">
                        <div class="youtube_link">
                            <label for="youtube_links">YouTube Link 1: </label>
                            <input type="text" class="rounded-md" name="youtube_links[]" placeholder="Enter YouTube Link">
                        </div>
                    </div>

                    <button type="button" class="border-2 p-1 flex rounded-md hover:bg-gray-100" id="add_youtube_link">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                      </svg><div class="my-auto px-2">Voeg meer toe</div></button>


                    </div>

                    <div class="flex gap-8 py-4 justify-center">
                        <div>
                    <label for="backgroundcolor">Background color:</label>
                    <input type="color" class="rounded-md" value="#24265B" name="backgroundcolor"/>
                        </div>

                        <div>
                    <label for="textcolor">Text color:</label>
                    <input type="color" class="rounded-md" value="#000000" name="textcolor"/>
                        </div>
                    </div>

                    <button class="p-2 bg-indigo-400 w-1/3 m-auto rounded-md text-neutral-50" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="max-w-6xl mx-auto w-2/3">
            <div class="bg-white shadow-xl sm:rounded-lg p-4">
                <div class="font-semibold text-2xl text-center">Your Personal Band list</div>

                <x-contact-list :contacts="$contacts" />
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
