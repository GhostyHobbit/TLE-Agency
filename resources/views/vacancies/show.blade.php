<x-nav>
{{--Info--}}
    <h1 class="text-h1 mx-4 my-2 lg:mx-[4vw]">{{ $vacancy->name }}</h1>
    <div class="flex items-center mx-4 my-2 lg:mx-[4vw]">
        @if($vacancy->path)
            <img src="{{ asset('storage/' . $vacancy->employer->company->logo_path) }}" alt="{{ $vacancy->employer->company->name }} Logo" class="h-[5vh] w-auto">
        @else
            <img src="{{ asset('images/openhiring.png') }}" alt="{{ $vacancy->employer->company->name }} Logo" class="h-[5vh] w-auto">
        @endif
        <p class="text-p mx-4">{{ $vacancy->employer->company->name }}</p>
    </div>
    <div class="flex justify-between items-center mx-4 lg:ml-[4vw]">
        <div class="my-2">
            <ul>
                <li class="text-p font-bold">Locatie: {{ $vacancy->location }}</li>
                <li class="text-p font-bold">Uren: {{ $vacancy->hours }} uur</li>
                <li class="text-p font-bold">Uurloon: €{{ $vacancy->salary }} per uur</li>
            </ul>
        </div>
        <div class="bg-mossLight pl-3 pr-3 py-4 rounded-lg my-2 lg:w-[35vw]">
            <p class="text-p font-bold mb-2">Interesse?</p>
            @auth
                @if($userCheck === null)
                    <div id="openEnrollTwo" class="w-[40vw] h-[6vh] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160] lg:w-[33vw]">
                        <a class="text-cream text-base font-bold font-['Radikal'] leading-snug">Schrijf in</a>
                    </div>
                @else
                    <div id="openEnrollTwo" class="w-[40vw] h-[6vh] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160] lg:w-[33vw]">
                        <a class="text-cream text-base font-bold font-['Radikal'] leading-snug">Schrijf uit</a>
                    </div>
                @endif
            @else
                <form action="{{ url(route('employee-vacancies.store')) }}" method="POST">
                    @csrf
                    <div class="modal-footer w-[40vw] h-[6vh] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160] lg:w-[33vw]">
                        <button class="text-cream text-base font-bold font-['Radikal'] leading-snug">Log in</button>
                    </div>
                </form>
            @endauth
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-4 lg:gap-8 px-4">
        @if($vacancy->path)
            <img src="{{ asset('storage/' . $vacancy->path) }}" alt="Banner-foto-baan"
                 class="h-[25vh] w-full my-4 rounded-lg object-cover object-center lg:hidden mx-auto">
        @else
            <img src="{{ asset('images/placeholderbanner.jpg') }}" alt="Placeholder banner"
                 class="h-[20vh] w-full my-4 rounded-lg object-cover object-center lg:hidden mx-auto">
        @endif

    {{-- Description --}}
        <div class="flex flex-col lg:w-[60%]">
            {{-- Function Section --}}
            <div>
                <div id="functionHeader" class="w-[92vw] mt-4 bg-mossLight border-2 border-mossDark rounded-lg px-3 py-1 flex justify-between items-center cursor-pointer md:w-[45vw]">
                    <h2 class="text-p font-bold text-lg">Over de functie</h2>
                    <svg class="w-5 h-5 transform rotate-180 lg:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
                    </svg>
                </div>
                <div id="functionDescription" class="w-[92vw] border-2 border-mossDark rounded-lg px-3 py-1 hidden md:w-[45vw] lg:block">
                    <p class="text-p my-2 font-bold">Wat moet u doen?</p>
                    <p class="text-p my-2">{{ $vacancy->description }}</p>

                    {{-- Uw taken --}}
                    <p class="text-p my-2 font-bold">Uw taken</p>
                    <ul class="list-disc list-inside pl-5">
                        @foreach(explode("\n", $vacancy->tasks) as $task)
                            @if(!empty(trim($task)))
                                <li>{{ $task }}</li>
                            @endif
                        @endforeach
                    </ul>

                    {{-- Kwaliteiten --}}
                    <p class="text-p my-2 font-bold">Kwaliteiten</p>
                    <ul class="list-disc list-inside pl-5">
                        @foreach(explode("\n", $vacancy->qualifications) as $quality)
                            @if(!empty(trim($quality)))
                                <li>{{ $quality }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>


            {{-- Offer Section --}}
            <div>
                <div id="offerHeader" class="w-full mt-4 bg-mossLight border-2 border-mossDark rounded-lg px-3 py-1 flex justify-between items-center cursor-pointer">
                    <h2 class="text-p font-bold text-lg">Wat bieden wij</h2>
                    <svg class="w-5 h-5 transform rotate-180 lg:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="#AA0160" fill="#AA0160">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7H5z" />
                    </svg>
                </div>
                <div id="offerDescription" class="w-full border-2 border-mossDark rounded-lg px-3 py-1 hidden lg:block">
                    <p class="text-p mt-2 font-bold">Loon</p>
                    <ul class="list-disc list-inside pl-5 mb-2">
                        <li class="text-p">€{{ $vacancy->salary }} per uur</li>
                    </ul>
                    <p class="text-p font-bold">Uren</p>
                    <ul class="list-disc list-inside pl-5 mb-2">
                        <li class="text-p">{{ $vacancy->hours }} uur</li>
                    </ul>
                    <p class="text-p font-bold">Vakantie dagen</p>
                    <ul class="list-disc list-inside pl-5 mb-2">
                        <li class="text-p">Onbetaald verlof</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Desktop Image Banner --}}
        @if($vacancy->path)
            <img src="{{ asset('storage/' . $vacancy->path) }}" alt="Banner-foto-baan"
                 class="hidden lg:block lg:w-[40%] rounded-lg object-cover object-top">
        @else
            <img src="{{ asset('images/placeholderbanner.jpg') }}" alt="Placeholder banner"
                 class="hidden lg:block lg:w-[40%] rounded-lg object-cover object-top">
        @endif
    </div>

    <div class="my-4 mx-4 lg:mx-[4vw]">
        <p class="text-p font-bold mb-2">Interesse?</p>
        @auth
            <div id="openEnroll" class="w-[92vw] h-[8vh] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160] lg:w-[45vw]">
                <a class="text-cream text-base font-bold font-['Radikal'] leading-snug">Schrijf in</a>
            </div>
        @else
            <form action="{{ url(route('employee-vacancies.store')) }}" method="POST">
                @csrf
                <div class="modal-footer w-[92vw] h-[8vh] py-4 bg-[#aa0160] rounded-2xl border-b-4 border-[#7c1a51] justify-center items-center inline-flex hover:bg-[#7c1a51] active:bg-[#aa0160] lg:w-[45vw]">
                    <button class="text-cream text-base font-bold font-['Radikal'] leading-snug">Log in</button>
                </div>
            </form>
        @endauth
    </div>

