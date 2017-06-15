<nav>
    <ul id="menu">
        <li><a href="{{route('home')}}">Home</a></li>
        @if($user->role === 'admin')
        <li><a class="link" href="{{route('admin.home')}}">Admin</a></li>
        @endif
        <li><form method="POST" action="{{route('logout')}}">{{csrf_field()}}<input class="btn btn-link" type="submit" value="Logout"></form></li>
    </ul>
</nav>
