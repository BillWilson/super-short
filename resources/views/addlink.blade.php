@extends('layouts.app')

@section('content')
    <div class="ui piled segment">
        <a class="ui red ribbon label">新增連結</a>
        <form class="ui form" method="POST" action="{{ route('linkAddPost') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="field">
                <label>網頁連結</label>
                <input id="pagelink" type="text" class="form-control" name="pagelink" value="{{ old('pagelink') }}" required autofocus>
            </div>
            @if($errors->has('pagelink'))
            <div class="ui error message">
                <div class="header">錯誤</div>
                <p>缺少連結</p>
            </div>
            @endif

            <div class="field">
                <label>標題</label>
                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
            </div>
            @if($errors->has('title'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少標題</p>
                </div>
            @endif

            <div class="field">
                <label>內容文字</label>
                <input id="content" type="text" class="form-control" name="content" value="{{ old('content') }}" required autofocus>
            </div>
            @if( $errors->has('content'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少內容文字</p>
                </div>
            @endif

            <div class="field">
                <label>圖片</label>
                <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" required autofocus>
            </div>
            @if($errors->has('image'))
                <div class="ui error message">
                    <div class="header">圖片</div>
                    <p>缺少連結</p>
                </div>
            @endif
            <button class="ui green button" type="submit">送出</button>
        </form>
    </div>
@endsection
