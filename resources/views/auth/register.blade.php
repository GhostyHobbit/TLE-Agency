<x-nav>


    <div class="mx-auto w-full max-w-[90vw] mt-8 mb-0 p-0 rounded-lg !important">
        <h2 class="text-xl font-bold text-black text-center">Registreren</h2>
        {{--                <p class="text-black text-center">Hoeveel bent u het eens met de volgende stellingen? </p>--}}
    </div>

    <div class="mx-auto w-full max-w-[90vw] mt-4 mb-8 p-0 rounded-lg !important">
        <div class="text-black !important">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg !important">
                    <x-input-label class="!text-black" for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full !bg-white !text-black p-1" :value="old('email')" required autocomplete="username" />
                    <x-input-error class="mt-2 !text-black" :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg !important">
                    <x-input-label class="!text-black" for="password" :value="__('Wachtwoord')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full !bg-white !text-black p-1" required autocomplete="new-password" />
                    <x-input-error class="mt-2 !text-black" :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg !important">
                    <x-input-label class="!text-black" for="password_confirmation" :value="__('Herhaal wachtwoord')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full !bg-white !text-black p-1" required autocomplete="new-password" />
                    <x-input-error class="mt-2 !text-black" :messages="$errors->get('password_confirmation')" />
                </div>

                <div class="flex justify-center items-center !important">
                    <button type="submit" class="w-[296px] h-[53px] px-[44.50px] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex text-[#fbfcf6] text-base font-bold font-['Radikal'] leading-snug !important">
                        {{ __('Maak account aan') }}
                    </button>
                </div>

                <div class="flex justify-center items-center mt-4 !important">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 !important" href="{{ route('login') }}">
                        {{ __('Hebt u al een account?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-nav>
