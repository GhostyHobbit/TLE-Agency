<div class="rounded-lg mt-8">
    <h1 class="text-h2 text-center">Uw profiel</h1>
</div>

<section class="p-6 rounded-lg shadow-lg bg-[#E2ECC8] mx-auto w-full max-w-[90vw] mt-2 mb-8">

    <!-- Main form for updating profile -->
    <form id="profile-update-form" method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Profile Picture and Selection Section -->
        <section>
            <header>
                <div class="flex items-center">
                    <label for="profile_picture" class="cursor-pointer">
                        <img src="{{ $user->profile_picture ? asset('images/profile_pics/' . $user->profile_picture) : asset('images/profile_pics/picture1.jpg') }}"
                             alt="Profile Picture"
                             class="w-32 h-32 rounded-full object-cover cursor-pointer"
                             id="profile-picture-dropdown-button">
                    </label>
                    <h1 class="text-lg ml-4 !text-black">{{ $user->name }}</h1>
                </div>
            </header>

            <!-- Dropdown menu -->
            <div id="profile-picture-dropdown" class="absolute hidden mt-1 w-full bg-white shadow-lg rounded-md border border-gray-300">
                <a href="#" onclick="changeProfilePicture('picture1.jpg')" class="block px-4 py-2 text-black hover:bg-gray-100">Tiger</a>
                <a href="#" onclick="changeProfilePicture('picture2.jpg')" class="block px-4 py-2 text-black hover:bg-gray-100">Dog</a>
                <a href="#" onclick="changeProfilePicture('picture3.jpg')" class="block px-4 py-2 text-black hover:bg-gray-100">Crow</a>
            </div>

            <!-- Hidden input field to store the selected image -->
            <input type="hidden" name="profile_picture" id="selected-profile-picture" value="{{ $user->profile_picture ? $user->profile_picture : 'picture1.jpg' }}" />
        </section>

        <!-- Email field -->
        <div>
            <x-input-label class="!text-black" for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full !bg-white !text-black p-1" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 !text-black" :messages="$errors->get('email')" />
        </div>

        <!-- Save button -->
        <div class="flex justify-end items-center gap-4">
            <button class="!w-[296px] !h-[53px] !px-[44.50px] !py-4 bg-[#aa0160] hover:bg-[#7c1a51] active:bg-[#92AA83] !rounded-2xl !border-b-4 !border-[#2E342A] !justify-center !items-center !inline-flex !text-[#fbfcf6] !text-base !font-bold !font-['Radikal'] !leading-snug !normal-case">
                {{ __('Opslaan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="!text-sm !text-black p-1"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    // Toggle dropdown visibility when image is clicked
    document.getElementById('profile-picture-dropdown-button').addEventListener('click', function () {
        const dropdown = document.getElementById('profile-picture-dropdown');
        dropdown.classList.toggle('hidden');
    });

    // Change profile picture, update the hidden input, and push to database instantly
    function changeProfilePicture(pictureName) {
        const csrfToken = '{{ csrf_token() }}';

        // Update the image preview immediately
        document.querySelector('img[alt="Profile Picture"]').src = '/images/profile_pics/' + pictureName;

        // Hide the dropdown after selecting a picture
        const dropdown = document.getElementById('profile-picture-dropdown');
        dropdown.classList.add('hidden');

        // Send the selection instantly to the server via AJAX
        fetch("{{ route('profile.picture.update') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                profile_picture: pictureName,
            }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log("Profile picture updated successfully.");
                } else {
                    console.error("Error updating profile picture:", data.message);
                }
            })
            .catch(error => console.error("Error:", error));
    }
</script>
