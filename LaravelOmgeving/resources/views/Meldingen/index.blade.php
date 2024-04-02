<x-app-layout>
    @php
        $handledInbraakmeldingen = []; // Array om bij te houden welke inbraakmeldingen al zijn behandeld
    @endphp

    @if (count($inbraakmeldingen) > 0 && count($sensoren) > 0)
        @foreach ($inbraakmeldingen->reverse() as $inbraakmelding)
            @php
                $inbraakmelding_id = $inbraakmelding->id;
            @endphp
            @unless (in_array($inbraakmelding_id, $handledInbraakmeldingen))
                @php
                    $handledInbraakmeldingen[] = $inbraakmelding_id; // Voeg de ID toe aan de lijst van behandelde inbraakmeldingen
                @endphp
                
                @foreach ($sensoren as $sensor)
                    @php
                        $sensorid = $sensor->sensorid;
                    @endphp
                    @if ($sensorid == $inbraakmelding->sensor_id)
                        @if (strtotime(Auth()->user()->last_login) < strtotime($inbraakmelding->created_at))
                            <p>Nieuw:</p>
                        @endif
                        <h4>Sensor ID: {{ $sensorid }}</h4>
                        <p>Sensor Camera Naam: {{ $sensor->cameraNaam }}</p>
                        <p>Om deze tijd: {{ $inbraakmelding->created_at }}</p>
                        <hr>
                        @break
                    @endif
                @endforeach
            @endunless
        @endforeach
    @else
        <p>Geen inbraakmeldingen of sensoren gevonden.</p>
    @endif
</x-app-layout>
