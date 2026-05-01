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

             <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    {{-- DISPLAY USER NAME IF NOT A USER DISPLAY ANONYMOUS --}}
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold">{{ $ping->user ? $ping->user->name : 'Anonymous' }}</span>
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60">{{ $ping->created_at->diffForHumans() }}</span>
                        @if ($ping->updated_at->gt($ping->created_at->addSeconds(5)))
                            <span class="text-base-content/60">·</span>
                            <span class="text-sm text-base-content/60 italic">edited</span>
                        @endif
                    </div>

                    <div class="flex gap-1">
                        {{-- 
                            EDIT PING MESSAGE

                            - the /ping in the href is just a new declared path,
                                but you will gonna use this on your route

                            - the $ping->id in the action is to know what ping the user choose
                        --}}
                        <a href="/ping/{{ $ping->id }}/edit" class="btn btn-ghost btn-xs">
                            Edit
                        </a>
                        {{-- DELETE PING MESSAGE 
                            - the action="/ping/{{ $ping->id }}" is same function on edit

                            WHY THE DELETE IS INSIDE THE FORM?
                            - the delete is inside of form bc browsers support GET/POST
                            - and also to use @csrf     
                        --}}
                        <form method="POST" action="/ping/{{ $ping->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this chirp?')"
                                class="btn btn-ghost btn-xs text-error">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                <p class="mt-1">{{ $ping->message }}</p>
            </div>
        </div>
    </div>
</div>