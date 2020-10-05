@extends("layouts.app")

@section("content")

    <h1>{{ $user->name}}のタスク一覧</h1>
    
    @if (count ($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    
                    <th>タスクNo.</th>
                    <th>やること</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    
                    <td>{!! link_to_route("tasks.show","No." . $task->id , ["task" => $task->id]) !!}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    @endif
    
     {!! link_to_route('tasks.create', '新規タスクの作成', [], ['class' => 'btn btn-primary']) !!}
    


@endsection
