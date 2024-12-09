<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white">{{ __('Profile Preferences') }}</h2>
    </x-slot>

    <div class="text-white">
        @if (session('status'))
            <p class="text-white">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('profile.preferences.update') }}">
            @csrf

            <!-- Preference 1 -->
            <div class="mb-4">
                <p class="font-bold text-white">Preference 1: Your opinion on X?</p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; gap: 10px;">
                    <label class="text-white">
                        <input type="radio" name="preference1" value="1">
                        Disagree
                    </label>
                    <label class="text-white">
                        <input type="radio" name="preference1" value="2">
                        Unsure
                    </label>
                    <label class="text-white">
                        <input type="radio" name="preference1" value="3">
                        Agree
                    </label>
                </div>
            </div>

            <!-- Preference 2 -->
            <div class="mb-4">
                <p class="font-bold text-white">Preference 2: Your opinion on Y?</p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; gap: 10px;">
                    <label class="text-white">
                        <input type="radio" name="preference2" value="1">
                        Disagree
                    </label>
                    <label class="text-white">
                        <input type="radio" name="preference2" value="2">
                        Unsure
                    </label>
                    <label class="text-white">
                        <input type="radio" name="preference2" value="3">
                        Agree
                    </label>
                </div>
            </div>

            <!-- Preference 3 -->
            <div class="mb-4">
                <p class="font-bold text-white">Preference 3: Your opinion on Z?</p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; gap: 10px;">
                    <label class="text-white">
                        <input type="radio" name="preference3" value="1">
                        Disagree
                    </label>
                    <label class="text-white">
                        <input type="radio" name="preference3" value="2">
                        Unsure
                    </label>
                    <label class="text-white">
                        <input type="radio" name="preference3" value="3">
                        Agree
                    </label>
                </div>
            </div>

            <!-- Preference 4 -->
            <div class="mb-4">
                <p class="font-bold text-white">Preference 4: Your opinion on A?</p>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); text-align: center; gap: 10px;">
                    <label class="text-white">
                        <input type="radio" name="preference4" value="1">
                        Disagree
                    </label>
                    <label class="text-white">
                        <input type="radio" name="preference4" value="2">
                        Unsure
                    </label>
                    <label class="text-white">
                        <input type="radio" name="preference4" value="3">
                        Agree
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" style="background-color: blue; color: white; padding: 10px 20px; border-radius: 5px;">
                    Save Preferences
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
