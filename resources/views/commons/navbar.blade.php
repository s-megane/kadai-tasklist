<header class="mb-4">
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                {{-- トップページへのリンク --}}
                <a class="navbar-brand" href="/">TaskList</a>

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav-bar">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav">
                       @if (Auth::check())
                            <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト' ,[] ,  ['class' => 'nav-link']) !!}</li>
                            {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                {!! Form::submit('退会する', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}       
                        @else
                            {{-- ユーザ登録ページへのリンク --}}
                            <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                            {{-- ログインページへのリンク --}}
                            <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>