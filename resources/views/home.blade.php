<x-layout>
    <x-slot:title>Home</x-slot:title>
    
    <div class="max-w-2xl mx-auto">
        @forelse ($pings as $ping)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        {{-- Fixed the variable name and removed the ternary check if you're sure user exists --}}
                        <div class="font-semibold">
                            {{ $ping->user ? $ping->user->name : 'Anonymous' }}
                        </div>
                        
                        <div class="mt-2">{{ $ping->message }}</div>
                        
                        <div class="text-sm text-gray-500 mt-2">
                            {{ $ping->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="mt-8 text-center text-gray-500">
                No pings found yet.
            </div>
        @endforelse {{-- Fixed: Removed the semicolon here --}}
    </div>
</x-layout>