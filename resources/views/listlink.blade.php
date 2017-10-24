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
                                        <th scope="row">
                                            {{ $key + 1 }}
                                        </th>
                                        <td>
                                            xxx.com/{{ $link->id }}
                                        </td>
                                        <td>
                                            {{ $link->og_data->title }}
                                        </td>
                                        <td>
                                            <a href="{{ $link->og_data->pagelink }}">{{ $link->og_data->pagelink }}</a>
                                        </td>
                                        <td>
                                            <div class="hover_img">
                                                <a href="{{ url($link->og_data->image) }}">📃
                                                    <span><img src=" {{ url($link->og_data->image) }}" alt="image" height="100%" /></span>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $link->created_at }}
                                        </td>
                                        <td>
                                            <form class="form-horizontal" method="POST" action="{{ route('linkDeletePost', $link->id) }}">
                                                {{ csrf_field() }}
                                                <a href="https://developers.facebook.com/tools/debug/sharing/?q={{ urlencode('http://xxx.com/' . $link->id) }}">
                                                    <img alt="image" height="30px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGhlaWdodD0iNjdweCIgaWQ9IkxheWVyXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDY3IDY3OyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgNjcgNjciIHdpZHRoPSI2N3B4IiB4bWw6c3BhY2U9InByZXNlcnZlIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj48cGF0aCBkPSJNMjkuNzY1LDUwLjMyaDYuNzQ0VjMzLjk5OGg0LjQ5OWwwLjU5Ni01LjYyNGgtNS4wOTUgIGwwLjAwNy0yLjgxNmMwLTEuNDY2LDAuMTQtMi4yNTMsMi4yNDQtMi4yNTNoMi44MTJWMTcuNjhoLTQuNWMtNS40MDUsMC03LjMwNywyLjcyOS03LjMwNyw3LjMxN3YzLjM3N2gtMy4zNjl2NS42MjVoMy4zNjlWNTAuMzJ6ICAgTTM0LDY0QzE3LjQzMiw2NCw0LDUwLjU2OCw0LDM0QzQsMTcuNDMxLDE3LjQzMiw0LDM0LDRzMzAsMTMuNDMxLDMwLDMwQzY0LDUwLjU2OCw1MC41NjgsNjQsMzQsNjR6IiBzdHlsZT0iZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7ZmlsbDojM0E1ODlCOyIvPjwvc3ZnPg=="/>
                                                </a>
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
