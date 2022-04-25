<form action="{{ route('tasks.store') }}" method="POST" 
    id="new-task-form" class="form-request" enctype="multipart/form-data">
    @csrf
    @if(isset($companyId))
    <input type="hidden" name="company_id" value="{{ $companyId }}">
    @endif
    <div class="form-request__item">
        <x-input name="title" labelName="Заголовок"/>
    </div>
    <div class="form-request__item">
        <label for="description">Описание</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
    </div>
    <div class="form-request__item" style="margin-bottom: 60px;">
        <label for="">Контактное лицо</label>
        <select name="target_user_id" >
            <option value="0" selected>Пусто</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-request__item"style="margin-bottom: 60px;">
        <label for="">Статус</label>
        <select name="status_id" >
            @foreach($statuses as $status)
            <option value="{{ $status->id }}">{{ $status->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-request__item">
        <label for="">Приоритет</label>
        <div class="priority-box">
            <label class="priority priority-low" for="low">
                <input type="radio" name="input_priority" id="low" value="1" checked> <span><i></i></span>
            </label>
            <label class="priority priority-middle" for="middle">
                <input type="radio" name="input_priority" id="middle" value="2"> <span><i></i></span>
            </label>
            <label class="priority priority-high" for="high">
                <input type="radio" name="input_priority" id="high" value="3"> <span><i></i></span>
            </label>
        </div>
    </div>
    <div class="form-request__item">
        <x-input name="date" labelName="Дата" class="date-request"/>
    </div>
    <div class="dates-request">
        <input type="time" id="start_time" name="start_time"
        class="@error('start_time') is-invalid @enderror" value="{{ old('start_time') ?? '08:00' }}">
        
        <input type="time" id="end_time" name="end_time"
        class="@error('end_time') is-invalid @enderror" value="{{ old('end_time') ?? '09:00' }}">
    </div>
    @error('start_time')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    @error('end_time')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <button class="btn-blue" type="submit">Добавить</button>
</form>