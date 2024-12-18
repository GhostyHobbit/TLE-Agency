<header class="mt-9">
    <!-- Optional Header Content -->
    <div class="rounded-lg">
        <h2 class="text-lg text-center !text-[#2E342A]">Instellingen</h2>
    </div>
</header>

<section class="p-6 rounded-lg shadow-lg bg-[#E2ECC8] mx-auto w-full max-w-[90vw] mt-2 mb-8">

    <!-- Logout Button -->
    <form method="POST" action="{{ route('logout') }}" class="mt-3 flex justify-center">
        @csrf
        <button type="submit" class="!w-[296px] !h-[53px] !px-[44.50px] !py-4 bg-[#aa0160] hover:bg-[#7c1a51] active:bg-[#aa0160] !rounded-2xl !border-b-4 !border-[#2E342A] !justify-center !items-center !inline-flex !text-[#fbfcf6] !text-base !font-bold !font-['Radikal'] !leading-snug !normal-case">
            {{ __('Uitloggen') }}
        </button>
    </form>

    <!-- Account Deletion Button -->
    <div class="mt-8 flex justify-center">
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="flex justify-center items-center"
        >
            {{ __('Verwijder Account') }}
        </x-danger-button>
    </div>

    <!-- Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium !text-[#2E342A]">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm !text-[#2E342A]">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 !text-[#2E342A]"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 !text-[#2E342A]" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="!text-[#2E342A]">
                    {{ __('Annuleer') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Verwijder account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
