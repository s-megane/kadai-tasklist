@extends("layouts.app")
@section("content")
    <div class = "center center jumbotron">
        <div class = "text-center">
            <h1>タスク管理のトップ</h1>
            <p>ここではタスク管理を行うことができます。</p>
            <p>初めての方は新規登録をして、あなただけのタスク管理を行いましょう！</p>
            <div class = "mt-0 mb-3">
                <p>↓初めての方↓</p>
                    
                {!! link_to_route('signup.get', '新規登録！', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
                <p>↓すでに登録済みの方はこちら↓</p>
            
        </div>
    </div>
@endsection