<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('images/logo-m.png')}}" data-src="{{asset('images/logo-m.png')}}"
                                                              class="lazyload"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <ul class="menu-bars">
                            <li><span></span></li>
                            <li><span></span></li>
                            <li><span></span></li>
                        </ul>
                    </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('albums.index')}}"> My Albums</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}"> Profile</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-gradiant" href="{{route('albums.create')}}">
                            New Album
                        </a>
                    </li>

                    <li class="nav-item">
                        <button class="btn btn-gradiant">
                            <a href="{{route('logout')}}">Logout</a>
                        </button>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <button class="btn btn-gradiant">
                            <a href="{{route('register')}}">Register</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-gradiant">
                            <a href="{{route('login')}}">login</a>
                        </button>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
