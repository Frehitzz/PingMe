<x-layout>
    {{-- This is how we pass data to the $title variable in the layout component --}}
    <x-slot:title>Home</x-slot:title>
    <div class="max-w-2xl mx-auto">
        @foreach ($pings as $ping)
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <div class="font-semibold">{{$ping['author']}}</div>
                    <div class="mt-2">{{$ping['message']}}</div>
                    <div class="text-sm text-gray-500 mt-2">{{$ping['time']}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>