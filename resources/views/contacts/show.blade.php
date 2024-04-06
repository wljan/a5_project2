<x-app-layout>
    <x-slot name="header">
        <h2
        style="color: {{ $contact->textcolor }}; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"
        class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ $contact->title }}
        </h2>
    </x-slot>



        <div class="mx-auto">
        <div
        style="border-left: 20px solid; border-right: 20px solid; border-color: {{ $contact->backgroundcolor }}"
        class="bg-white border-x-12 border-indigo-500 m-auto min-h-40 text-center shadow-xl rounded-md mt-8 mx-12 p-4">
<div class="p-2">
            <img
            class="rounded-md bg-gray-50 w-50% mx-auto"
            src="{{ asset('storage/' . $contact->image_path) }}"/>

            <div class="p-2 w-32 mx-auto italic">
                {{ $contact->description }}
                </div>
            </div>

            <div class="p-2 w-32 mx-auto italic">
                {{ $contact->biography }}
                </div>


                <div class="px-8 pb-8 border-2 rounded-md">
                    <p class="font-semibold py-4 text-xl">Youtube embeds</p>
<div class="flex flex-wrap justify-center gap-8">
    @foreach(explode('|', $contact->youtube_links) as $link)
    <div>
        <iframe src="{{ $link }}" class="aspect-video rounded-md bg-white w-full" frameborder="0" allowfullscreen></iframe>
    </div>
@endforeach
            </div>
            </div>
        </div>
    </div>

</x-app-layout>
