<div class="dates-plans scrollbar-outer">
@foreach($tasks as  $day=>$dailyTasks)
    <div class="date-plan-item">
        <div class="title">{{ $day }}</div>
        @foreach($dailyTasks as $task)
        <div class="date-notes">
            <div class="date-note-item 
            @if($task->priority == 0)
            green
            @elseif($task->priority == 1)
            yellow
            @else
            red
            @endif
            ">
                <div class="time">
                    <div class="time-start">{{ $task->start_time }}</div>
                    <div class="time-finish">{{ $task->end_time }}</div>
                </div>
                <div class="date-note-desc">
                    <div class="name-note">{{ $task->title }}</div>
                    <div class="desc-note">{{ $task->description }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endforeach
</div>