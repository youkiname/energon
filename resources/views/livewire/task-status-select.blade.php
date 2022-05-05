<div class="request-info__item">
    <p>Статус</p>
    <div class="task-status" wire:ignore>
        <select name="task_status" id="task_status">
            @foreach($statuses as $status)
            <option value="{{ $status->id }}" 
            @if($status->id == $task->status->id) selected @endif
            >{{ $status->name }}</option>
            @endforeach
        </select>
    </div>
    <b style="color: #2E5BFF;
    @if(!$showConfirmInfo)
    display: none;
    @endif
    ">Запрос на подтверждение закрытия задачи отправлен</b>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $("#task_status").on('change', function() {
                Livewire.emit('changeTaskStatus', $("#task_status").val())
            });
        });
    </script>
</div>