@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">編輯</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('linkEditPost', $hashId) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('pagelink') ? ' has-error' : '' }}">
                                <label for="pagelink" class="col-md-4 control-label">網頁連結</label>

                                <div class="col-md-6">
                                    <input id="pagelink" type="text" class="form-control" name="pagelink" value="{{ $link->og_data->pagelink or old('pagelink') }}" required autofocus>

                                    @if ($errors->has('pagelink'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pagelink') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">標題</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $link->og_data->title or  old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">內容文字</label>

                                <div class="col-md-6">
                                    <input id="content" type="text" class="form-control" name="content" value="{{ $link->og_data->content or  old('content') }}" required autofocus>

                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image" class="col-md-4 control-label">圖片</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image" value="" autofocus>

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                    <img src=" {{ url($link->og_data->image) }}" alt="image" width="350px" style="padding-top: 1em" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input id="imageOld" type="hidden" class="form-control" name="imageOld" value="{{ $link->og_data->image }}">
                                    <button type="submit" class="btn btn-primary">
                                        送出
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
