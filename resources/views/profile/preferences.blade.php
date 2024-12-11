
<x-nav>

<x-slot name="header">
        <h2 class="text-black">{{ __('Profile Preferences') }}</h2>
    </x-slot>

    <div class="text-black">
        @if (session('status'))
            <p class="text-green-500">{{ session('status') }}</p>
        @endif


            <form method="POST" action="{{ route('profile.preferences.update') }}">
                @csrf

            <!-- Preference 1 -->
            <div class="mb-4">
                <p class="font-bold text-black">Preference 1: Your opinion on X?</p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; gap: 10px;">
                    <label class="text-black">
                        <input type="radio" name="preference1" value="0" {{ Auth::user()->preference1 === 0 ? 'checked' : '' }}> Disagree
                    </label>
                    <label class="text-black">
                        <input type="radio" name="preference1" value="1" {{ Auth::user()->preference1 === null || Auth::user()->preference1 === 1 ? 'checked' : '' }}> Unsure
                    </label>
                    <label class="text-black">
                        <input type="radio" name="preference1" value="2" {{ Auth::user()->preference1 === 2 ? 'checked' : '' }}> Agree
                    </label>
                </div>
            </div>

            <!-- Preference 2 -->
            <div class="mb-4">
                <p class="font-bold text-black">Preference 2: Your opinion on Y?</p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; gap: 10px;">
                    <label class="text-black">
                        <input type="radio" name="preference2" value="0" {{ Auth::user()->preference2 === 0 ? 'checked' : '' }}> Disagree
                    </label>
                    <label class="text-black">
                        <input type="radio" name="preference2" value="1" {{ Auth::user()->preference2 === null || Auth::user()->preference2 === 1 ? 'checked' : '' }}> Unsure
                    </label>
                    <label class="text-black">
                        <input type="radio" name="preference2" value="2" {{ Auth::user()->preference2 === 2 ? 'checked' : '' }}> Agree
                    </label>
                </div>
            </div>

            <!-- Preference 3 -->
            <div class="mb-4">
                <p class="font-bold text-black">Preference 3: Your opinion on Z?</p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; gap: 10px;">
                    <label class="text-black">
                        <input type="radio" name="preference3" value="0" {{ Auth::user()->preference3 === 0 ? 'checked' : '' }}> Disagree
                    </label>
                    <label class="text-black">
                        <input type="radio" name="preference3" value="1" {{ Auth::user()->preference3 === null || Auth::user()->preference3 === 1 ? 'checked' : '' }}> Unsure
                    </label>
                    <label class="text-black">
                        <input type="radio" name="preference3" value="2" {{ Auth::user()->preference3 === 2 ? 'checked' : '' }}> Agree
                    </label>
                </div>
            </div>

            <!-- Preference 4 -->
            <div class="mb-4">
                <p class="font-bold text-black">Preference 4: Your opinion on A?</p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; gap: 10px;">
                    <label class="text-black">
                        <input type="radio" name="preference4" value="0" {{ Auth::user()->preference4 === 0 ? 'checked' : '' }}> Disagree
                    </label>
                    <label class="text-black">
                        <input type="radio" name="preference4" value="1" {{ Auth::user()->preference4 === null || Auth::user()->preference4 === 1 ? 'checked' : '' }}> Unsure
                    </label>
                    <label class="text-black">
                        <input type="radio" name="preference4" value="2" {{ Auth::user()->preference4 === 2 ? 'checked' : '' }}> Agree
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
                <button
                    type="submit"
                    class="!w-[296px] !h-[53px] !px-[44.50px] !py-4 !bg-[#92AA83] !rounded-2xl !border-b-4 !border-[#2E342A] !justify-center !items-center !inline-flex !text-[#fbfcf6] !text-base !font-bold !font-['Radikal'] !leading-snug"
                >
                    Opslaan
                </button>

        </form>
    </div>

    </x-nav>

