<nav class="navbar navbar-expand-lg navbar-light py-3 mb-5" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="{{ route('groups') }}">Data Normalization</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item @if (request()->routeIs('groups')) active @endif">
                <a class="nav-link" href="{{ route('groups') }}">
                    All Groups
                </a>
            </li>
            <li class="nav-item @if (request()->routeIs('groups.types')) active @endif">
                <a class="nav-link" href="{{ route('groups.types') }}">
                    Group Types
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle 
                @if (request()->routeIs('group.create') || request()->routeIs('groups.type.create')) active @endif" href="#"
                    id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Create New
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('group.create') }}">Group</a>
                    <a class="dropdown-item" href="{{ route('group.type.create') }}">Group Type</a>
                </div>
            </li>
            <li class="nav-item @if (request()->routeIs('groups.data')) active @endif">
                <a class="nav-link" href="{{ route('groups.data') }}">
                    Group Data
                </a>
            </li>
            <li class="nav-item @if (request()->routeIs('groups.data.show')) active @endif">
                <a class="nav-link" href="{{ route('groups.data.show') }}">
                    Show Data
                </a>
            </li>
        </ul>

        <x-search-bar />

    </div>
</nav>
