<x-app-layout>
<a href="/camera/add">add</a>

@foreach ($sensors as $sensor)
    {{$sensor->cameraNaam}}
    <iframe id="ytplayer" type="text/html" width="640" height="360"
  src={{"$sensor->cameraBeeld"}}
  frameborder="0"></iframe>
  <embed type="text/html" src={{"$sensor->cameraBeeld"}}  width="500" height="200">
@endforeach
</x-app-layout>