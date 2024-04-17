<x-app-layout>
  <div class="achtergrond">
    <div class="camera-container">
      <a class="toevoegen" href="/camera/add">+</a>

      @foreach ($sensors as $sensor)
          <p> {{$sensor->cameraNaam}} </p>
          <iframe id="ytplayer" type="text/html" width="640" height="360"
        src={{"$sensor->cameraBeeld"}}
        frameborder="0"></iframe>
      @endforeach
    </div>
  </div>
  
</x-app-layout>