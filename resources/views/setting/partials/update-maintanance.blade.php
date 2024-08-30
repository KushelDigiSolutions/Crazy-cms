<section>
    <header>
        <h2 class="text-lg sd font-medium text-gray-900">
            {{ __('Maintenance Mode') }}
        </h2>

        <!-- <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p> -->
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
      
        <div class="mb-3">
            <x-input-label for="Mode" class="form-label" :value="__('Mode')" />
            <select name="mode" id="Mode" class="form-control">
                <option {{ Auth::user()->mode == 'dark' ? 'selected' : '' }} value="dark">Disabled</option>
                <option {{ Auth::user()->mode == 'light' ? 'selected' : '' }} value="light">Enabled</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('mode')" />
        </div>
 

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-primary btn-sm btn_tn">{{ __('Update') }}</button>
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ 'Saved' }}
                    <button type="button" class="btn btn-sm float-end float-right" data-bs-dismiss="alert"
                        aria-label="Close">&times;</button>
                </div>
            @endif
        </div>
    </form>
</section>
