@if(!Request::is('athletes'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('athletes.index') }}">Админ</a>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('athletes.create') }}">Добави</a>
    </li>
@endif

<li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}"> {{ __('auth.logout') }} {{ Auth::user()->name }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
