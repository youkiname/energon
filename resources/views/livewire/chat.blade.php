<div>
    <div class="messages-box" id="messages-box" wire:poll.10s="updateMessages">
        @if($messages->count() == 0)
            <div class="messages-box__empty">Пока что никто ничего не написал</div>
        @endif

        @foreach($messages as $message)
        <div class="messages-box__item 
        @if($message->sender_id == Auth::user()->id)
        messages-box__item-you
        @endif
        ">
            <div class="messages-box__item-name">{{ $message->sender->name }}</div>
            <div class="messages-box__item-text">
                {{ $message->text }}
            </div>
            <div class="messages-box__item-date">
                <b>{{ $message->created_at->diffForHumans() }}</b>
            </div>
        </div>
        @endforeach
    </div>
    <form wire:submit.prevent="send" class="form-message" id="message-form">
        <!-- <label class="add-files">
            <input type="file">
            <span></span>
        </label> -->

        <input name="message" placeholder="Напишите сообщение..."
        wire:model="inputText"></input>
        <button class="send-message" type="submit"></button>
        <button class="send-message send-message-loading" 
        type="button" wire:loading></button>
    </form>
    <script>
        // scroll messages to bottom
        let msgBox = document.getElementById("messages-box");
        msgBox.scrollTop = msgBox.scrollHeight;
    </script>
</div>
