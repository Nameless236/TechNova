<section>
    <header class="mb-4">
        <h2>{{ __('Update Password') }}</h2>
        <p class="text-muted small">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <!-- Update Password Form -->
    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" placeholder="{{ __('Enter your current password') }}">
            @error('current_password', 'updatePassword')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="new_password" class="form-label">{{ __('New Password') }}</label>
            <input id="new_password" name="password" type="password" class="form-control" autocomplete="new-password" placeholder="{{ __('Enter a new password') }}">
            @error('password', 'updatePassword')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm New Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" placeholder="{{ __('Confirm your new password') }}">
            @error('password_confirmation', 'updatePassword')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button and Status Message -->
        <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-success small ms-3 mb-0"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
