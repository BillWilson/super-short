@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        連結們
                        <a type="button" class="btn btn-success btn-xs" href="{{ route('linkAdd') }}">
                            ➕新增
                        </a>
                    </div>

                    <div class="panel-body">
                        <div class="panel panel-default">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>短網址</th>
                                    <th>標題</th>
                                    <th>目標網址</th>
                                    <th>圖片</th>
                                    <th>建立時間</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($links as $key => $link)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>xxx.com/{{ $link->id }}</th>
                                        <td>{{ $link->og_data->title }}</td>
                                        <td><a href="{{ $link->og_data->pagelink }}">{{ $link->og_data->pagelink }}</a></td>
                                        <td><a href="{{ $link->og_data->image }}">📃</a></td>
                                        <td>{{ $link->created_at }} </td>
                                        <td>
                                            <form class="form-horizontal" method="POST" action="{{ route('linkDeletePost', $link->id) }}">
                                                {{ csrf_field() }}
                                                <a type="submit" class="btn btn-primary btn-xs" href="{{ route('linkEdit', $link->id) }}">
                                                    編輯
                                                </a>
                                                <button type="submit" class="btn btn btn-xs" onclick="return confirm('確定要刪除 {{ $link->og_data->title }} ?');">
                                                    刪除
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
