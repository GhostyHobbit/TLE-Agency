<x-nav>
    <div class="mx-auto w-full max-w-[90vw] mt-8 mb-0 p-0 rounded-lg !important">
        <h2 class="text-xl font-bold !text-[#2E342A] text-center">Inloggen</h2>
    </div>

    <div class="mx-auto w-full max-w-[90vw] mt-4 mb-4 p-0 rounded-lg !important">
        <div class="!text-[#2E342A] !important">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg !important">
                    <x-input-label class="!text-[#2E342A]" for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full !bg-white !text-[#2E342A] p-1" :value="old('email')" required autocomplete="username" />
                    <x-input-error class="mt-2 !text-[#2E342A]" :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg !important">
                    <x-input-label class="!text-[#2E342A]" for="password" :value="__('Wachtwoord')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full !bg-white !text-[#2E342A] p-1" required autocomplete="current-password" />
                    <x-input-error class="mt-2 !text-[#2E342A]" :messages="$errors->get('password')" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4 mb-6 bg-[#D9E6B1] p-4 rounded-lg !important">
                    <label for="remember_me" class="inline-flex items-center !text-[#2E342A]">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm !text-[#2E342A]">{{ __('Onthoud mij') }}</span>
                    </label>
                </div>

                <div class="flex justify-center items-center !important">
                    <button type="submit" class="w-[296px] h-[53px] px-[44.50px] py-4 bg-[#aa0160] hover:bg-[#7c1a51] active:bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex text-[#fbfcf6] text-base font-bold font-['Radikal'] leading-snug !important">
                        {{ __('Log in') }}
                    </button>
                </div>

                <div class="flex justify-center items-center mt-4 !important">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm !text-[#2E342A] hover:!text-[#7c1a51] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 !important" href="{{ route('password.request') }}">
                            {{ __('Wachtwoord vergeten?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="flex justify-center items-center mt-1">
        <a href="{{ route('register') }}" class="underline text-sm !text-[#2E342A] hover:!text-[#7c1a51] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 !important">
            Hebt u nog geen account?
        </a>
    </div>
</x-nav>
