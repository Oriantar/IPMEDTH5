<x-app-layout>
    <form method="POST" action="{{ route('camera.store') }}" enctype="multipart/form-data">
        @csrf
        <textarea name="cameraNaam" placeholder="{{ __('Wat is de naam van de plek voor de camera?') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('pet') }}</textarea>    
        <input type="text" name="sensorid" placeholder="{{__('Wat is het id van de camera?')}}"
            class="block w-full border-gray-100 focus:border-indigo-100 focus:ring focus:ring-indigo-50 focus:ring-opacity-50 rounded-md shadow-sm">

        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Add Camera') }}</x-primary-button>
    </form>
</x-app-layout>