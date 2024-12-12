<x-nav>
    <x-slot name="header">
        <h2>
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div>
            <div>
                <div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div>
                <div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="mb-4 flex justify-center items-center">
                <a href="{{ route('profile.preferences') }}" class="w-[296px] h-[53px] px-[44.50px] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex text-[#fbfcf6] text-base font-bold font-['Radikal'] leading-snug">
                    {{ __('Voorkeuren') }}


                </a>
            </div>

            <div>
                <div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

</x-nav>
