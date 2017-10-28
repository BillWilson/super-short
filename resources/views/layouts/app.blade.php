<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Super-short</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.min.css') }}" rel="stylesheet">
    <style>
        body {
            height: calc(100% - 7em) !important;
            background: url('https://subtlepatterns.com/patterns/halftone.png')
        }

        .dont-show {
            display: none;
        }

        #userbutton {
            font-size: .88em;
        }
        #userbutton i {
            font-size: 1rem;
        }

        #maincontent {
            margin-top: 7em;
            margin-bottom: -7em;
        }
        #maincontent .ribbon {
            margin-bottom: 1.3em;
            cursor: default;
        }
        #card_image {
            max-width:100%;
            max-height: 10em;
            width: auto;
            height: auto;
        }

        #card-header {
            color: black;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #card-description {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        ul.pagination {
            margin: 0px;
        }


        .hover_img a { position:relative; }
        .hover_img a span { position:absolute; display:none; z-index:99; }
        .hover_img a:hover span { display:block; }
    </style>
</head>
<body>
    <div class="ui fixed  menu">
        <div class="ui container">
            <a href="{{ route('list') }}" class="header item">
                <i class="bar chart icon"></i>
                神秘的短網址
            </a>
            <a href="#" class="active item">首頁</a>

            <div class="ui simple dropdown item">
                選單 <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="#">測試1</a>
                    <a class="item" href="#">測試2</a>
                    <a class="item" href="#">測試3</a>
                    <div class="divider"></div>
                    <a class="item" href="#">重要</a>
                </div>
            </div>
        </div>
    </div>

    <div id="maincontent" class="ui main container">
        <div class="ui stackable centered grid">
                @if (Request::path() == 'see/list')
                    <div class="thirteen wide column">
                @else
                    <div class="thirteen wide column">
                @endif

                @yield('content')
            </div>
            @if (Request::path() == 'see/list')
            <div class="three wide column">
                <div class="ui secondary segment">
                    <div class="ui grey small horizontal statistic">

                        <a class="ui labeled primary icon button" href="{{ route('linkAdd') }}">
                            <i class="plus icon"></i>
                            新增
                        </a>
                    </div>
                </div>
                <!--
                <div class="ui secondary segment">
                    <div class="ui grey small horizontal statistic">
                        <div class="value">
                            30,000
                        </div>
                        <div class="label">
                            Tonn
                        </div>
                    </div>
                </div>

                <table class="ui small very compact unstackable selectable olive table">
                    <thead>
                    <tr>
                        <th colspan="2">
                            Siste innkommende
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Firma 1</td>
                        <td class="right aligned">20,15</td>
                    </tr>
                    <tr>
                        <td>Selskap 2</td>
                        <td class="right aligned">4,30</td>
                    </tr>
                    <tr>
                        <td>Firma 1</td>
                        <td class="right aligned">20,15</td>
                    </tr>
                    <tr>
                        <td>Selskap 2</td>
                        <td class="right aligned">4,30</td>
                    </tr>
                    <tr>
                        <td>Organisasjon test</td>
                        <td class="right aligned">1,00</td>
                    </tr>
                    </tbody>
                </table>
                -->
            </div>
            @endif
        </div>
    </div>
<!--
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">


                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <a class="navbar-brand" href="{{ route('list') }}">
                        Super-short
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>


                    <ul class="nav navbar-nav navbar-right">

                        @guest
                            <li><a href="{{ route('login') }}">登入</a></li>
                            <li><a href="{{ route('register') }}">註冊</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    目前登入: {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            登出
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
-->

    <!-- Scripts -->
    <!--
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/semantic.min.js') }}"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>
                            <script>
                                $('.ui.checkbox')
                                    .checkbox()
                                ;
                                $('.dropdown')
                                    .dropdown()
                                ;

                                $('#regInnkommende .ui.checkbox')
                                    .checkbox({
                                        onChecked: function() {
                                            $('#regInnkommende .datepicker').addClass('dont-show');
                                        },
                                        onUnchecked: function() {
                                            $('#regInnkommende .datepicker').removeClass('dont-show');
                                        }})
                                ;


                                $('#regUtgaende .ui.checkbox')
                                    .checkbox({
                                        onChecked: function() {
                                            $('#regUtgaende .datepicker').addClass('dont-show');
                                        },
                                        onUnchecked: function() {
                                            $('#regUtgaende .datepicker').removeClass('dont-show');
                                        }})
                                ;
                                $('.special.cards .image').dimmer({
                                    on: 'hover'
                                });
                            </script>
</body>
</html>
