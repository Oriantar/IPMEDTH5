<x-app-layout>
    <div class="achtergrond">
        <div class="instelling-container">
            <p> Alarm </p>

            <!-- <button id="myButton" class="button-white">Click me</button> -->
            
            <label class="toggle-switch">
                <a href="/alarm">
                <input type="checkbox">
                <div class="toggle-switch-background">
                    <div class="toggle-switch-handle"></div>
                </div>
                </a>
            </label>
            <p> Notificaties </p>
            <a href="/notification">Notificaties</a>
        </div>

        Alarm is {{$alarm->alarm}}
        Notification is {{$notification->notification}}
    </div>
</x-app-layout>