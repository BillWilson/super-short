@extends('layouts.app')

@section('content')
    <div id="regInnkommende" class="ui stacked segment">
        <a class="ui orange ribbon label">清單</a>
        <div class="ui form">
            <div class="ui three stackable special cards">
                @foreach ($links as $key => $link)
                    <div class="ui card">
                        <div class="extra content">
                            <div class="meta">
                                <div class="right floated time">
                                    <span class="ui top right attached blue label">
                                        <i class="checked calendar outline icon" style="padding-right: 4px"></i>
                                        {{ Carbon\Carbon::parse($link->created_at)->diffForHumans() }}
                                    </span>
                                </div>
                                <i class="linkify icon"></i>
                                <a class="category" href="{{ url($link->id) }}" target="_blank">{{ $link->id }}</a>
                            </div>
                        </div>
                        <div class="blurring dimmable image" style="overflow: inherit;">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <div class="ui buttons">
                                            <form class="form-horizontal" method="POST" action="{{ route('linkDeletePost', $link->id) }}">
                                                {{ csrf_field() }}

                                                <a class="ui facebook button" href="https://developers.facebook.com/tools/debug/sharing/?q={{ urlencode(url($link->id)) }}" target="_blank">
                                                    <i class="facebook icon"></i>
                                                    預覽
                                                </a>

                                                <a class="ui inverted green button" href="{{ route('linkEdit', $link->id) }}">
                                                    編輯
                                                </a>
                                                <button class="ui inverted grey button" type="submit" onclick="return confirm('確定要刪除 {{ $link->og_data->title }} ?');">
                                                    刪除
                                                </button>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div id="card_image" style="background-image: url('{{ url($link->og_data->image . '?' . time()) }}');">
                            </div>
                        </div>
                        <div class="content">
                            <div class="header">
                                <a href="{{ $link->og_data->pagelink }}" id="card-header" target="_blank">{{ $link->og_data->title }}</a>
                            </div>
                            <div class="description" id="card-description">
                                {{ $link->og_data->content }}
                            </div>
                            <div class="meta">
                                <span class="date">{{ strtoupper($_SERVER['HTTP_HOST']) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="ui hidden divider"></div>
    @if(!empty($links->links()->toHtml()))
    <div class="ui center aligned segment">
        {{ $links->links() }}
    </div>
    @endif
@endsection
