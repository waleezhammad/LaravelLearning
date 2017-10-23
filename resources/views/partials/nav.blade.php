<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('blog.index') }}">Laravel Guide <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("blog.index")}}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("other.about")}}">About</a>
            </li>
        </ul>

    </div>
</nav>