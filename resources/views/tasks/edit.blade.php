@extends("layouts.app")

@section("content")
    
    <h1>タスクNo. {{ $task->id }} の内容編集ページ </h1>
    
    <div class="row">
        <div class="col-6">
            {!! Form:model($task , ["route" => "tasks.store"]) !!}
            
                <div class="form-group">
                    {!! Form::label("content" , "修正内容:") !!}
                    {!! Form::text("content", null, ["class" => "form-control"]) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}


@endsection