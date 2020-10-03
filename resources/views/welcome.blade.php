@extends("layouts.app")
@section("content")
    @if (Auth::check())
        {{ Auth::user()->name . "のページです。" }}
        @include("tasks.index")
    @else
        <div class = "center center jumbotron">
            <div class = "text-center">
                <h1>タスク管理のトップ</h1>
                <p>ここではタスク管理を行うことができます。</p>
                <p>初めての方は新規登録をして、あなただけのタスク管理を行いましょう！</p>
                <div class = "mt-0 mb-3">
                    <p>↓初めての方↓</p>
                        
                    {!! link_to_route('signup.get', '新規登録！', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
                <div class = "mt-0 mb-3">
                    <p>↓すでに登録済みの方はこちら↓</p>
                    {!! link_to_route('login.post', 'ログインする！', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
            </div>
        </div>
    @endif
@endsection