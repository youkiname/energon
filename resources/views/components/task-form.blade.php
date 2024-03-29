<form action="{{ route('tasks.store', ['previousTaskId' => $previousTask]) }}" method="POST" 
    id="new-task-form" class="form-request" enctype="multipart/form-data">
    @csrf
    <div class="form-request__item" style="margin-bottom: 60px;">
        <label for="">Заголовок</label>
        <select name="title" id="title"
        class="@error('title') is-invalid @enderror">
            <option value="Звонок" @if(old("title") == "Звонок") selected @endif>Звонок</option>
            <option value="Встреча" @if(old("title") == "Встреча") selected @endif>Встреча</option>
            <option value="Email" @if(old("title") == "Email") selected @endif>Email</option>
            <option value="Задача" @if(old("title") == "Задача") selected @endif>Задача</option>
        </select>
        @error('company_type')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-request__item">
        <label for="description">Описание</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
    </div>
    @if(Auth::user()->isMainManager())
    <div class="form-request__item" style="margin-bottom: 60px;">
        <label for="">Ответственный менеджер</label>
        <select name="target_user_id" >
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="form-request__item" style="margin-bottom: 60px;">
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
        
        <!-- Поле end_time не используется по запросу работодателя. -->
        <input type="time" id="end_time" name="end_time" style="display:none"
        class="@error('end_time') is-invalid @enderror" value="{{ old('end_time') ?? '09:00' }}">
    </div>
    @error('start_time')
    <div class="text-danger">{{ $message }}</div>
    @enderror
    @error('end_time')
    <div class="text-danger">{{ $message }}</div>
    @enderror

    @if(isset($companyId))
    <input type="hidden" name="company_id" value="{{ $companyId }}">
    @else
    <div class="form-request__item">
        <label id="linked_сompany_name"></label>
        <input type="hidden" name="company_id" value="" id="company_id_input">
        <button class="btn-blue" type="button" style="margin-bottom: 20px;"
        onclick="showCompaniesListPopup()"
        >Привязать контрагента</button>
    </div>
    @endif

    <button class="btn-blue" type="submit">
        @if($previousTask)
        Обновить
        @else
        Добавить
        @endif
    </button>

    <livewire:task-form-company-select /> 

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            hideCompaniesListPopup();
        });
        function showCompaniesListPopup() {
            document.getElementById("centered-popup").style.visibility='visible';
        }
        function hideCompaniesListPopup() {
            document.getElementById("centered-popup").style.visibility='hidden';
        }
    </script>
</form>