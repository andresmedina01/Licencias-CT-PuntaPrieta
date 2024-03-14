<nav>
    <ul type="menu">
        <li type="prin"><a href="{{ route('principal') }}">PRINCIPAL</a></li>
        <li type="lic"><a href="{{ route('licencias') }}">LICENCIAS</a></li>
        <li type="stats"><a href="{{ route('status') }}">STATUS</a></li>
        <li type="docs"><a href="{{ route('documentos') }}">DOCUMENTOS</a></li>
        <form name="logout" action="{{ route('logout') }}" method="POST">
            @csrf
            <button name="logout" type="submit">CERRAR SESIÓN</button>
    </ul>
    </form>
</nav>
