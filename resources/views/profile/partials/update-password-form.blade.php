<section class="p-6 rounded-lg shadow-lg">
    <header>
        <!-- You can add content here, if needed -->
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="!text-black">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="!text-black" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full !bg-white !text-black" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 !text-black" />
        </div>

        <div class="!text-black">
            <x-input-label for="update_password_password" :value="__('New Password')" class="!text-black" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full !bg-white !text-black" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 !text-black" />
        </div>

        <div class="!text-black">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="!text-black" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full !bg-white !text-black" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 !text-black" />
        </div>


        <div class="mb-4">
            <x-primary-button class="!w-[296px] !h-[53px] !px-[44.50px] !py-4 !bg-[#92AA83] !rounded-2xl !border-b-4 !border-[#2E342A] !justify-center !items-center !inline-flex !text-[#fbfcf6] !text-base !font-bold !font-['Radikal'] !leading-snug">
                {{ __('Save') }}
            </x-primary-button>


        </div>

        @if (session('status') === 'password-updated')
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
