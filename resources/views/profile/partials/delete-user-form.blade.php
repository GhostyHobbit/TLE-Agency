<section class="p-6 bg-white rounded-lg shadow-lg">
    <header>
        <!-- You can add content here, if needed -->
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="text-black"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2 class="text-black text-lg font-medium  !important">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <div class="text-black !important">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only text-black  !important" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Password') }}"
                    class="text-black border-gray-300 !important"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-black !important" />
            </div>

            <div class="flex gap-4 mt-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="text-black !important">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="text-black !important">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
