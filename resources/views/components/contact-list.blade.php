<div class="mb-4 mt-4 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 infinite-scroll">

    @forelse($contacts as $contact)
        <x-contact :contact="$contact" />
@empty
    <p>Geen bands beschikbaar.</p>
@endforelse
</div>
