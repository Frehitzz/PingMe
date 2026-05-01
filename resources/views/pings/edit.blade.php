<x-layout>
    <x-slot:title>
        Edit Ping
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8">Edit Ping</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/ping/{{ $ping->id }}">
                    @csrf
                    {{-- We use thiis because it acts as a bridge for we to use 
                        the Route::put() on our route web.php Route::put()
                    --}}
                    @method('PUT')

                    <div class="form-control w-full">

                        {{-- 
                            {{ old('message', $ping->message) }}

                            - the old('message') purpose is to display the user inputted wrong input
                            ex: you update your message with only two letters thats gonna be an error
                            when you hit update the website will reload and you can still see you inputted text

                            - $ping->messsage this get your current message on the database
                             and display it on the input field
                        --}}
                        <textarea
                            name="message"
                            class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror"
                            rows="4"
                            maxlength="255"
                            required
                        >{{ old('message', $ping->message) }}</textarea>

                        {{-- ERROR MESSAGE --}}
                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn-ghost btn-sm">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update Ping
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>