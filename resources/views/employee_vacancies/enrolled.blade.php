<x-nav>
    <div class="w-[96vw] m-2 bg-violet min-h-[85vh] position-relative rounded-lg xl:w-[30vw]">
        <div class="p-4">
            <h3 class="text-h3 text-cream">U heeft zich ingeschreven!</h3>
            <p class="text-p text-cream font-cold">Wat nu?</p>
        </div>
        <div class="bg-violet p-4">
            <ol class="list-decimal list-inside pl-5">
                <li class="text-p text-cream">U staat nu op de wachtlijst</li>
                <li class="text-p text-cream">Als u aan de beurt bent, krijgt u een bericht van de werkgever</li>
                <li class="text-p text-cream">In dit bericht staat een datum voor een afspraak</li>
                <li class="text-p text-cream">U kunt de datum accepteren, wijzigen of weigeren</li>
                <li class="text-p text-cream">Als u de afspraak weigert wordt u uitgeschreven bij de vacature</li>
                <li class="text-p text-cream">Als u de afspraak accepteert heeft u uw eerste werkdag te pakken!</li>
            </ol>
            <p class="text-p text-cream">U kunt uw inschrijvingen terug vinden in uw profiel. Daar kunt u ook uw plaats in de wachtlijst bekijken.</p>
        </div>
        <div class="py-2 flex justify-center bg-cream rounded-2xl border-b-4 border-mossDark border-2 mx-4">
            <a href="{{ url(route('vacancies.index')) }}" class="text-mossDark text-base font-bold font-['Radikal'] leading-snug">Vind meer vacatures</a>
        </div>
    </div>
</x-nav>
