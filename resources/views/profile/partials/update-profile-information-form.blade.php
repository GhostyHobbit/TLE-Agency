<section class="p-6 rounded-lg shadow-lg">
    <header>
        <h2 class="text-lg font-medium !text-black">
            {{ __('Profile Information') }}
        </h2>
        <div class="flex items-center">
            <label for="profile_picture" class="cursor-pointer">
                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png') }}"
                     alt="Profile Picture"
                     class="w-32 h-32 rounded-full cursor-pointer" id="profile-picture-dropdown-button">
            </label>
            <h1 class="text-lg ml-4 !text-black">{{ $user->name }}</h1>
        </div>
    </header>

    <!-- Dropdown button for selecting profile picture -->
    <div class="relative mt-4">
        <button type="button" class="block w-full !bg-white !text-black text-center px-4 py-2 rounded-md border border-gray-300"
                id="profile-picture-dropdown-button">
            Select Profile Picture
        </button>

        <!-- Dropdown menu -->
        <div id="profile-picture-dropdown" class="absolute hidden mt-1 w-full bg-white shadow-lg rounded-md border border-gray-300">
            <a href="#" onclick="changeProfilePicture('picture1.jpg')" class="block px-4 py-2 text-black hover:bg-gray-100">Picture 1</a>
            <a href="#" onclick="changeProfilePicture('picture2.jpg')" class="block px-4 py-2 text-black hover:bg-gray-100">Picture 2</a>
            <a href="#" onclick="changeProfilePicture('picture3.jpg')" class="block px-4 py-2 text-black hover:bg-gray-100">Picture 3</a>
        </div>

    </div>

    <!-- Hidden input field to store the selected image -->
    <input type="hidden" name="profile_picture" id="selected-profile-picture" value="{{ $user->profile_picture }}" />

    @if ($user->profile_picture)
        <div class="mt-4">
            <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-32 h-32 rounded-full shadow-md">
        </div>
    @else
        {{-- <p class="mt-2 !text-sm !text-black">{{ __('No profile picture uploaded.') }}</p> --}}
    @endif
    <x-input-error class="mt-2 !text-black" :messages="$errors->get('profile_picture')" />

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
            <x-input-label class="!text-black" for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full !bg-white !text-black" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 !text-black" :messages="$errors->get('name')" />
        </div>

        <!-- Email field -->
        <div>
            <x-input-label class="!text-black" for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full !bg-white !text-black" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 !text-black" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="!text-black !text-sm mt-2">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline !text-sm !text-black hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium !text-sm !text-black">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save button -->
        <div class="flex items-center gap-4">
            <div class="mb-4">
                <x-primary-button class="!w-[296px] !h-[53px] !px-[44.50px] !py-4 !bg-[#92AA83] !rounded-2xl !border-b-4 !border-[#2E342A] !justify-center !items-center !inline-flex !text-[#fbfcf6] !text-base !font-bold !font-['Radikal'] !leading-snug">
                    {{ __('Save') }}
                </x-primary-button>

            </div>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="!text-sm !text-black"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    // Toggle dropdown visibility
    document.getElementById('profile-picture-dropdown-button').addEventListener('click', function () {
        const dropdown = document.getElementById('profile-picture-dropdown');
        dropdown.classList.toggle('hidden');
    });

    // Change profile picture and update the hidden input field
    function changeProfilePicture(pictureName) {
        document.getElementById('selected-profile-picture').value = pictureName;
        document.getElementById('profile-picture-dropdown').classList.add('hidden');
        // Optionally, update the image preview immediately
        document.querySelector('img[alt="Profile Picture"]').src = '/storage/' + pictureName;
    }
</script>
