<x-app-layout>
  <div class="achtergrond">
    <a class="toevoegen" href="/camera/add">+</a>

    @foreach ($sensors as $sensor)
        {{$sensor->cameraNaam}}
        <iframe id="ytplayer" type="text/html" width="640" height="360"
      src={{"$sensor->cameraBeeld"}}
      frameborder="0"></iframe>
    @endforeach
  </div>
  
</x-app-layout>