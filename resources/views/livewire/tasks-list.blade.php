<div class="dates-plans scrollbar-outer">
@foreach($tasks as  $day=>$dailyTasks)
    <div class="date-plan-item">
        <div class="title">{{ $day }}</div>
        @if($dailyTasks->isEmpty())
        <div class="date-notes">
            Пусто
        </div>
        @endif
        @foreach($dailyTasks as $task)
        <div class="date-notes">
            <div class="date-note-item 
            @if($task->task_priority_id == 1)
            green
            @elseif($task->task_priority_id == 2)
            yellow
            @else
            red
            @endif
            ">
                <div class="time">
                    <div class="time-start">{{ $task->getFormattedStartTime() }}</div>
                    <div class="time-finish">{{ $task->getFormattedEndTime() }}</div>
                </div>
                <div class="date-note-desc">
                    <a href="{{ route('tasks.show', ['task'=>$task]) }}" class="name-note"
                    >{{ $task->title }} - {{ $task->status->name }}</a>
                    <div class="desc-note">{{ $task->description }}</div>
                    @if($task->company)
                    <div class="desc-note"><b>{{ $task->company->legal }} {{ $task->company->name }}</b></div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endforeach
</div>