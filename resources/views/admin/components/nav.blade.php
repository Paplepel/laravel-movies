@auth
    <!--sidebar start-->
    <aside>
        <div id="sidebar" >
            <!-- sidebar menu start-->
            <ul>
                <li>
                    <a href="/admin">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <span>Home</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a>
                        <span>Users</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li><a href="/allusers">All Users</a></li>
                        <li><a href="/createuser">Add User</a></li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
@endauth
