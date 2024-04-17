<nav>
    <ul type="menu">
        <li type="prin"><a href="{{ route('principal') }}">PRINCIPAL</a></li>
        <li type="lic"><a href="{{ route('licencias') }}">LICENCIAS</a></li>
        <li type="stats"><a href="{{ route('status') }}">ESTADO</a></li>
        <li type="docs"><a href="{{ route('documentos') }}">REGISTRO</a></li>
    </ul>
    <div class="logconta">
        <form class="logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-button" type="submit">CERRAR SESIÓN</button>
        </form>
    </div>
</nav>


{{--  esta vista controla la navegacion del menú --}}
