<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LICENCIAS CT PP - @yield('title')</title>
    <meta name="description" content="@yield('meta-description', 'Default meta descripcion')" />
    <style>
        nav {
            margin: auto;
            position: relative;
            width: auto;
            height: 55px;
            background-color: #1d2538;
            border-radius: 2px;
            font-size: 0;
        }

        body {
            font-size: 12px;
            font-family: sans-serif;
            background: rgba(240, 248, 255, 0.808);
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        ul[type="menu"] {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            gap: 3rem;
        }

        ul[type="menu"],
        li[type="lic"],
        li[type="stats"],
        li[type="prin"],
        li[type="docs"],
        li[type="ayud"] {
            list-style: none;
        }

        li[type="lic"] a,
        li[type="stats"] a,
        li[type="prin"] a,
        li[type="docs"] a,
        li[type="ayud"] a {
            position: relative;
            display: block;
            text-transform: uppercase;
            margin: 20px 0;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            font-family: sans-serif;
            font-size: 18px;
            font-weight: 600;
            transition: 0.5s;
            z-index: 1;
        }

        li[type="lic"] a:before,
        li[type="stats"] a:before,
        li[type="prin"] a:before,
        li[type="docs"] a:before,
        li[type="ayud"] a:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-top: 2px solid #fff;
            border-bottom: 2px solid #fff;
            transform: scaleY(2);
            opacity: 0;
            transition: 0.3s;
        }

        li[type="lic"] a:after,
        li[type="stats"] a:after,
        li[type="prin"] a:after,
        li[type="docs"] a:after,
        li[type="ayud"] a:after {
            content: "";
            position: absolute;
            top: 1.2px;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            transform: scale(0);
            opacity: 0;
            transition: 0.3s;
            z-index: -1;
        }

        li[type="lic"] a:hover,
        li[type="stats"] a:hover,
        li[type="prin"] a:hover,
        li[type="docs"] a:hover,
        li[type="ayud"] a:hover {
            color: #262626;
        }

        li[type="lic"] a:hover:before,
        li[type="stats"] a:hover:before,
        li[type="prin"] a:hover:before,
        li[type="docs"] a:hover:before,
        li[type="ayud"] a:hover:before {
            transform: scaleY(1);
            opacity: 1;
        }

        li[type="lic"] a:hover:after,
        li[type="stats"] a:hover:after,
        li[type="prin"] a:hover:after,
        li[type="docs"] a:hover:after,
        li[type="ayud"] a:hover:after {
            transform: scaleY(1);
            opacity: 1;
        }

        h1 {
            text-align: center;
            margin: 40px 0 40px;
            text-align: center;
            font-size: 30px;
            color: #000000;
            font-family: sans-serif;
        }

        p {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #ecf0f1;
            font-family: 'Cherry Swash', cursive;
            font-size: 16px;
        }

        span {
            color: #2BD6B4;
        }

        /*
        button[name="logout"] {
            border-radius: 4px;
            height: auto;
            width: auto;
            color: black;
            background-color: #2BD6B4;
            margin-top: 40%;
            margin-left: 450%;
        }

        */

        div[name="logout"] {
            text-align: center;
        }

        .logout-button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #72ffb6d7;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10%;
            margin-left: 220%;
        }

        .logout-button:hover {
            background-color: #475b80;
        }

        .logout-button:focus {
            outline: none;
            box-shadow: 0 0 0 2px #475b80;
        }
    </style>
    @include('partials.navigation')
</head>

<body>
    @yield('content')
    @yield('secondcontent')
    @stack('scripts')
</body>

</html>
