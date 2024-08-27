<section>
    <header>
        <h2 class="text-lg font-medium sd text-gray-900">
            {{ __('Payment Gateway') }}
        </h2>

        <!-- <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p> -->
    </header>

    <form method="post" action="{{ route('admin.settings.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        
        <div class="mb-3">
            <x-input-label for="production_secret_key" :value="__('Production Secret Key')" />
            <x-text-input id="production_secret_key" name="production_secret_key" type="text" class="form-control" autocomplete="production_secret_key" value="{{ $paypalsandboxclientid }}" />
            <x-input-error :messages="$errors->updatePassword->get('production_secret_key')" class="mt-2 text-danger" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('Production Secret Password')" />
            <x-text-input id="production_secret_password" name="production_secret_password" type="text" class="form-control" autocomplete="production_secret_password"  value="{{ $paypalsandboxclientsecret }}"/>
            <x-input-error :messages="$errors->updatePassword->get('production_secret_password')" class="mt-2 text-danger" />
        </div>

        <div class="mb-3">
            <x-input-label for="current_password" :value="__('Testing Secret Key')" />
            <x-text-input id="testing_secret_key" name="testing_secret_key" type="text" class="form-control" autocomplete="testing_secret_password" value="{{ $paypalliveclientid }}" />
            <x-input-error :messages="$errors->updatePassword->get('testing_secret_key')" class="mt-2 text-danger" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('Testing Secret Password')" />
            <x-text-input id="testing_secret_password" name="testing_secret_password" type="text" class="form-control" autocomplete="testing_secret_password" value="{{ $paypalliveclientsecret }}" />
            <x-input-error :messages="$errors->updatePassword->get('testing_secret_password')" class="mt-2 text-danger" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('PAYPAL LIVE APP ID')" />
            <x-text-input id="paypal_live_app_id" name="paypal_live_app_id" type="text" class="form-control" autocomplete="testing_secret_password" value="{{ $paypalappid }}" />
            <x-input-error :messages="$errors->updatePassword->get('testing_secret_password')" class="mt-2 text-danger" />
        </div>

        <div class="mb-3">
    <x-input-label for="testing_secret_password" :value="__('Mode')" />
    
    <select id="status" name="status" class="form-control">
        <option value="">-- Select Option --</option>
        <option value="Live" {{ $paypalmode == 'Live' ? 'selected' : '' }}>Live</option>
        <option value="sandbox" {{ $paypalmode == 'sandbox' ? 'selected' : '' }}>Sandbox</option>
    </select>
    
    <x-input-error :messages="$errors->updatePassword->get('testing_secret_password')" class="mt-2 text-danger" />
</div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary btn-sm btn_tn" type="submit">{{ __('Update Credentials') }}</button>

            @if (session('status') === 'password-updated')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ 'Saved' }}
                <button type="button" class="btn btn-sm  float-end float-right" data-bs-dismiss="alert"
                    aria-label="Close">&times;</button>
            </div>
            @endif
        </div>
    </form>
</section>
