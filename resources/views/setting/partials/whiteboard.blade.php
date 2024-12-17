<section>
    <header>
        <h2 class="text-lg sd font-medium text-gray-900">
            {{ __('Whiteboard') }}
        </h2>

        <!-- <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p> -->
    </header>



    <form method="post" action="{{ route('admin.whiteboard.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        

        <div class="mb-3">
            <x-input-label for="password" :value="__('Message')" />
            <x-text-input id="white_board" name="white_board" type="text" class="form-control" autocomplete="message" value="{{ $whiteBoard }}" />
        </div>


        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary btn-sm btn_tn">{{ __('Update') }}</button>
            @if (session('status') === 'whiteboard-updated')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ 'Saved' }}
                    <button type="button" class="btn btn-sm float-end float-right" data-bs-dismiss="alert"
                        aria-label="Close">&times;</button>
                </div>
            @endif
        </div>
    </form>
</section>
