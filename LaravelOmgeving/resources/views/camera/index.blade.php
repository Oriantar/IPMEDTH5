<x-app-layout>
<a href="/camera/add">add</a>

@foreach ($sensors as $sensor)
    {{$sensor->cameraNaam}}
    <iframe id="ytplayer" type="text/html" width="640" height="360"
  src={{"$sensor->cameraBeeld"}}
  frameborder="0"></iframe>
@endforeach
</x-app-layout>