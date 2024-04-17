<x-app-layout>

    <div class="achtergrond">
        <div class="add-camera-container">
            <form method="POST" action="{{ route('camera.store') }}" enctype="multipart/form-data">
                @csrf
                <p class="auto-width"> Sla camera op als: </p>
                <textarea name="cameraNaam" placeholder="{{ __('Bijv. Woonkamer') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('pet') }}</textarea>
                <p class="auto-width"> Vul de link naar de camera in: </p>
                <p class="auto-width"> Vul het ID van de camera in: </p>
                <input type="text" name="sensorid" placeholder="{{__('Bijv. C-123')}}"
                    class="block w-full border-gray-100 focus:border-indigo-100 focus:ring focus:ring-indigo-50 focus:ring-opacity-50 rounded-md shadow-sm">


                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                <x-primary-button class="mt-4" class="button">{{ __('Add Camera') }}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>