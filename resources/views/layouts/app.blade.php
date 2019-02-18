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
            height: 10em;
            display: block;
            background-size: cover;
            background-position: center;
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
    <div class="ui borderless main inverted menu fixed">
        <div class="ui container">
            <a class="item" href="{{ route('list') }}">
                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNBMEVCRkY7IiBjeD0iMjU2IiBjeT0iMjU2IiByPSIyNTYiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGREYzNUE7IiBkPSJNMzQ0LjAzOCwyMjMuOTU0YzAtNTAuMjg0LTQwLjc2LTkxLjA0NC05MS4wNDQtOTEuMDQ0cy05MS4wNDQsNDAuNzYtOTEuMDQ0LDkxLjA0NCAgIGMwLDQ5LjgzMywyMC4yOTEsNjQuNDEsNDAuNTA0LDkyLjY5OGMxMy4zMjIsMTguNjM3LDEzLjMyMiwzOS42ODUsMTMuMzIyLDM5LjY4NWg3NC40MzVjMCwwLTAuMDI2LTIxLjA0OCwxMy4zMjItMzkuNjg1ICAgQzMyMy43NjgsMjg4LjM3OSwzNDQuMDM4LDI3My43ODcsMzQ0LjAzOCwyMjMuOTU0eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Y3QkYwMDsiIGQ9Ik0yNTIuOTk1LDEzMi45MXYyMjMuNDI3aDM3LjIxN2MwLDAtMC4wMjYtMjEuMDQ4LDEzLjMyMi0zOS42ODUgICBjMjAuMjM5LTI4LjI2OCw0MC41MDQtNDIuODY1LDQwLjUwNC05Mi42OThDMzQ0LjAzOCwxNzMuNjcsMzAzLjI3MywxMzIuOTEsMjUyLjk5NSwxMzIuOTF6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRjdCRjAwOyIgZD0iTTI3OC41MTMsMzU2LjMzN3YtMjcuNjg0YzAtNy45NjItNi40NTYtMTQuNDE4LTE0LjQxOC0xNC40MThoLTIyLjIgICBjLTcuOTYyLDAtMTQuNDE4LDYuNDU2LTE0LjQxOCwxNC40MTh2MjcuNjc5aDUxLjAzNlYzNTYuMzM3eiIvPgoJPHJlY3QgeD0iMjE1Ljc1NyIgeT0iMzU2LjM1MiIgc3R5bGU9ImZpbGw6IzMzNTg3MjsiIHdpZHRoPSI3NC40MDkiIGhlaWdodD0iNDcuMDYzIi8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDAzRTAwOyIgZD0iTTIxNS43NzcsNDAzLjR2My44MjVjMCw3Ljk2Miw2LjQ1NiwxNC40MTgsMTQuNDE4LDE0LjQxOGg0NS41NzMgICBjNy45NjIsMCwxNC40MTgtNi40NTYsMTQuNDE4LTE0LjQxOFY0MDMuNEgyMTUuNzc3eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzMzNTg3MjsiIGQ9Ik0yNTIuOTk1LDQzOS44NDljMTAuMDU2LDAsMTguMjEyLTguMTU2LDE4LjIxMi0xOC4yMTJoLTM2LjQyNCAgIEMyMzQuNzgzLDQzMS42OTgsMjQyLjkzNCw0MzkuODQ5LDI1Mi45OTUsNDM5Ljg0OXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGREYzNUE7IiBkPSJNMjY0LjA5NSwzMTQuMjM1aC0xMS4xMXY0Mi4wOTdoMjUuNTI4di0yNy42NzlDMjc4LjUxMywzMjAuNjkxLDI3Mi4wNTYsMzE0LjIzNSwyNjQuMDk1LDMxNC4yMzV6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDAzRTAwOyIgZD0iTTI2Mi4wMjYsMzU2LjM0N2MwLDAtMC4xNTktNTkuNDg0LTAuMTU5LTc5LjI4M2MwLTYuNDYxLDIuMjE3LTEzLjIwNCw0LjM2Mi0xOS43MjcgICBjMi40NzgtNy41MjEsNS4wMzMtMTUuMzA0LDIuMzc2LTE4Ljk4Yy0xLjk2MS0yLjcwOC03LjM2My00LjE0Ny0xNS42MDYtNC4xNDdjLTguMjI4LDAtMTMuNjI5LDEuNDU0LTE1LjYyNiw0LjE5OCAgIGMtMi43MzksMy43NzktMC4xNjQsMTEuNjc0LDIuMzMsMTkuMzEzYzIuMDk5LDYuNDI2LDQuMjY1LDEzLjA2MSw0LjI2NSwxOS4zMzh2NzkuMjczaC03Ljc5OHYtNzkuMjY4ICAgYzAtNS4wMzMtMS45NzEtMTEuMDc1LTMuODgxLTE2LjkyMmMtMy4wOTgtOS40OTItNi4yOTgtMTkuMzE4LTEuMjI5LTI2LjMxMmMzLjY3Ni01LjA1OSwxMC42NDQtNy40MTksMjEuOTM5LTcuNDE5ICAgYzExLjMyLDAsMTguMjg5LDIuMzQsMjEuOTI0LDcuMzczYzQuOTk3LDYuOTAyLDEuODA3LDE2LjYwNC0xLjI4LDI1Ljk4OWMtMS45NTEsNS45MzktMy45NzMsMTIuMDc4LTMuOTczLDE3LjI5ICAgYzAsMTkuNzk0LDAuMTU5LDc5LjI2MywwLjE1OSw3OS4yNjNMMjYyLjAyNiwzNTYuMzQ3eiIvPgoJPHJlY3QgeD0iMjUyLjk3OSIgeT0iMzU2LjM1MiIgc3R5bGU9ImZpbGw6IzE1MzA0MDsiIHdpZHRoPSIzNy4yMjgiIGhlaWdodD0iNDcuMDYzIi8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojMTUzMDQwOyIgZD0iTTI1Mi45OTUsNDIxLjYzN3YxOC4yMTJjMTAuMDU2LDAsMTguMjEyLTguMTU2LDE4LjIxMi0xOC4yMTJIMjUyLjk5NXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiM5QzJFMDA7IiBkPSJNMjUyLjk5NSw0MDMuNHYxOC4yNDNoMjIuNzc0YzcuOTYyLDAsMTQuNDE4LTYuNDU2LDE0LjQxOC0xNC40MThWNDAzLjRIMjUyLjk5NXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNGN0JGMDA7IiBkPSJNMTUwLjYyLDI1Ny41NDZjLTAuNDUxLTIuNjE2LTIuOTQ5LTQuMzY3LTUuNTU1LTMuOTE3bC0zMy44MzgsNS44NTIgICBjLTIuNjE2LDAuNDUxLTQuMzYyLDIuOTM5LTMuOTEyLDUuNTU1YzAuNDA0LDIuMzM1LDIuNDM3LDMuOTg4LDQuNzMxLDMuOTg4bDAuODI0LTAuMDcybDMzLjgzOC01Ljg1MiAgIEMxNDkuMzIsMjYyLjY0NiwxNTEuMDcxLDI2MC4xNTcsMTUwLjYyLDI1Ny41NDZ6IE0xOTMuODY0LDkyLjgyYy0xLjExMS0yLjQwNi0zLjk2OC0zLjQ2MS02LjM4LTIuMzQ1ICAgYy0yLjQwNiwxLjExMS0zLjQ2MSwzLjk2OC0yLjM0LDYuMzhsMTQuNDA4LDMxLjE2NWMwLjgxNCwxLjc1NiwyLjU1LDIuNzksNC4zNjIsMi43OWMwLjY3MSwwLDEuMzYyLTAuMTQzLDIuMDEyLTAuNDQ1ICAgYzIuNDA2LTEuMTExLDMuNDYxLTMuOTY4LDIuMzQtNi4zOEwxOTMuODY0LDkyLjgyeiBNMTYyLjIyNywxNjMuNjA0YzAuOTAxLDAuNzYzLDIuMDAyLDEuMTM3LDMuMDk4LDEuMTM3ICAgYzEuMzcyLDAsMi43MjktMC41NzksMy42NzYtMS43MDVjMS43MTUtMi4wMjgsMS40NTktNS4wNTktMC41NjgtNi43NzRsLTI2LjIzLTIyLjE1OWMtMi4wMzgtMS43Mi01LjA2OS0xLjQ1NC02Ljc3NCwwLjU2OCAgIGMtMS43MTUsMi4wMjgtMS40NTksNS4wNTksMC41NjgsNi43NzRMMTYyLjIyNywxNjMuNjA0eiBNMTEwLjMsMjAyLjYzNGwzMy4xMzcsOC45OTZsMS4yNjUsMC4xNjljMi4xMDksMCw0LjA1LTEuNDA4LDQuNjM0LTMuNTQ4ICAgYzAuNjk2LTIuNTYtMC44MTktNS4yMDItMy4zNzktNS44OTNsLTMzLjEzNy04Ljk5NmMtMi41NTUtMC42OTYtNS4xOTcsMC44MTktNS44OTMsMy4zNzkgICBDMTA2LjIyNSwxOTkuMzAxLDEwNy43MzUsMjAxLjkzOCwxMTAuMywyMDIuNjM0eiBNMTY1LjkyOSwzMDAuNDcybC0yOC4xOTYsMTkuNjA0Yy0yLjE3NiwxLjUxNi0yLjcxOSw0LjUxMS0xLjIwMyw2LjY4NyAgIGMwLjkzMiwxLjM0NywyLjQzMiwyLjA2MywzLjk1MywyLjA2M2MwLjk0NywwLDEuOS0wLjI4MiwyLjczOS0wLjg2bDI4LjE5Ni0xOS42MDRjMi4xNzYtMS41MTYsMi43MTktNC41MTEsMS4yMDMtNi42ODcgICBDMTcxLjEwNSwyOTkuNDg5LDE2OC4xMTUsMjk4Ljk2MiwxNjUuOTI5LDMwMC40NzJ6IE0yNTIuOTk1LDcyLjQ5NGMtMi4zOTYsMC4yMS00LjQ0OSwyLjE5MS00LjQ2LDQuNzE2bC0wLjExMywzNC4zNCAgIGMtMC4wMSwyLjU3NSwyLjAyMiw0LjY0NCw0LjU3Miw0Ljc3N2MyLjU1LTAuMTI4LDQuNTgyLTIuMjAyLDQuNTcyLTQuNzc3bC0wLjExMy0zNC4zNCAgIEMyNTcuNDQ0LDc0LjY4NSwyNTUuMzg2LDcyLjcwNCwyNTIuOTk1LDcyLjQ5NHogTTM0MC42NjQsMTY0Ljc0MWMxLjA5NiwwLDIuMTk2LTAuMzY5LDMuMDk4LTEuMTM3bDI2LjIzLTIyLjE1NCAgIGMyLjAyOC0xLjcxNSwyLjI3OC00Ljc0NiwwLjU2OC02Ljc3NGMtMS43MDUtMi4wMjItNC43MzYtMi4yODktNi43NzQtMC41NjhsLTI2LjIzLDIyLjE1OWMtMi4wMjgsMS43MTUtMi4yNzgsNC43NDYtMC41NjgsNi43NzQgICBDMzM3LjkzNSwxNjQuMTYzLDMzOS4yOTIsMTY0Ljc0MSwzNDAuNjY0LDE2NC43NDF6IE0zNTYuNjU0LDIwOC4yNTFjMC41ODQsMi4xNCwyLjUxOSwzLjU0OCw0LjYzNCwzLjU0OGwxLjI2NS0wLjE2OWwzMy4xMzctOC45OTYgICBjMi41Ni0wLjY5Niw0LjA3Ni0zLjMzMywzLjM3OS01Ljg5OGMtMC43MDEtMi41Ni0zLjM0My00LjA3Ni01Ljg5My0zLjM3OWwtMzMuMTM3LDguOTk2ICAgQzM1Ny40NjgsMjAzLjA1NCwzNTUuOTU4LDIwNS42OTEsMzU2LjY1NCwyMDguMjUxeiBNMzk0Ljc2MiwyNTkuNDgybC0zMy44MzgtNS44NTJjLTIuNjExLTAuNDUxLTUuMTA1LDEuMy01LjU1NSwzLjkxNyAgIGMtMC40NTEsMi42MTYsMS4zLDUuMDk5LDMuOTEyLDUuNTU1bDMzLjgzOCw1Ljg1MmwwLjgyNCwwLjA3MmMyLjI5NCwwLDQuMzI2LTEuNjU0LDQuNzMxLTMuOTg4ICAgQzM5OS4xMjQsMjYyLjQyLDM5Ny4zNzMsMjU5LjkzMiwzOTQuNzYyLDI1OS40ODJ6IE0zNDAuMDU1LDMwMC40NzJjLTIuMTg2LTEuNTEtNS4xNzYtMC45ODMtNi42OTIsMS4yMDMgICBjLTEuNTE2LDIuMTc2LTAuOTc4LDUuMTc2LDEuMjAzLDYuNjg3bDI4LjE5NiwxOS42MDRjMC44NCwwLjU3OSwxLjc5MiwwLjg2LDIuNzM5LDAuODZjMS41MjEsMCwzLjAxNi0wLjcyMiwzLjk1My0yLjA2MyAgIGMxLjUxNi0yLjE3NiwwLjk3OC01LjE3MS0xLjIwMy02LjY4N0wzNDAuMDU1LDMwMC40NzJ6IE0zMTguNDk1LDkwLjQ3NmMtMi40MTItMS4xMTYtNS4yNjMtMC4wNjEtNi4zOCwyLjM0NWwtMTQuNDA4LDMxLjE3MSAgIGMtMS4xMTYsMi40MDYtMC4wNjcsNS4yNjMsMi4zNCw2LjM4YzAuNjUsMC4zMDIsMS4zNDEsMC40NDUsMi4wMTIsMC40NDVjMS44MTgsMCwzLjU1My0xLjAzNCw0LjM2Mi0yLjc5bDE0LjQwOC0zMS4xNjUgICBDMzIxLjk1Niw5NC40NDQsMzIwLjkwNiw5MS41OTIsMzE4LjQ5NSw5MC40NzZ6Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
            </a>
            <a href="{{ route('list') }}" class="header item">
                <span style="font-size: 1.8em;">神秘的短網址</span>
            </a>
        </div>
    </div>

    <div id="maincontent" class="ui main container">
        <div class="ui stackable centered grid">
            @if (Request::path() == 'see/list')
                <div class="three wide column">
                    <div class="ui compact vertical labeled icon menu">
                        <a class="item">
                            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBvbHlnb24gc3R5bGU9ImZpbGw6IzU2MzkzOTsiIHBvaW50cz0iMzY0LjE4OSwyNDEuODY4IDQ5Ny44MzIsMjQxLjg2OCA0NzcuMzQ4LDE5NS40MDUgMzgyLjY0MSwxOTUuNDA1ICIvPgo8cGF0aCBzdHlsZT0iZmlsbDojM0M2Rjk5OyIgZD0iTTE1NS44NywzMTYuNTh2NDkuNzE1bC0xNDYuODE0LDEuODdWMzE2LjU4YzAtMzEuMTI1LDE5LjM3Mi01Ny43MjcsNDYuNzE1LTY4LjQwNSAgYzguMjc2LTMuMjM0LDE3LjI3Ni01LjAwNSwyNi42ODgtNS4wMDVoMC4wMDdjOS4zNTYsMCwxOC4yOTksMS43NDksMjYuNTI1LDQuOTQxQzEzNi40MTgsMjU4Ljc0NiwxNTUuODcsMjg1LjM5MiwxNTUuODcsMzE2LjU4eiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojNjU5OENCOyIgZD0iTTE1NS44NywzMzguNTQ4djI3Ljc0N2wtMTQ2LjgxNCwxLjg3di0yOS42MTdjMC0zMS4xMjUsMTkuMzcyLTU3LjcyNyw0Ni43MTUtNjguNDA2ICBjOC4yNzYtMy4yMzQsMTcuMjc2LTUuMDA1LDI2LjY4OC01LjAwNWgwLjAwN2M5LjM1NiwwLDE4LjI5OSwxLjc0OSwyNi41MjUsNC45NDFDMTM2LjQxOCwyODAuNzE0LDE1NS44NywzMDcuMzYsMTU1Ljg3LDMzOC41NDh6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFQUE5NkU7IiBkPSJNMTA4Ljk5MSwyNDguMTExbC05LjE1NywxMC41NzlsLTE3LjM2OCwyMC4wNjlsLTE3LjQ5Ni0yMC4wNDFsLTkuMTk5LTEwLjU0MyAgYzguMjc2LTMuMjM0LDE3LjI3Ni01LjAwNSwyNi42ODgtNS4wMDVoMC4wMDdDOTEuODIyLDI0My4xNjksMTAwLjc2NiwyNDQuOTE5LDEwOC45OTEsMjQ4LjExMXoiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkJDQjk5OyIgZD0iTTk5LjgzNCwyNTguNjg5bC0xNy4zNjgsMjAuMDY5bC0xNy40OTYtMjAuMDQxYzUuNjAyLTEuMzcyLDExLjQ2LTIuMDk3LDE3LjQ4OS0yLjA5N2gwLjAwNyAgIEM4OC40NTIsMjU2LjYyLDk0LjI2NywyNTcuMzM5LDk5LjgzNCwyNTguNjg5eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0ZCQ0I5OTsiIGQ9Ik0xMzAuMTk4LDE5NS43MDFjMCwwLjk4MS0wLjAyOSwxLjk1NS0wLjA5MywyLjkyMWMtMC4xMTQsMS44NzctMC4zMzQsMy43MTgtMC42NjIsNS41MzEgICBjLTAuNzE4LDQuMDI0LTEuOTQxLDcuODc3LTMuNjA1LDExLjQ4MmMtNy41NDMsMTYuNDA5LTI0LjEyOSwyNy44MDUtNDMuMzczLDI3LjgwNWMtMTkuNjcyLDAtMzYuNTYzLTExLjg5NC00My44NjUtMjguODg1ICAgYy0xLjQyMi0zLjI5OC0yLjQ4MS02Ljc4OS0zLjEyMS0xMC40MjJjLTAuMzItMS43OTItMC41NDEtMy42MTItMC42NTQtNS40NjdjLTAuMDcxLTAuOTgxLTAuMDk5LTEuOTY5LTAuMDk5LTIuOTY1ICAgYzAtMjYuMzYxLDIxLjM3LTQ3LjczOSw0Ny43MzktNDcuNzM5QzEwOC44MjgsMTQ3Ljk2MiwxMzAuMTk4LDE2OS4zNCwxMzAuMTk4LDE5NS43MDF6Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0VBQTk2RTsiIGQ9Ik0xMjkuNDQ0LDIwNC4xNTRjLTAuNzE4LDQuMDI0LTEuOTQxLDcuODc3LTMuNjA1LDExLjQ4MmMtMzkuODk4LDAuMjE0LTU3LjM1MS0xNy41MTctNTcuMzUxLTE3LjUxNyAgYy05LjA2NCw4LjgzLTIwLjc2NywxMy43NDktMjkuODg3LDE2LjQzNmMtMS40MjItMy4yOTgtMi40ODEtNi43ODktMy4xMjEtMTAuNDIyYzQuMDAyLTIyLjMwOSwyMy41MTgtMzkuMjQzLDQ2Ljk4Ni0zOS4yNDMgIEMxMDUuOTM0LDE2NC44OSwxMjUuNDQ5LDE4MS44MzgsMTI5LjQ0NCwyMDQuMTU0eiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojNjk0QjRCOyIgZD0iTTEzMC4xOTgsMTk1LjcwMWMwLDAuOTgxLTAuMDI5LDEuOTU1LTAuMDkzLDIuOTIxYy00Mi45MTgsMS41NTctNjEuNjE2LTE3LjQzMi02MS42MTYtMTcuNDMyICBjLTIuNjg3LDIuNjE2LTUuNjAyLDQuODkyLTguNjE2LDYuODYxYy04LjYyMyw1LjY1Mi0xOC4wMzYsOC44NTEtMjUuMDQ2LDEwLjYxNGMtMC4wNzEtMC45ODEtMC4wOTktMS45NjktMC4wOTktMi45NjUgIGMwLTI2LjM2MSwyMS4zNy00Ny43MzksNDcuNzM5LTQ3LjczOWMxNy4wMTksMCwzMS45NjQsOC45MTUsNDAuNDA5LDIyLjMzQzEyNy41MTgsMTc3LjY1LDEzMC4xOTgsMTg2LjM1OSwxMzAuMTk4LDE5NS43MDF6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM1NjM5Mzk7IiBkPSJNMTMwLjE5OCwxOTUuNzAxYzAsMC45ODEtMC4wMjksMS45NTUtMC4wOTMsMi45MjFjLTQyLjkxOCwxLjU1Ny02MS42MTYtMTcuNDMyLTYxLjYxNi0xNy40MzIgIGMtMi42ODcsMi42MTYtNS42MDIsNC44OTItOC42MTYsNi44NjFjOC4zNTMtMTMuODc3LDIzLjU2LTIzLjE2Miw0MC45MzUtMjMuMTYyYzcuOTYzLDAsMTUuNDY5LDEuOTQ4LDIyLjA2Nyw1LjQwNCAgQzEyNy41MTgsMTc3LjY1LDEzMC4xOTgsMTg2LjM1OSwxMzAuMTk4LDE5NS43MDF6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNDNjJFMUU7IiBkPSJNNTAzLjc4MiwzMTYuNTh2NDkuNzE1bC0xNDYuODE0LDEuODdWMzE2LjU4YzAtMzEuMTI1LDE5LjM3My01Ny43MjcsNDYuNzE1LTY4LjQwNSAgYzguMjc2LTMuMjM0LDE3LjI3Ni01LjAwNSwyNi42ODgtNS4wMDVoMC4wMDdjOS4zNTYsMCwxOC4yOTksMS43NDksMjYuNTI1LDQuOTQxQzQ4NC4zMzEsMjU4Ljc0Niw1MDMuNzgyLDI4NS4zOTIsNTAzLjc4MiwzMTYuNTh6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFRjRDMzU7IiBkPSJNNTAzLjc4MiwzMzguNTQ4djI3Ljc0N2wtMTQ2LjgxNCwxLjg3di0yOS42MTdjMC0zMS4xMjUsMTkuMzczLTU3LjcyNyw0Ni43MTUtNjguNDA2ICBjOC4yNzYtMy4yMzQsMTcuMjc2LTUuMDA1LDI2LjY4OC01LjAwNWgwLjAwN2M5LjM1NiwwLDE4LjI5OSwxLjc0OSwyNi41MjUsNC45NDFDNDg0LjMzMSwyODAuNzE0LDUwMy43ODIsMzA3LjM2LDUwMy43ODIsMzM4LjU0OHoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0VBQTk2RTsiIGQ9Ik00NTYuOTAzLDI0OC4xMTFsLTkuMTU3LDEwLjU3OWwtMTcuMzY4LDIwLjA2OWwtMTcuNDk2LTIwLjA0MWwtOS4xOTktMTAuNTQzICBjOC4yNzYtMy4yMzQsMTcuMjc2LTUuMDA1LDI2LjY4OC01LjAwNWgwLjAwN0M0MzkuNzM0LDI0My4xNjksNDQ4LjY3NywyNDQuOTE5LDQ1Ni45MDMsMjQ4LjExMXoiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRkJDQjk5OyIgZD0iTTQ0Ny43NDcsMjU4LjY4OWwtMTcuMzY4LDIwLjA2OWwtMTcuNDk2LTIwLjA0MWM1LjYwMi0xLjM3MiwxMS40Ni0yLjA5NywxNy40ODktMi4wOTdoMC4wMDcgICBDNDM2LjM2NSwyNTYuNjIsNDQyLjE4LDI1Ny4zMzksNDQ3Ljc0NywyNTguNjg5eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0ZCQ0I5OTsiIGQ9Ik00NzguMTExLDE5NS43MDFjMCwwLjk4MS0wLjAyOSwxLjk1NS0wLjA5MywyLjkyMWMtMC4xMTQsMS44NzctMC4zMzQsMy43MTgtMC42NjIsNS41MzEgICBjLTAuNzE4LDQuMDI0LTEuOTQxLDcuODc3LTMuNjA1LDExLjQ4MmMtNy41NDMsMTYuNDA5LTI0LjEyOSwyNy44MDUtNDMuMzczLDI3LjgwNWMtMTkuNjcyLDAtMzYuNTYzLTExLjg5NC00My44NjUtMjguODg1ICAgYy0xLjQyMi0zLjI5OC0yLjQ4MS02Ljc4OS0zLjEyMS0xMC40MjJjLTAuMzItMS43OTItMC41NDEtMy42MTItMC42NTQtNS40NjdjLTAuMDcxLTAuOTgxLTAuMDk5LTEuOTY5LTAuMDk5LTIuOTY1ICAgYzAtMjYuMzYxLDIxLjM3LTQ3LjczOSw0Ny43MzktNDcuNzM5QzQ1Ni43MzksMTQ3Ljk2Miw0NzguMTExLDE2OS4zNCw0NzguMTExLDE5NS43MDF6Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0VBQTk2RTsiIGQ9Ik00NzYuODU0LDIwMi42NDZjLTAuNzE4LDQuMDI0LTIuMDA4LDUuODA0LTMuNjcyLDkuNDA4Yy0zOS44OTgsMC4yMTQtNzguMDQ5LTEuNjk1LTg3LjE3MSwwLjk5MiAgYy0xLjQyMi0zLjI5OC0yLjQ4MS02Ljc4OS0zLjEyMS0xMC40MjJjNC4wMDItMjIuMzA5LDIzLjUxOC0zOS4yNDMsNDYuOTg2LTM5LjI0M0M0NTMuMzQ0LDE2My4zODEsNDcyLjg1OSwxODAuMzMsNDc2Ljg1NCwyMDIuNjQ2eiAgIi8+CjxwYXRoIHN0eWxlPSJmaWxsOiM1NjM5Mzk7IiBkPSJNNDc4LjExLDE5NS43MDRjMCwwLjk3NS0wLjAzLDEuOTUtMC4wODksMi45MTRjLTE1LjIxMiwwLjU1MS0zMC43MywwLjUwMi00NC43MzEsMC4yNzZoLTAuMDk4ICBjLTI0Ljg2Mi0wLjM5NC00NC45NDgtMS4zMTktNTAuMDk3LTAuMzA1Yy0wLjEyOCwwLjAzLTAuMjQ2LDAuMDQ5LTAuMzU0LDAuMDc5di0wLjA4OWMtMC4wNjktMC45NTUtMC4wOTgtMS45MS0wLjA5OC0yLjg3NSAgYzAtMjAuMTg1LDEyLjUyNC0zNy40NDUsMzAuMjI4LTQ0LjQzNmMwLjAxLTAuMDEsMC4wMSwwLDAuMDEsMGM1LjQxNS0yLjEzNywxMS4zMjMtMy4zMDgsMTcuNDk3LTMuMzA4ICBjMTcuMDI0LDAsMzEuOTcsOC45MjEsNDAuNDA5LDIyLjMzMUM0NzUuNDMxLDE3Ny42NDYsNDc4LjExLDE4Ni4zNiw0NzguMTEsMTk1LjcwNHoiLz4KPHBhdGggc3R5bGU9ImZpbGw6IzY5NEI0QjsiIGQ9Ik00NDMuMTU2LDE5NS43MDRjMCwwLjk3NS0wLjAzLDEuOTUtMC4wODksMi45MTRjLTMuMjQ5LDAuMTE4LTYuNTE4LDAuMjA3LTkuNzc3LDAuMjc2aC0wLjA5OCAgYy0xNy43NzIsMC4zNjQtMzUuNDI2LDAuMDM5LTUwLjA5Ny0wLjMwNWMtMC4xMTgsMC0wLjIzNiwwLTAuMzU0LTAuMDFjLTAuMDY5LTAuOTU1LTAuMDk4LTEuOTEtMC4wOTgtMi44NzUgIGMwLTIwLjE4NSwxMi41MjQtMzcuNDQ1LDMwLjIyOC00NC40MzZjMC4wMS0wLjAxLDAuMDEsMCwwLjAxLDBjOS41MzEsMy43NDIsMTcuNTY2LDEwLjQ2NiwyMi45NTEsMTkuMDIzICBDNDQwLjQ3OCwxNzcuNjQ2LDQ0My4xNTYsMTg2LjM2LDQ0My4xNTYsMTk1LjcwNHoiLz4KPHBhdGggZD0iTTE2NS40OTksMzE3LjI5OWMwLTM0Ljk3Ny0yMS44MjQtNjQuOTMyLTUyLjU2MS03Ny4wMjNjMTQuOTgzLTkuODU2LDI0LjkwMS0yNi44MTEsMjQuOTAxLTQ2LjA0OCAgYzAtMzAuMzc3LTI0LjcxNC01NS4wOS01NS4wOS01NS4wOXMtNTUuMDksMjQuNzEzLTU1LjA5LDU1LjA5YzAsMTkuMjM2LDkuOTE4LDM2LjE5MiwyNC45MDIsNDYuMDQ4ICBDMjEuODI0LDI1Mi4zNjcsMCwyODIuMzIzLDAsMzE3LjI5OXY1OC4zMTRoMTY1LjQ5OVYzMTcuMjk5eiBNODIuNzQ5LDI2Ny42ODhsLTE0LjYyNi0xNi43NjdjNC43MTQtMS4wMzksOS42MDUtMS42MDIsMTQuNjI2LTEuNjAyICBzOS45MTIsMC41NjMsMTQuNjI2LDEuNjAyTDgyLjc0OSwyNjcuNjg4eiBNODIuNzQ5LDE1My45MDhjMjEuMTQ4LDAsMzguNTM0LDE2LjM2OSw0MC4xODEsMzcuMTAxICBjLTIyLjM5MS0xLjIzNy0zNi45NjctNy45NDItNDQuNDQxLTEyLjQ5NmMxLjg3My0yLjYxLDIuNzU0LTQuMzY2LDIuODczLTQuNjFsLTEzLjI4OC02LjQ0NiAgYy0wLjA2NywwLjE0LTYuNDA4LDEyLjIwNC0yNS4xNDcsMjAuNDQ5QzQ1Ljk3MSwxNjguNjY3LDYyLjY2NywxNTMuOTA4LDgyLjc0OSwxNTMuOTA4eiBNNDMuNTM0LDIwMy41NzggIGMxMC44MzctMy45NjYsMTguODczLTkuMTUsMjQuNjg1LTE0LjA4MWM4LjQwMiw1LjY0NiwyNS43NzIsMTQuNTgxLDUzLjE3NSwxNi4yMTZjLTQuOTU5LDE2LjY1NS0yMC40MDIsMjguODM2LTM4LjY0NSwyOC44MzYgIEM2My43MzUsMjM0LjU0OSw0Ny43NjMsMjIxLjMxNiw0My41MzQsMjAzLjU3OHogTTE1MC43MywzNjAuODQzaC0xOC42MzZ2LTQxLjE1MWgtMTQuNzY5djQxLjE1MUg0OC4xNzN2LTQxLjE1MUgzMy40MDR2NDEuMTUxICBIMTQuNzY5di00My41NDVjMC0yNi44NTMsMTUuNjUzLTUwLjExNiwzOC4zMTMtNjEuMTUzbDIyLjI4MiwyNS41NDR2MzIuNjg0aDE0Ljc2OXYtMzIuNjg0bDIyLjI4Mi0yNS41NDQgIGMyMi42NiwxMS4wMzgsMzguMzE0LDM0LjI5OSwzOC4zMTQsNjEuMTUzTDE1MC43MywzNjAuODQzTDE1MC43MywzNjAuODQzeiIvPgo8cmVjdCB4PSI3NS4zNjIiIHk9IjMyNC41MDIiIHdpZHRoPSIxNC43NjkiIGhlaWdodD0iMTEuOTU1Ii8+CjxwYXRoIGQ9Ik00NzYuMzUzLDI0OS4zMThoMzIuODc1TDQ4NC4zLDE5Mi41ODNjLTAuODc1LTI5LjYxNy0yNS4yMjMtNTMuNDQ1LTU1LjA0OS01My40NDVjLTI5Ljg4NCwwLTU0LjI2OCwyMy45MjEtNTUuMDUzLDUzLjYxOSAgbC0yMS44MDcsNTYuNTYxaDI5Ljc1OGMtMjEuNTIxLDE0Ljk1Ny0zNS42NDgsMzkuODQ0LTM1LjY0OCw2Ny45ODF2NTguMzE0SDUxMnYtNTguMzE0ICBDNTEyLDI4OS4xNjMsNDk3Ljg3NCwyNjQuMjc3LDQ3Ni4zNTMsMjQ5LjMxOHogTTQyOS4yNTEsMjY3LjY4OGwtMTQuNjI2LTE2Ljc2N2M0LjcxNC0xLjAzOSw5LjYwNS0xLjYwMiwxNC42MjYtMS42MDIgIGM1LjAyMiwwLDkuOTEyLDAuNTYzLDE0LjYyNiwxLjYwMkw0MjkuMjUxLDI2Ny42ODh6IE0zODkuNjE5LDIwMS42MTNoNzkuMjYzYy0zLjQ4MSwxOC43MTgtMTkuOTIyLDMyLjkzNi0zOS42MzIsMzIuOTM2ICBDNDA5LjU0MSwyMzQuNTQ5LDM5My4xLDIyMC4zMywzODkuNjE5LDIwMS42MTN6IE00NjYuNzM1LDIzNC41NDljNS4xNS00Ljc5MSw5LjM4Mi0xMC41NTEsMTIuNDA2LTE2Ljk5MWw3LjQ2NSwxNi45OTFINDY2LjczNXogICBNNDI5LjI1MSwxNTMuOTA4YzE5LjcxLDAsMzYuMTUxLDE0LjIyLDM5LjYzMiwzMi45MzZoLTE2LjY0OXYtMTIuOTkzaC0xNC43Njl2MTIuOTkzSDM4OS42MiAgQzM5My4xLDE2OC4xMjcsNDA5LjU0MSwxNTMuOTA4LDQyOS4yNTEsMTUzLjkwOHogTTM3OS45NzcsMjE4LjgyM2MyLjk3Miw1LjkzLDYuOTc5LDExLjI1MSwxMS43OSwxNS43MjZoLTE3Ljg1M0wzNzkuOTc3LDIxOC44MjN6ICAgTTQ5Ny4yMzEsMzYwLjg0M2gtMTguNjM1di00MS4xNTFoLTE0Ljc2OXY0MS4xNTFoLTY5LjE1MnYtNDEuMTUxaC0xNC43Njl2NDEuMTUxSDM2MS4yN3YtNDMuNTQ1ICBjMC0yNi44NTMsMTUuNjU0LTUwLjExNiwzOC4zMTQtNjEuMTUzbDIyLjI4MiwyNS41NDR2MzIuNjg0aDE0Ljc2OXYtMzIuNjg0bDIyLjI4Mi0yNS41NDRjMjIuNjYsMTEuMDM5LDM4LjMxMywzNC4zLDM4LjMxMyw2MS4xNTQgIFYzNjAuODQzeiIvPgo8cmVjdCB4PSI0MjEuODY4IiB5PSIzMjQuNTAyIiB3aWR0aD0iMTQuNzY5IiBoZWlnaHQ9IjExLjk1NSIvPgo8cGF0aCBkPSJNMjU2LDc4LjIxOGM0OC4yNjgsMCw5My41MzUsMTguOTEzLDEyNy40NTksNTMuMjU1bDEwLjUwOC0xMC4zOEMzNTcuMjQ1LDgzLjkyLDMwOC4yNDksNjMuNDQ5LDI1Niw2My40NDkgIGMtNTAuMDU5LDAtOTcuNTc0LDE5LjAxNi0xMzMuNzkyLDUzLjU0NGwxMC4xOTEsMTAuNjg5QzE2NS44NTcsOTUuNzg0LDIwOS43NTMsNzguMjE4LDI1Niw3OC4yMTh6Ii8+CjxwYXRoIGQ9Ik0yNTYsNDM2LjUzNGMtNDUuNjY2LDAtODkuMTYtMTcuMTg2LTEyMi40NjYtNDguMzkybC0xMC4wOTgsMTAuNzc4QzE1OS40OSw0MzIuNywyMDYuNTY5LDQ1MS4zMDMsMjU2LDQ1MS4zMDMgIGM0Ni4xODMsMCw5MC45MjItMTYuNTA4LDEyNS45NzQtNDYuNDg0bC05LjU5OC0xMS4yMjVDMzM5Ljk5Nyw0MjEuMjg0LDI5OC42NjYsNDM2LjUzNCwyNTYsNDM2LjUzNHoiLz4KPHBhdGggZD0iTTE5NS44NzksMjU3LjM3NmMwLDMzLjE1LDI2Ljk3MSw2MC4xMiw2MC4xMjEsNjAuMTJzNjAuMTIxLTI2Ljk3LDYwLjEyMS02MC4xMnMtMjYuOTcxLTYwLjEyLTYwLjEyMS02MC4xMiAgUzE5NS44NzksMjI0LjIyNSwxOTUuODc5LDI1Ny4zNzZ6IE0zMDEuMzUxLDI1Ny4zNzZjMCwyNS4wMDYtMjAuMzQ0LDQ1LjM1LTQ1LjM1MSw0NS4zNXMtNDUuMzUxLTIwLjM0NC00NS4zNTEtNDUuMzUgIGMwLTI1LjAwNiwyMC4zNDQtNDUuMzUsNDUuMzUxLTQ1LjM1UzMwMS4zNTEsMjMyLjM2OSwzMDEuMzUxLDI1Ny4zNzZ6Ii8+CjxyZWN0IHg9IjM3Ljg4NSIgeT0iODUuNTQ1IiB3aWR0aD0iMTQuNzY5IiBoZWlnaHQ9IjE2LjIzNyIvPgo8cmVjdCB4PSIxMjMuMDY3IiB5PSI0NC43NjMiIHdpZHRoPSIxNC43NjkiIGhlaWdodD0iMTYuMjM3Ii8+CjxyZWN0IHg9IjU5Ljk4OSIgeT0iOC43NiIgd2lkdGg9IjE0Ljc2OSIgaGVpZ2h0PSIxNi4yMzciLz4KPHJlY3QgeD0iOTIuNjMzIiB5PSI0MTAuMjIyIiB3aWR0aD0iMTQuNzY5IiBoZWlnaHQ9IjE2LjIzNyIvPgo8cmVjdCB4PSI3LjQ0MiIgeT0iNDUxLjAwNSIgd2lkdGg9IjE0Ljc2OSIgaGVpZ2h0PSIxNi4yMzciLz4KPHJlY3QgeD0iNzAuNTE4IiB5PSI0ODcuMDAzIiB3aWR0aD0iMTQuNzY5IiBoZWlnaHQ9IjE2LjIzNyIvPgo8cmVjdCB4PSI0NTkuNTIiIHk9Ijg1LjU0NSIgd2lkdGg9IjE0Ljc2OSIgaGVpZ2h0PSIxNi4yMzciLz4KPHJlY3QgeD0iMzc0LjM0MSIgeT0iNDQuNzYzIiB3aWR0aD0iMTQuNzY5IiBoZWlnaHQ9IjE2LjIzNyIvPgo8cmVjdCB4PSI0MzcuNDE1IiB5PSI4Ljc2IiB3aWR0aD0iMTQuNzY5IiBoZWlnaHQ9IjE2LjIzNyIvPgo8cmVjdCB4PSI0MDQuNzc1IiB5PSI0MTAuMjIyIiB3aWR0aD0iMTQuNzY5IiBoZWlnaHQ9IjE2LjIzNyIvPgo8cmVjdCB4PSI0ODkuOTY0IiB5PSI0NTEuMDA1IiB3aWR0aD0iMTQuNzY5IiBoZWlnaHQ9IjE2LjIzNyIvPgo8cmVjdCB4PSI0MjYuODkiIHk9IjQ4Ny4wMDMiIHdpZHRoPSIxNC43NjkiIGhlaWdodD0iMTYuMjM3Ii8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                        </a>
                        <div class="item">
                            <i class="red user circle icon"></i>
                            登入中: {{ Auth::user()->name }} {{ Auth::user()->email }}
                        </div>
                        <a class="item" href="{{ route('linkAdd') }}">
                            <i class="teal plus icon"></i>
                            新增短網址
                        </a>
                        <a class="item" href="{{ route('register') }}">
                            <i class="blue add user icon"></i>
                            註冊帳號
                        </a>
                        <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="grey sign out icon"></i>
                            <b>登出</b>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif

            @if (Request::path() == 'see/list')
                <div class="thirteen wide column">
            @else
                <div class="thirteen wide column">
            @endif

            @yield('content')
            </div>
        </div>
    </div>

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
