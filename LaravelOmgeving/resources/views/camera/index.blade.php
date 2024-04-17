<x-app-layout>
  <div class="achtergrond">
    <div class="camera-container">
      <a class="toevoegen" href="/camera/add">+</a>

      @foreach ($sensors as $sensor)
          <p> {{$sensor->cameraNaam}} </p>
           <embed type="text/html" src={{"$sensor->cameraBeeld"}}  width="500" height="200">
      @endforeach
    </div>
  </div>
  

</x-app-layout>