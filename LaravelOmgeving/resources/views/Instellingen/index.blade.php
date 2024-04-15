<x-app-layout>
    <div class="achtergrond">
        <div class="instelling-container">
            <p> Alarm </p>

            <!-- <button id="myButton" class="button-white">Click me</button> -->
            
            <label id="alarmButton" data-alarm="<?php echo htmlspecialchars($alarm->alarm); ?>" class="button-white">
                <input id="alarmButtonCheckbox" type="checkbox">
                <a href="/alarm">
                <div id="alarmButtonBackground" class="toggle-switch-background">
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
    <input type="hidden" id="alarmValue" value="{{ $alarm->alarm }}">
</x-app-layout>