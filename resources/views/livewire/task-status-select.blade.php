<div class="request-info__item">
    <span>Статус</span>
    <b class="task-status" wire:ignore>
        <select name="task_status" id="task_status">
            @foreach($statuses as $status)
            <option value="{{ $status->id }}" 
            @if($status->id == $task->status->id) selected @endif
            >{{ $status->name }}</option>
            @endforeach
        </select>
    </b>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $("#task_status").on('change', function() {
                Livewire.emit('changeTaskStatus', $("#task_status").val())
            });
        });
    </script>
</div>