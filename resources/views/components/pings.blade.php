@props(['ping'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            {{-- if ping have user display this: --}}
            @if($ping->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($ping->user->email) }}"
                             alt="{{ $ping->user->name }}'s avatar"
                             class="rounded-full" />
                    </div>
                </div>
            {{-- if its no user display this --}}
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                        alt="Anonymous User"
                        class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="min-w-0">
                <div class="flex items-center gap-1">
                    {{-- display user name if it dont have display anonymously --}}
                    <span class="text-sm font-semibold">{{ $ping->user ? $ping->user->name : 'Anonymous' }}</span>
                    {{--  --}}
                    <span class="text-base-content/60">·</span>
                    {{-- timestamp where when this created --}}
                    <span class="text-sm text-base-content/60">{{ $ping->created_at->diffForHumans() }}</span>
                </div>

                <p class="mt-1">
                    {{ $ping->message }}
                </p>
            </div>
        </div>
    </div>
</div>