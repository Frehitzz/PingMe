<x-layout>
    
    {{-- 
    TO SEE THE ERROR

    @if ($errors->any())
    {{ dd($errors->all()) }}
    @endif 
    
    --}}
    <x-slot:title>
        Home Feed
    </x-slot:title>
    {{-- Form modal for adding pings --}}
    <x-addform></x-addform>
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mt-8">
            <h1 class="text-3xl font-bold">Latest Pings</h1>
            {{-- Add ping btn --}}
            <button class="btn btn-primary" onclick="addform_modal.showModal()">Add Ping</button>
        </div>

        <div class="space-y-4 mt-8">
            @forelse ($pings as $ping)
                <x-pings :ping="$ping" />
            @empty
                <div class="hero py-12">
                    <div class="hero-content text-center">
                        <div>
                            <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <p class="mt-4 text-base-content/60">No Pings yet. Be the first to Pings!</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>