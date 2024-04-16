<x-app-layout>
    <div class="achtergrond">
        <div class="instellingen-container">
            <p> Alarm </p>

            <!-- <button id="myButton" class="button-white">Click me</button> -->
            
            <label id="alarmButton" data-alarm="<?php echo htmlspecialchars($alarm->alarm); ?>" class="button-white">
                <input id="alarmButtonCheckbox" type="checkbox">
                <a href="/alarm">
                <div id="alarmButtonBackground" class="toggle-switch-background">
                    <div id="alarmHandle" class="toggle-switch-handle"></div>
                </div>
                </a>
            </label>
            <p> Notificaties </p>
            <label id="notificatieButton" data-notificatie="<?php echo htmlspecialchars($notification->notification); ?>" class="button-white">
                <input id="notificatieButtonCheckbox" type="checkbox">
                <a href="/notification">
                <div id="notificatieButtonBackground" class="toggle-switch-background">
                    <div id="notificatieHandle" class="toggle-switch-handle"></div>
                </div>
                </a>
            </label>
        </div>

        Alarm is {{$alarm->alarm}}
        Notification is {{$notification->notification}}
    </div>
    <input type="hidden" id="alarmValue" value="{{ $alarm->alarm }}">
    <input type="hidden" id="notificatieValue" value="{{ $notification->notification }}">
</x-app-layout>