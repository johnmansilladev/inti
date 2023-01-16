<div class="announcement-item">
    <div class="announcement-description">
        <p class="announcement-title">{!! $announcement->title !!}</p>
        @if ($announcement->content)
        <p class="announcement-content">{!! $announcement->content !!}</p>
        @endif
    </div>
    @if ($announcement->type == 2)
    <div class="announcement-countdown" wire:poll.1000ms="tick">
        @if ($diff['days'])
        <div class="clock">
            <div class="clock-time">{{ $diff['days'] }}</div>
            <div class="clock-text">días</div>
        </div>
        @endif 
        <div class="clock">
            <div class="clock-time">{{ $diff['hours'] }}</div>
            <div class="clock-text">hrs</div>
        </div>
        <div class="clock">
            <div class="clock-time">{{ $diff['minutes'] }}</div>
            <div class="clock-text">min</div>
        </div>
        <div class="clock">
            <div class="clock-time">{{ $diff['seconds'] }}</div>
            <div class="clock-text">seg</div>
        </div>
    </div>
    @endif
</div>