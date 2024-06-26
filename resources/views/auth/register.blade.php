<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>REGISTRARSE</title>
    <link rel="stylesheet" href="{{ asset('assets/app2.css') }}" />
</head>

<body>
    <div class="login-root">
        <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh; flex-grow: 1">
            <div class="loginbackground box-background--white padding-top--64">
                <div class="loginbackground-gridContainer">
                    <div class="box-root flex-flex" style="grid-area: top / start / 8 / end">
                        <div class="box-root"
                            style="
                  background-image: linear-gradient(
                    white 0%,
                    rgb(247, 250, 252) 33%
                  );
                  flex-grow: 1;
                ">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5">
                        <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2">
                        <div class="box-root box-background--blue800" style="flex-grow: 1"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4">
                        <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6">
                        <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end">
                        <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end">
                        <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1"></div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20">
                        <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1">
                        </div>
                    </div>
                    <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17">
                        <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9">
                <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
                    <h1>REGISTRO</h1>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                @endif
                <div class="formbg-outer">
                    <div class="formbg">
                        <div class="formbg-inner padding-horizontal--58">
                            <span class="padding-bottom--15"></span>
                        </div>
                        <form class="login" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="field padding-bottom--24">
                                <input type="text" name="name" placeholder="NOMBRE COMPLETO" required />
                            </div>
                            <div class="field padding-bottom--24">
                                <input type="text" name="rpe" placeholder="RPE" required />
                            </div>
                            <div class="field padding-bottom--24">
                                <input type="password" name="password" placeholder="CONTRASEÑA" width="200%"
                                    required />
                            </div>
                            <div class="field padding-bottom--24">
                                <input type="password" name="password_confirmation" placeholder="CONFIRMAR CONTRASEÑA"
                                    required />
                            </div>
                            <div class="field padding-bottom--24">
                                <input type="submit" name="submit" value="REGISTRAR" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<footer>&#169; 2024 CENTRAL TERMOELÉCTRICA PUNTA PRIETA</footer>

</html>
