<x-nav>

    <x-slot name="header">
        <h2 class="text-black">{{ __('Profile Preferences') }}</h2>
    </x-slot>

    <div class=" mx-auto w-full max-w-[90vw] mt-8 mb-8 p-0 rounded-lg">
        <div class="text-black">
            @if (session('status'))
                <p class="text-green-500">{{ session('status') }}</p>
            @endif

            <form method="POST" action="{{ route('profile.preferences.update') }}">
                @csrf
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg">
                    <h3 class="font-bold text-black text-center">Wie bent u?</h3>
                    <p class="text-black text-center">Hoeveel bent u het eens met de volgende stellingen? </p>
                </div>
                <!-- Preference 1 -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg">
                    <p class=" text-black text-center pb-2">Ik werk graag samen met anderen:</p>
                    <div class="flex justify-between gap-8">
                        <label class="text-black">
                            <input type="radio" name="preference1" value="0" {{ Auth::user()->preference1 === 0 ? 'checked' : '' }}> Oneens
                        </label>
                        <label class="text-black">
                            <input type="radio" name="preference1" value="1" {{ Auth::user()->preference1 === null || Auth::user()->preference1 === 1 ? 'checked' : '' }}> Weet ik niet
                        </label>
                        <label class="text-black">
                            <input type="radio" name="preference1" value="2" {{ Auth::user()->preference1 === 2 ? 'checked' : '' }}> Eens
                        </label>
                    </div>
                </div>

                <!-- Preference 2 -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg">
                    <p class="text-black text-center pb-2">Ik ben klantgericht en klantvriendelijk:</p>
                    <div class="flex justify-between gap-8">
                        <label class="text-black">
                            <input type="radio" name="preference2" value="0" {{ Auth::user()->preference2 === 0 ? 'checked' : '' }}> Oneens
                        </label>
                        <label class="text-black">
                            <input type="radio" name="preference2" value="1" {{ Auth::user()->preference2 === null || Auth::user()->preference2 === 1 ? 'checked' : '' }}> Weet ik niet
                        </label>
                        <label class="text-black">
                            <input type="radio" name="preference2" value="2" {{ Auth::user()->preference2 === 2 ? 'checked' : '' }}> Eens
                        </label>
                    </div>
                </div>

                <!-- Preference 3 -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg">
                    <p class="text-black text-center pb-2">Ik heb graag veel verantwoordelijkheid:</p>
                    <div class="flex justify-between gap-8">
                        <label class="text-black">
                            <input type="radio" name="preference3" value="0" {{ Auth::user()->preference3 === 0 ? 'checked' : '' }}> Oneens
                        </label>
                        <label class="text-black">
                            <input type="radio" name="preference3" value="1" {{ Auth::user()->preference3 === null || Auth::user()->preference3 === 1 ? 'checked' : '' }}> Weet ik niet
                        </label>
                        <label class="text-black">
                            <input type="radio" name="preference3" value="2" {{ Auth::user()->preference3 === 2 ? 'checked' : '' }}> Eens
                        </label>
                    </div>
                </div>

                <!-- Preference 4 -->
                <div class="mb-6 bg-[#D9E6B1] p-4 rounded-lg">
                    <p class="text-black text-center pb-2">Ik kan goed omgaan met computers:</p>
                    <div class="flex justify-between gap-8">
                        <label class="text-black">
                            <input type="radio" name="preference4" value="0" {{ Auth::user()->preference4 === 0 ? 'checked' : '' }}> Oneens
                        </label>
                        <label class="text-black">
                            <input type="radio" name="preference4" value="1" {{ Auth::user()->preference4 === null || Auth::user()->preference4 === 1 ? 'checked' : '' }}> Weet ik niet
                        </label>
                        <label class="text-black">
                            <input type="radio" name="preference4" value="2" {{ Auth::user()->preference4 === 2 ? 'checked' : '' }}> Eens
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center items-center">
                    <button
                        type="submit"
                        class="w-[296px] h-[53px] px-[44.50px] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex text-[#fbfcf6] text-base font-bold font-['Radikal'] leading-snug"
                    >
                        Opslaan
                    </button>
                </div>


            </form>
        </div>
    </div>

</x-nav>
