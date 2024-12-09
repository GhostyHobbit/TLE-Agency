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
                <div class="bg-mosslight shadow-md rounded-lg p-6 space-y-4">
                    <h3 class="text-2xl font-bold text-mossFoot">1. Het werkt beter zonder (voor)oordelen</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Met Open Hiring krijgen (voor)oordelen geen kans. En mensen die vaak (onbewust) worden uitgesloten
                        juist wel. Dat maakt de arbeidsmarkt eerlijker en mooier.
                    </p>
                </div>

                <!-- Principle 2 -->
                <div class="bg-mosslight shadow-md rounded-lg p-6 space-y-4">
                    <h3 class="text-2xl font-bold text-mossFoot">2. We vertrouwen elkaar</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Werkzoekenden kunnen zelf prima beoordelen of ze een baan aankunnen. Door daarop te vertrouwen,
                        in mensen te geloven, worden organisaties (veer)krachtiger en diverser.
                    </p>
                </div>

                <!-- Principle 3 -->
                <div class="bg-mosslight shadow-md rounded-lg p-6 space-y-4">
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
            <a href="{{ route('vacancies.index') }}"
               class="w-72 h-20 bg-pink-700 rounded-2xl border-b-2 border-pink-900 flex items-center justify-between px-4 hover:bg-pink-800 active:bg-pink-600">
                <!-- Button Text -->
                <span class="text-white text-xl font-bold">Vacatures</span>

                <!-- Sprite Icon -->
                <img src="{{ asset('images/right-arrow-buttons.png') }}" alt="Sprite Icon" class="w-6 h-6">
            </a>
        </div>

    </main>
</x-nav>
