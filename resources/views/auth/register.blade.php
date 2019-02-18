@extends('layouts.app')

@section('content')
    <div class="ui piled segment">
        <a class="ui red ribbon label">註冊</a>
        <form class="ui form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="field">
                <label>名字</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            @if($errors->has('name'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少連結</p>
                </div>
            @endif

            <div class="field">
                <label>E-Mail 地址</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>
            @if($errors->has('email'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少連結</p>
                </div>
            @endif

            <div class="field">
                <label>密碼</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>
            @if($errors->has('password'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少連結</p>
                </div>
            @endif

            <div class="field">
                <label>再輸入一次密碼</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('name') }}" required autofocus>
            </div>
            @if($errors->has('pagelink'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少連結</p>
                </div>
            @endif
            <button class="ui green button" type="submit">送出</button>
        </form>
    </div>
@endsection
