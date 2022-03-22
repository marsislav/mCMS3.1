<header class="header bg-white navbar-area">
    <div class="container">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="/">
                        {{ $settings->site_name }}
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ms-auto">
                            @foreach ($pages as $page)
                            <li class="nav-item">
                                <a href="{{ route('page.single', ['id' => $page->id]) }}">{{ $page->name }}</a>
                            </li>
                            @endforeach

                            @if (!Auth::guest())

                            <li class="nav-item"><a href="{{ url('admin') }}">Admin Dashboard</a></li>
                            <li class="nav-item"><a href="{{ url('admin/user/profile') }}"> {{ (Auth::user()->name) }} </a></li>
                            <li class="nav-item"><a href="{{ url('/logout') }}">Logout</a></li>
                            @else
                            <li class="nav-item"><a href="{{ url('/login') }}">Login</a></li>
                            <li class="nav-item"><a href="{{ url('/register') }}">Register</a></li>
                            @endif
                        </ul>
                        @include('includes.search')
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
