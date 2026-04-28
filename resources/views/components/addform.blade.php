   {{-- use dialog for the esc feature   --}}
<dialog id="addform_modal" class="modal">
    <!-- Chirp Form -->

    <div class="modal-box">
        <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        
        <h3 class="font-bold text-lg">Create a new Ping</h3>
        
        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4 mt-4">
        <legend class="fieldset-legend">Ping Details</legend>

        <label class="label">Message</label>
        <form method="POST" action="/addping">
            @csrf
            <div class="form-control w-full">
                <textarea 
                    name="message" 
                    class="textarea w-full resize-none @error('message') textarea-error @enderror" 
                    placeholder="What's on your mind?"
                    rows="4"
                    maxlength="255"
                    required
                >{{ old('message') }}</textarea>

                @error('message')
                    <div class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <button class="btn btn-neutral mt-4">Add Ping</button>
        </form>

        </fieldset>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

{{-- when submitting a ping when it shave an error it prevent the modal to close --}}
@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('addform_modal').showModal();
        });
    </script>
@endif