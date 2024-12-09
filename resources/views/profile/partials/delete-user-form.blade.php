<section>
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

            <h2 class="text-black">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <div class="text-black">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only text-black" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Password') }}"
                    class="text-black"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-black" />
            </div>

            <div class="text-black">
                <x-secondary-button x-on:click="$dispatch('close')" class="text-black">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="text-black">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
