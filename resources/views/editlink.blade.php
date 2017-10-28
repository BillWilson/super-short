@extends('layouts.app')

@section('content')
    <div class="ui piled segment">
        <a class="ui pink ribbon label">編輯連結</a>
        <form class="ui form" method="POST" action="{{ route('linkEditPost', $hashId) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="field">
                <label>網頁連結</label>
                <input id="pagelink" type="text" class="form-control" name="pagelink" value="{{ $link->og_data->pagelink or old('pagelink') }}" required autofocus>
            </div>
            @if($errors->has('pagelink'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少連結</p>
                </div>
            @endif

            <div class="field">
                <label>標題</label>
                <input id="title" type="text" class="form-control" name="title" value="{{ $link->og_data->title or  old('title') }}" required autofocus>
            </div>
            @if($errors->has('title'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少標題</p>
                </div>
            @endif

            <div class="field">
                <label>內容文字</label>
                <input id="content" type="text" class="form-control" name="content" value="{{ $link->og_data->content or  old('content') }}" required autofocus>
            </div>
            @if( $errors->has('content'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少內容文字</p>
                </div>
            @endif

            <div class="field">
                <label>圖片</label>
                <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" autofocus>
            </div>
            <div class="ui centered raised segment" style="width: 50%">
                <div class="ui top attached teal label">目前圖片</div>
                <div class="ui fluid image">
                    <img src=" {{ url($link->og_data->image . '?' . time()) }}" alt="image" width="350px" style="padding-top: 1em" />
                </div>
            </div>
            @if($errors->has('image'))
                <div class="ui error message">
                    <div class="header">圖片</div>
                    <p>缺少連結</p>
                </div>
            @endif
            <input id="imageOld" type="hidden" class="form-control" name="imageOld" value="{{ $link->og_data->image }}">
            <button class="ui green button" type="submit">送出</button>
        </form>
    </div>
@endsection