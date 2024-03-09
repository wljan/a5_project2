<div class=" rounded-md">
<a
    href="{{ route('dashboard.contacts.show', $contact) }}">
<div class="p-4 rounded-t-lg hover:bg-gray-100 border-2">
    <img
    class="aspect-video rounded-md bg-gray-50 w-full"
    src="{{ asset('storage/' . $contact->image_path) }}"/>

    <div class="p-2 w-32 font-semibold">
    {{ $contact->title }}
    </div>
    <div class="p-2 w-32">
    {{ $contact->description }}
    </div>
</div>
</a>
@if(request()->routeIs('dashboard.index'))
<div class="border-2 p-4 rounded-b-lg flex justify-between">
    <form method="POST" action="{{ route('dashboard.destroy', ['contact' => $contact->id]) }}">
        @csrf
        @method('DELETE')

        <button class="flex gap-2 border-2 rounded-md p-2 hover:bg-gray-200" type="submit">
            <svg class="w-6 h-6 text-red-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
              </svg> Delete
        </button>
    </form>

    <form method="GET" action="{{ route('dashboard.contacts.edit', ['contact' => $contact->id]) }}">
        @csrf
        @method('GET')

        <button class="flex gap-2 border-2 rounded-md p-2 hover:bg-gray-200" type="submit">
            <svg class="w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10.8 17.8-6.4 2.1 2.1-6.4m4.3 4.3L19 9a3 3 0 0 0-4-4l-8.4 8.6m4.3 4.3-4.3-4.3m2.1 2.1L15 9.1m-2.1-2 4.2 4.2"/>
              </svg> Edit
        </button>
    </form>
</div>
@endif
</div>

