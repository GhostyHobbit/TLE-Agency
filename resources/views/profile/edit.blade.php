<x-nav>


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

            <div class="flex flex-col justify-center items-center space-y-2 mb-12">
                <!-- Optional Header Content -->
                <div class="rounded-lg">
                    <h2 class="text-lg text-center">Uw persoonlijkheid</h2>
                </div>

                <a href="{{ route('profile.preferences') }}" class="!w-[296px] !h-[53px] !px-[44.50px] !py-4 bg-[#aa0160] hover:bg-[#7c1a51] active:bg-[#aa0160] !rounded-2xl !border-b-4 !border-[#2E342A] !justify-center !items-center !inline-flex !text-[#fbfcf6] !text-base !font-bold !font-['Radikal'] !leading-snug !normal-case">
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
