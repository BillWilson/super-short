@extends('layouts.app')

@section('content')
    <div class="ui piled segment">
        <a class="ui red ribbon label">新增連結</a>
        <form class="ui form" method="POST" action="{{ route('linkAddPost') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="field">
                <label>網頁連結</label>
                <input id="pagelink" type="text" class="form-control" name="pagelink" value="{{  $ogData['og:url'] or old('pagelink') }}" required autofocus>
            </div>
            @if($errors->has('pagelink'))
            <div class="ui error message">
                <div class="header">錯誤</div>
                <p>缺少連結</p>
            </div>
            @endif

            <div class="field">
                <label>標題</label>
                <input id="title" type="text" class="form-control" name="title" value="{{ $ogData['og:title'] or old('title') }}" required autofocus>
            </div>
            @if($errors->has('title'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少標題</p>
                </div>
            @endif

            <div class="field">
                <label>內容文字</label>
                <input id="content" type="text" class="form-control" name="content" value="{{ $ogData['og:description'] or old('content') }}" required autofocus>
            </div>
            @if( $errors->has('content'))
                <div class="ui error message">
                    <div class="header">錯誤</div>
                    <p>缺少內容文字</p>
                </div>
            @endif

            <div class="field">
                <label>圖片
                    @if($ogData['og:image'][0]['og:image:url'])
                    <a class="ui pink tag label" href="{{ $ogData['og:image'][0]['og:image:url'] }}" download>
                        <i class="image icon"></i>
                        原圖連結
                    </a>
                        @endif
                </label>

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

        <div class="ui blue segment">
            <form class="ui form" method="GET" action="{{ route('linkAdd') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="field">
                    <input id="pagelink" type="text" class="form-control" name="pagelink" value="" placeholder="文章網址">
                </div>
                <button class="ui blue basic button" type="submit"><i class="download icon"></i>抓取文章資料</button>
            </form>
        </div>
    </div>
@endsection
