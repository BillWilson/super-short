<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yooo</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
        *, *:before, *:after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            font-size: 62.5%;
            height: 100%;
            overflow: hidden;
        }
        @media (max-width: 768px) {
            html, body {
                font-size: 50%;
            }
        }

        svg {
            display: inline-block;
            width: 2rem;
            height: 2rem;
            overflow: visible;
        }

        .svg-icon {
            cursor: pointer;
        }
        .svg-icon path {
            stroke: rgba(255, 255, 255, 0.9);
            fill: none;
            stroke-width: 1;
        }

        input, button {
            outline: none;
            border: none;
        }

        .cont {
            position: relative;
            height: 100%;
            background-image: url('{{ asset(rand(1,5) . '.jpg') }}');
            background-size: cover;
            overflow: auto;
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
        }

        .demo {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -15rem;
            margin-top: -26.5rem;
            width: 30rem;
            height: 53rem;
            overflow: hidden;
        }

        .login {
            position: relative;
            height: 100%;
            background: -webkit-linear-gradient(top, rgba(146, 135, 187, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
            background: linear-gradient(to bottom, rgba(146, 135, 187, 0.8) 0%, rgba(0, 0, 0, 0.6) 100%);
            -webkit-transition: opacity 0.1s, -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
            transition: opacity 0.1s, -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
            transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
            transition: opacity 0.1s, transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25), -webkit-transform 0.3s cubic-bezier(0.17, -0.65, 0.665, 1.25);
            -webkit-transform: scale(1);
            transform: scale(1);
        }
        .login.inactive {
            opacity: 0;
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
        .login__check {
            position: absolute;
            top: 16rem;
            left: 13.5rem;
            width: 14rem;
            height: 2.8rem;
            background: #fff;
            -webkit-transform-origin: 0 100%;
            transform-origin: 0 100%;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .login__check:before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 100%;
            width: 2.8rem;
            height: 5.2rem;
            background: #fff;
            box-shadow: inset -0.2rem -2rem 2rem rgba(0, 0, 0, 0.2);
        }
        .login__form {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 50%;
            padding: 1.5rem 2.5rem;
            text-align: center;
        }
        .login__row {
            height: 5rem;
            padding-top: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        .login__icon {
            margin-bottom: -0.4rem;
            margin-right: 0.5rem;
        }
        .login__icon.name path {
            stroke-dasharray: 73.50196075439453;
            stroke-dashoffset: 73.50196075439453;
            -webkit-animation: animatePath 2s 0.5s forwards;
            animation: animatePath 2s 0.5s forwards;
        }
        .login__icon.pass path {
            stroke-dasharray: 92.10662841796875;
            stroke-dashoffset: 92.10662841796875;
            -webkit-animation: animatePath 2s 0.5s forwards;
            animation: animatePath 2s 0.5s forwards;
        }
        .login__input {
            display: inline-block;
            width: 22rem;
            height: 100%;
            padding-left: 1.5rem;
            font-size: 1.5rem;
            background: transparent;
            color: #FDFCFD;
        }
        input::placeholder {
            color: gainsboro;
        }
        .login__submit {
            position: relative;
            width: 100%;
            height: 4rem;
            margin: 5rem 0 2.2rem;
            color: rgba(255, 255, 255, 0.8);
            background: #FF3366;
            font-size: 1.5rem;
            border-radius: 3rem;
            cursor: pointer;
            overflow: hidden;
            -webkit-transition: width 0.3s 0.15s, font-size 0.1s 0.15s;
            transition: width 0.3s 0.15s, font-size 0.1s 0.15s;
        }
        .login__submit:after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -1.5rem;
            margin-top: -1.5rem;
            width: 3rem;
            height: 3rem;
            border: 2px dotted #fff;
            border-radius: 50%;
            border-left: none;
            border-bottom: none;
            -webkit-transition: opacity 0.1s 0.4s;
            transition: opacity 0.1s 0.4s;
            opacity: 0;
        }
        .login__submit.processing {
            width: 4rem;
            font-size: 0;
        }
        .login__submit.processing:after {
            opacity: 1;
            -webkit-animation: rotate 0.5s 0.4s infinite linear;
            animation: rotate 0.5s 0.4s infinite linear;
        }
        .login__submit.success {
            -webkit-transition: opacity 0.1s 0.3s, background-color 0.1s 0.3s, -webkit-transform 0.3s 0.1s ease-out;
            transition: opacity 0.1s 0.3s, background-color 0.1s 0.3s, -webkit-transform 0.3s 0.1s ease-out;
            transition: transform 0.3s 0.1s ease-out, opacity 0.1s 0.3s, background-color 0.1s 0.3s;
            transition: transform 0.3s 0.1s ease-out, opacity 0.1s 0.3s, background-color 0.1s 0.3s, -webkit-transform 0.3s 0.1s ease-out;
            -webkit-transform: scale(30);
            transform: scale(30);
            opacity: 0.9;
        }
        .login__submit.success:after {
            -webkit-transition: opacity 0.1s 0s;
            transition: opacity 0.1s 0s;
            opacity: 0;
            -webkit-animation: none;
            animation: none;
        }
        .login__signup {
            font-size: 1.2rem;
            color: #ABA8AE;
        }
        .login__signup a {
            color: #fff;
            cursor: pointer;
        }

        .ripple {
            position: absolute;
            width: 15rem;
            height: 15rem;
            margin-left: -7.5rem;
            margin-top: -7.5rem;
            background: rgba(0, 0, 0, 0.4);
            -webkit-transform: scale(0);
            transform: scale(0);
            -webkit-animation: animRipple 0.4s;
            animation: animRipple 0.4s;
            border-radius: 50%;
        }

        @-webkit-keyframes animRipple {
            to {
                -webkit-transform: scale(3.5);
                transform: scale(3.5);
                opacity: 0;
            }
        }

        @keyframes animRipple {
            to {
                -webkit-transform: scale(3.5);
                transform: scale(3.5);
                opacity: 0;
            }
        }
        @-webkit-keyframes rotate {
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes rotate {
            to {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-webkit-keyframes animatePath {
            to {
                stroke-dashoffset: 0;
            }
        }
        @keyframes animatePath {
            to {
                stroke-dashoffset: 0;
            }
        }
    </style>
</head>
<body>
    <div class="cont">
        <div class="demo">
            <div class="login">

                <!--<div class="login__check"></div>-->
                <div style="position: absolute; top: 3rem; left: 8rem;">
                    <img class="image" style=" width: 14rem; height: 20rem;" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Zz4KCTxnPgoJCTxjaXJjbGUgc3R5bGU9ImZpbGw6IzhERDlGRjsiIGN4PSIyNTYiIGN5PSIyNTYiIHI9IjI1NiIvPgoJPC9nPgoJPGc+CgkJPHJlY3QgeD0iNTYiIHk9IjIwNi40NyIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHdpZHRoPSIyMi40NzciIGhlaWdodD0iNDUuNTMiLz4KCTwvZz4KCTxnPgoJCTxyZWN0IHg9IjQ1NS4zMzMiIHk9IjIyMi43NSIgc3R5bGU9ImZpbGw6I0IyQjlDOTsiIHdpZHRoPSIyNy42NjciIGhlaWdodD0iMzcuMjUiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiM5RkMzREQ7IiBkPSJNNDY0LDI5Nmg0NC44NjljMi4wNDYtMTMuMDM2LDMuMTMxLTI2LjM5LDMuMTMxLTQwYzAtNC4wMjQtMC4xMTktOC4wMjEtMC4zMDMtMTJINDY0VjI5NnoiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNCMzkxOTE7IiBkPSJNMC4wOTksMjUzLjEwMkMwLjA4NSwyNTQuMDczLDAsMjU1LjAyNSwwLDI1NmMwLDEzLjYxLDEuMDg1LDI2Ljk2NCwzLjEzMSw0MEg0OXYtNDIuODk4SDAuMDk5eiIvPgoJPC9nPgoJPGc+CgkJPHBvbHlsaW5lIHN0eWxlPSJmaWxsOiNCMkI5Qzk7IiBwb2ludHM9IjcyLDI5NiAxMjAsMjk2IDExMiwyMDggNzIsMjI0IDcyLDI5NiAgICIvPgoJPC9nPgoJPGc+CgkJPHJlY3QgeD0iMzA4Ljc1IiB5PSIyMTYiIHN0eWxlPSJmaWxsOiM3RkFBQjg7IiB3aWR0aD0iNDYuNSIgaGVpZ2h0PSI4MCIvPgoJPC9nPgoJPGc+CgkJPHJlY3QgeD0iMTEyIiB5PSIxNzYiIHN0eWxlPSJmaWxsOiNFRUUxQzI7IiB3aWR0aD0iMzIiIGhlaWdodD0iMTIwIi8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSIyODgiIHk9IjE5MiIgc3R5bGU9ImZpbGw6I0VFRTFDMjsiIHdpZHRoPSIzMiIgaGVpZ2h0PSIxMDQiLz4KCTwvZz4KCTxnPgoJCTxyZWN0IHg9IjIxNiIgeT0iMTcyLjAwMiIgc3R5bGU9ImZpbGw6IzlGQzNERDsiIHdpZHRoPSIzMiIgaGVpZ2h0PSIxMjMuOTk4Ii8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSIzNjciIHk9IjIyNCIgc3R5bGU9ImZpbGw6I0IyQjlDOTsiIHdpZHRoPSI0Ni41IiBoZWlnaHQ9IjcyIi8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSI0MTcuNSIgeT0iMjM2IiBzdHlsZT0iZmlsbDojQjM5MTkxOyIgd2lkdGg9IjQ2LjUiIGhlaWdodD0iNjAiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiM0M0FCNUY7IiBkPSJNMy4xMzEsMjk2QzIyLjMzNyw0MTguMzgyLDEyOC4yMjUsNTEyLDI1Niw1MTJjMTI3Ljc3NSwwLDIzMy42NjItOTMuNjE4LDI1Mi44NjktMjE2SDMuMTMxeiIvPgoJPC9nPgoJPGc+CgkJPHBhdGggc3R5bGU9ImZpbGw6IzcxQkU2MzsiIGQ9Ik00NzIuODc3LDM5MmMxOC4wMTgtMjguNjc3LDMwLjUyNS02MS4xNjcsMzUuOTkyLTk2SDMuMTMxYzUuNDY3LDM0LjgzMywxNy45NzUsNjcuMzIzLDM1Ljk5Miw5NiAgICBINDcyLjg3N3oiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiM5NEQ3NUI7IiBkPSJNMTUuNjE1LDM0NGg0ODAuNzdjNS42MzMtMTUuMzcsOS44ODEtMzEuNDA4LDEyLjQ4NC00OEgzLjEzMSAgICBDNS43MzUsMzEyLjU5Miw5Ljk4MiwzMjguNjMsMTUuNjE1LDM0NHoiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNCMEVCODE7IiBkPSJNNi4yNDksMzEyaDQ5OS41MDNjMS4xODctNS4yOCwyLjI3LTEwLjU5OSwzLjExNy0xNkgzLjEzMUMzLjk3OSwzMDEuNDAxLDUuMDYyLDMwNi43Miw2LjI0OSwzMTJ6Ii8+Cgk8L2c+Cgk8Zz4KCQk8cGF0aCBzdHlsZT0iZmlsbDojNjc0NDQ3OyIgZD0iTTM3NC4wMzksNDgzLjE1NkMzMjkuODEzLDQxMy4wMzQsMjU2LDI5NiwyNTYsMjk2TDEzNy45NjIsNDgzLjE1NSAgICBDMTczLjI4Nyw1MDEuNTUzLDIxMy40MTQsNTEyLDI1Niw1MTJTMzM4LjcxNCw1MDEuNTU0LDM3NC4wMzksNDgzLjE1NnoiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiM4QzY2NUI7IiBkPSJNMjg2LjI3MywzNDRDMjY4LjQ5NywzMTUuODE0LDI1NiwyOTYsMjU2LDI5NmwtMzAuMjczLDQ4SDI4Ni4yNzN6Ii8+Cgk8L2c+Cgk8Zz4KCQk8cG9seWxpbmUgc3R5bGU9ImZpbGw6I0ZERUZEQjsiIHBvaW50cz0iMjg4LDI5NiAyODgsMTQ4IDI0OCwxMjQgMjQ4LDI5NiAgICIvPgoJPC9nPgoJPGc+CgkJPHBvbHlnb24gc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIHBvaW50cz0iMTc2LDk2IDE3NiwyOTYgMjE2LDI5NiAyMTYsMTE3IDIxNiw2OCAgICIvPgoJPC9nPgoJPGc+CgkJPHJlY3QgeD0iMzQ0IiB5PSIxMzAiIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiB3aWR0aD0iMzIiIGhlaWdodD0iMTY2Ii8+Cgk8L2c+Cgk8Zz4KCQk8cG9seWxpbmUgc3R5bGU9ImZpbGw6I0EyOUI5MTsiIHBvaW50cz0iMTQ0LDI5NiAxNDQsMjU2IDk2LDI1NiA5NiwyOTYgICAiLz4KCTwvZz4KCTxnPgoJCTxwb2x5bGluZSBzdHlsZT0iZmlsbDojOUZDM0REOyIgcG9pbnRzPSIxOTAsMjk2IDE5MCwyMDAgMTQ0LDIwMCAxNDQsMjk2ICAgIi8+Cgk8L2c+Cgk8Zz4KCQk8cG9seWxpbmUgc3R5bGU9ImZpbGw6Izg4QjdDNjsiIHBvaW50cz0iMzIwLDI5NiAzMjAsMjY0IDI3MiwyNzIgMjcyLDI5NiAgICIvPgoJPC9nPgoJPGc+CgkJPHJlY3QgeD0iNDAwIiB5PSIyMTYiIHN0eWxlPSJmaWxsOiNGREVGREI7IiB3aWR0aD0iMzIiIGhlaWdodD0iODAiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMjU2LDI5NmwxMDUuODI5LDE5My4wOTljNC4xMjktMS44NzgsOC4yMDEtMy44NTUsMTIuMjEtNS45NDNMMjU2LDI5NnoiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNMjU2LDI5NkwxMzcuOTYyLDQ4My4xNTVjNC4wMDgsMi4wODgsOC4wOCw0LjA2NiwxMi4yMDksNS45NDRMMjU2LDI5NnoiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNFOUI2Njg7IiBkPSJNMjc4LjE4Miw1MTAuOTMyTDI1NiwyOTZsNy40MjMsMjE1Ljc3M0MyNjguMzgsNTExLjYzMSwyNzMuMyw1MTEuMzU0LDI3OC4xODIsNTEwLjkzMnoiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiNFOUI2Njg7IiBkPSJNMjU2LDI5NmwtMjIuMTgyLDIxNC45MzJjNC44ODIsMC40MjEsOS44MDIsMC42OTksMTQuNzU5LDAuODQxTDI1NiwyOTZ6Ii8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSI0MCIgeT0iMjQwIiBzdHlsZT0iZmlsbDojOUZDM0REOyIgd2lkdGg9IjMyIiBoZWlnaHQ9IjU2Ii8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSIzMjkuNSIgeT0iMjc0LjI1IiBzdHlsZT0iZmlsbDojQTI5QjkxOyIgd2lkdGg9IjUzLjUiIGhlaWdodD0iMjEuNzUiLz4KCTwvZz4KCTxnPgoJCTxyZWN0IHg9IjIxNiIgeT0iMjE4LjUiIHN0eWxlPSJmaWxsOiNCMzkxOTE7IiB3aWR0aD0iMTcuODE4IiBoZWlnaHQ9Ijc3LjUiLz4KCTwvZz4KCTxnPgoJCTxyZWN0IHg9IjEyMCIgeT0iMjgwIiBzdHlsZT0iZmlsbDojOUU4MjgyOyIgd2lkdGg9IjQ1LjY2NyIgaGVpZ2h0PSIxNiIvPgoJPC9nPgoJPGc+CgkJPHJlY3QgeD0iODIuMzMzIiB5PSIyODAiIHN0eWxlPSJmaWxsOiNFRUUxQzI7IiB3aWR0aD0iMjEuNDA2IiBoZWlnaHQ9IjE2Ii8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSIyMjQuOTY5IiB5PSIyODAiIHN0eWxlPSJmaWxsOiNFRUUxQzI7IiB3aWR0aD0iMTcuNjk4IiBoZWlnaHQ9IjE2Ii8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSIzNzYiIHk9IjI4MCIgc3R5bGU9ImZpbGw6I0VFRTFDMjsiIHdpZHRoPSIyOC41IiBoZWlnaHQ9IjE2Ii8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSIyODYuMjczIiB5PSIyODQuMzk2IiBzdHlsZT0iZmlsbDojOUU4MjgyOyIgd2lkdGg9IjIyLjQ3NyIgaGVpZ2h0PSIxMS42MDQiLz4KCTwvZz4KCTxnPgoJCTxyZWN0IHg9IjM5My41MjMiIHk9IjI3MCIgc3R5bGU9ImZpbGw6IzlFODI4MjsiIHdpZHRoPSIyMi40NzciIGhlaWdodD0iMjYiLz4KCTwvZz4KCTxnPgoJCTxyZWN0IHg9IjQ1Mi43NjIiIHk9IjI3Ni4zMzMiIHN0eWxlPSJmaWxsOiM5RTgyODI7IiB3aWR0aD0iNDYuOTA1IiBoZWlnaHQ9IjE5LjY2NyIvPgoJPC9nPgoJPGc+CgkJPHJlY3QgeD0iMjguNzYyIiB5PSIyNzAiIHN0eWxlPSJmaWxsOiM5RTgyODI7IiB3aWR0aD0iMjIuNDc3IiBoZWlnaHQ9IjI2Ii8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSIxODAiIHk9IjI3MCIgc3R5bGU9ImZpbGw6I0IyQjlDOTsiIHdpZHRoPSIxNi45ODEiIGhlaWdodD0iMjYiLz4KCTwvZz4KCTxnPgoJCTxyZWN0IHg9IjM0Ni43NiIgeT0iMjg0LjM5NiIgc3R5bGU9ImZpbGw6I0IyQjlDOTsiIHdpZHRoPSIxNi45ODEiIGhlaWdodD0iMTEuNjA0Ii8+Cgk8L2c+Cgk8Zz4KCQk8cmVjdCB4PSIyMy4wMTkiIHk9IjI4NC4zOTYiIHN0eWxlPSJmaWxsOiNCMkI5Qzk7IiB3aWR0aD0iMTYuOTgxIiBoZWlnaHQ9IjExLjYwNCIvPgoJPC9nPgoJPGc+CgkJPHJlY3QgeD0iOTguMzUyIiB5PSIyODgiIHN0eWxlPSJmaWxsOiNCMkI5Qzk7IiB3aWR0aD0iMzIuNjMzIiBoZWlnaHQ9IjgiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
                </div>
                <div class="login__form">
                    <form class="ui large form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" name="email" class="login__input name" value="{{ old('email') }}" placeholder="E-mail"/>
                        </div>
                        <div class="login__row">
                            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                            </svg>
                            <input type="password" class="login__input pass" name="password" value="{{ old('password') }}" placeholder="密碼"/>
                        </div>
                        <button type="submit" class="login__submit">登入</button>
                    </form>
                    <p class="login__signup">有問題嗎? 還是迷路了? 請記得回上一頁</p>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        var animating = false,
            submitPhase1 = 1100,
            submitPhase2 = 400,
            logoutPhase1 = 800,
            $login = $(".login"),
            $app = $(".app");

        function ripple(elem, e) {
            $(".ripple").remove();
            var elTop = elem.offset().top,
                elLeft = elem.offset().left,
                x = e.pageX - elLeft,
                y = e.pageY - elTop;
            var $ripple = $("<div class='ripple'></div>");
            $ripple.css({top: y, left: x});
            elem.append($ripple);
        };

        $(document).on("click", ".login__submit", function(e) {
            if (animating) return;
            animating = true;
            var that = this;
            ripple($(that), e);
            $(that).addClass("processing");
            setTimeout(function() {
                $(that).addClass("success");
                setTimeout(function() {
                    $app.show();
                    $app.css("top");
                    $app.addClass("active");
                }, submitPhase2 - 70);
                setTimeout(function() {
                    $login.hide();
                    $login.addClass("inactive");
                    animating = false;
                    $(that).removeClass("success processing");
                }, submitPhase2);
            }, submitPhase1);
        });
    });
</script>
</html>