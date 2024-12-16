<x-nav>
    <div class="mx-auto w-full max-w-[90vw] mt-8 mb-0 p-0 rounded-lg !important">
        <h3 class="text-xl font-bold text-black text-center">Wachtwoord vergeten</h3>
    </div>

    <div class="mx-auto w-full max-w-[90vw] mt-4 mb-8 p-0 rounded-lg !important">
        <div class="text-black !important">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Bent u uw wachtwoord vergeten? Geen probleem. Laat ons gewoon uw e-mailadres weten en wij sturen u een link om uw wachtwoord opnieuw in te stellen, zodat u een nieuw wachtwoord kunt kiezen.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg !important">
                    <x-input-label class="!text-black" for="email" :value="__('E-mail')" />
                    <x-text-input id="email" class="mt-1 block w-full !bg-white !text-black p-1" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error class="mt-2 !text-black" :messages="$errors->get('email')" />
                </div>

                <div class="flex justify-center items-center !important">
                    <button type="submit" class="w-[296px] h-[53px] px-[44.50px] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex text-[#fbfcf6] text-base font-bold font-['Radikal'] leading-snug !important">
                        {{ __('E-mail link voor wachtwoord reset') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-nav>
