@auth
    <!--sidebar start-->
    <aside>
        <div id="sidebar" >
            <!-- sidebar menu start-->
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/admin">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="/">
                        <span>Home</span>
                    </a>
                </li>

                <li class="list-group-item">
                    <a href="{{route('users')}}">
                        <span>Users</span>
                    </a>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
@endauth
