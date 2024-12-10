<section class="p-6 rounded-lg shadow-lg">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Profile Information') }}
        </h2>
        <div class="flex items-center">
            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png') }}"
                 alt="Profile Picture"
                 class="w-32 h-32 rounded-full">
            <h1 class="text-lg ml-4">{{ $user->name }}</h1>
        </div>
    </header>

    <!-- Form to send email verification -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Main form for updating profile -->
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Name field -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email field -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Profile Picture Field -->
        <div>
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            <input type="file" name="profile_picture" id="profile_picture" class="mt-1 block w-full" />
            @if ($user->profile_picture)
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-32 h-32 rounded-full shadow-md">
                </div>
            @else
                <p class="mt-2 text-sm">{{ __('No profile picture uploaded.') }}</p>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>

        <!-- Save button -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
