<nav class="navbar navbar-expand-md navbar-dark shadow-sm row">
    <div class="container-fluid col-10">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ __('navigation.title') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @if(Request::is('/'))
                    @include('components/navigation/home')
                @endif
                @auth
                    @include('components/navigation/auth')
                @endauth
            </ul>
        </div>
    </div>
</nav>
