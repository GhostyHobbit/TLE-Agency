<x-nav>
    <header class="bg-mosslight py-6 px-4 sm:px-8 shadow-md">
        <h1 class="text-3xl font-bold text-center text-mossFoot">Welkom bij Open Hiring</h1>
    </header>

    <main class="px-4 sm:px-8 py-8 space-y-12 bg-cream">
        <!-- Main Section -->
        <section class="relative">
            <div class="absolute inset-0 z-[-1] bg-gradient-to-r from-mosslight via-cream to-mosslight h-full"></div>
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row lg:items-center lg:gap-12">
                <div class="lg:w-1/2">
                    <h2 class="text-4xl font-bold text-mossFoot mb-6">Iedereen kan meedoen</h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Iedereen een eerlijke kans op een baan. Daar draait het om bij Open Hiring. Het gaat er niet om
                        of iemand een diploma, vlotte babbel of bakken ervaring heeft, maar of iemand wíl en kan werken.
                        Bedrijven die mensen zoeken via Open Hiring houden dus geen sollicitatiegesprekken. Zo hebben
                        vooroordelen geen kans. Werkzoekenden bepalen zelf of ze geschikt zijn voor een baan.
                        Zo maken we de arbeidsmarkt eerlijk. En krijgen we mensen snel (weer) aan het werk.
                    </p>
                </div>
                <div class="lg:w-1/2 mt-8 lg:mt-0 lg:order-last">
                    <img src="{{ asset('images/openhiring website main pic.webp') }}" alt="Iedereen kan meedoen" class="rounded-lg shadow-lg w-full h-auto">
                </div>
            </div>
        </section>

        <!-- Principles Section -->
        <section class="max-w-7xl mx-auto space-y-12">
            <h2 class="text-3xl font-bold text-mossFoot mb-4 text-center">3 Principes van Open Hiring</h2>
            <div class="grid gap-12 lg:grid-cols-3">
                <!-- Principle 1 -->
                <div class="bg-mosslight shadow-md rounded-lg p-6 border border-gray-400 space-y-4">
                    <h3 class="text-2xl font-bold text-mossFoot">1. Het werkt beter zonder (voor)oordelen</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Met Open Hiring krijgen (voor)oordelen geen kans. En mensen die vaak (onbewust) worden uitgesloten
                        juist wel. Dat maakt de arbeidsmarkt eerlijker en mooier.
                    </p>
                </div>

                <!-- Principle 2 -->
                <div class="bg-mosslight shadow-md rounded-lg p-6 border border-gray-400 space-y-4">
                    <h3 class="text-2xl font-bold text-mossFoot">2. We vertrouwen elkaar</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Werkzoekenden kunnen zelf prima beoordelen of ze een baan aankunnen. Door daarop te vertrouwen,
                        in mensen te geloven, worden organisaties (veer)krachtiger en diverser.
                    </p>
                </div>

                <!-- Principle 3 -->
                <div class="bg-mosslight shadow-md rounded-lg p-6 border border-gray-400 space-y-4">
                    <h3 class="text-2xl font-bold text-mossFoot">3. Groeien doe je samen</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Ieder mens heeft mooie en minder mooie kanten én momenten. Door elkaar helemaal te accepteren,
                        en te helpen, wordt een team sterker en beter in staat van elkaar te leren.
                    </p>
                </div>
            </div>
        </section>

        <!-- Centered Button with Route -->
        <div class="flex justify-center mt-12">
            <a href="{{ route('video') }}"
               class="w-72 h-20 bg-violet rounded-2xl border-b-2 border-violetDark flex items-center justify-between px-4 hover:bg-violetDark active:bg-violet">
                <!-- Button Text -->
                <span class="text-white text-xl font-bold">Bekijk Video</span>

                <!-- Sprite Icon -->
                <img src="{{ asset('images/right-arrow-buttons.png') }}" alt="Sprite Icon" class="w-6 h-6">
            </a>
        </div>



        <!-- How Open Hiring Works -->
        <section class="px-4 sm:px-8 py-12 bg-cream">
            <div class="max-w-7xl mx-auto space-y-12">
                <!-- Header -->
                <div class="text-center">
                    <h2 class="text-4xl font-bold text-mossFoot mb-4">Hoe werkt Open Hiring?</h2>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        Bij Open Hiring draait alles om eenvoud en anonimiteit. Geen sollicitatiegesprekken, geen lastige vragen—gewoon jouw bereidheid om te werken staat centraal.
                    </p>
                </div>

                <!-- Process Steps -->
                <div class="grid gap-12 lg:grid-cols-2">
                    <!-- Step 1 -->
                    <div class="bg-mosslight shadow-md rounded-lg p-6 border border-gray-400 space-y-4">
                        <h3 class="text-2xl font-bold text-mossFoot">1. Kies een baan die bij je past</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Kijk welke banen beschikbaar zijn en beoordeel zelf of je de capaciteiten hebt om deze aan te kunnen. Het gaat om wat jij denkt dat je kunt, niet om je cv.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-mosslight shadow-md rounded-lg p-6 border border-gray-400 space-y-4">
                        <h3 class="text-2xl font-bold text-mossFoot">2. Meld je aan voor de lijst</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Vul een eenvoudig formulier in om je aan te melden. Je komt op een wachtlijst terecht, waarbij de volgorde van aanmelding bepaalt wie de kans krijgt.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-mosslight shadow-md rounded-lg p-6 border border-gray-400 space-y-4">
                        <h3 class="text-2xl font-bold text-mossFoot">3. Wacht op uitnodiging van de werkgever</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Zodra het jouw beurt is, word je anoniem uitgenodigd door de werkgever. Ze kennen alleen jouw bereidheid om te werken en niet je achtergrond of verleden.
                        </p>
                    </div>

                    <!-- Step 4 -->
                    <div class="bg-mosslight shadow-md rounded-lg p-6 border border-gray-400 space-y-4">
                        <h3 class="text-2xl font-bold text-mossFoot">4. Begin met werken</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Je start met werken in een omgeving waar vertrouwen en gelijkwaardigheid centraal staan. Laat zien wat je kunt en groei in je nieuwe rol.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Centered Button with Route -->
        <div class="flex justify-center mt-12">
            <a href="{{ route('vacancies.index') }}"
               class="w-72 h-20 bg-violet rounded-2xl border-b-2 border-violetDark flex items-center justify-between px-4 hover:bg-violetDark active:bg-violet">
                <!-- Button Text -->
                <span class="text-white text-xl font-bold">Bekijk vacatures</span>
                <!-- Sprite Icon -->
                <img src="{{ asset('images/right-arrow-buttons.png') }}" alt="Sprite Icon" class="w-6 h-6">
            </a>
        </div>
    </main>
</x-nav>