{{--Enrolling popup--}}
    <div id="myEnroll" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden xl:justify-end">
        <!-- Modal Content -->
        <div class="w-[96vw] min-h-[45vh] m-2 bg-violet rounded-lg xl:w-[30vw]">
            <div class="modal-header p-4 flex justify-between items-center">
                <p class="text-navLink text-cream font-bold">Bevestigen?</p>
                <button id="closeEnroll" class="text-black hover:text-gray-700" aria-label="Close">
                    &times;
                </button>
            </div>
            <div class="modal-body bg-violet p-4">
                <p class="text-p text-cream">
                    U gaat zich
                    @if($userCheck === null)
                        inschrijven
                    @else
                        uitschrijven
                    @endif
                    voor <span class="font-bold">{{ $vacancy->name }} bij {{ $vacancy->employer->company->name }}</span>
                    Weet u dit zeker?
                </p>
            </div>
            @if($userCheck === null)
                <form action="{{ url(route('employee-vacancies.store')) }}" method="POST">
                    @csrf
                    <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                    <div class="modal-footer py-2 flex justify-center bg-cream rounded-2xl border-b-4 border-mossDark mx-4 my-2 hover:bg-mossLight active:bg-cream">
                        <button class="text-mossDark text-base font-bold font-['Radikal'] leading-snug">Bevestig inschrijving</button>
                    </div>
                </form>
            @else
                <form action="{{ url(route('employee-vacancies.destroy', $userCheck->id)) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
                    <div class="modal-footer py-2 flex justify-center bg-cream rounded-2xl border-b-4 border-mossDark mx-4 my-2 hover:bg-mossLight active:bg-cream">
                        <button class="text-mossDark text-base font-bold font-['Radikal'] leading-snug">Bevestig uitschrijving</button>
                    </div>
                </form>
            @endif

            <div id="closeEnrollFooter" class="modal-footer py-2 flex justify-center bg-violet rounded-2xl border-b-4 border-violetDark border-2 mx-4 my-2 hover:bg-[#7c1a51] active:bg-[#aa0160]">
                <button class="text-cream text-base font-bold font-['Radikal'] leading-snug">Ga Terug</button>
            </div>
        </div>
    </div>

{{--Javascript for dropdowns--}}
    <script>
        // Get elements
        const functionHeader = document.getElementById('functionHeader');
        const functionDescription = document.getElementById('functionDescription');

        const offerHeader = document.getElementById('offerHeader');
        const offerDescription = document.getElementById('offerDescription');

        // Toggle function for "Over de functie"
        functionHeader.addEventListener('click', () => {
            functionDescription.classList.toggle('hidden');
        });

        // Toggle function for "Wat bieden wij"
        offerHeader.addEventListener('click', () => {
            offerDescription.classList.toggle('hidden');
        });

        const enroll = document.getElementById('myEnroll');
        const openEnrollButton = document.getElementById('openEnroll');
        const openEnrollButtonTwo = document.getElementById('openEnrollTwo');
        const closeEnrollButtons = document.querySelectorAll('#closeEnroll, #closeEnrollFooter');

        // Open modal
        openEnrollButton.addEventListener('click', () => {
            enroll.classList.remove('hidden');
        });

        openEnrollButtonTwo.addEventListener('click', () => {
            enroll.classList.remove('hidden');
        });

        // Close modal
        closeEnrollButtons.forEach(button => {
            button.addEventListener('click', () => {
                enroll.classList.add('hidden');
            });
        });

        // Close modal when clicking outside of it
        enroll.addEventListener('click', (event) => {
            if (event.target === enroll) {
                enroll.classList.add('hidden');
            }
        });
    </script>
</x-nav>
