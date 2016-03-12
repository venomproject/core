<header class="main-header">
    <a href="index2.html" class="logo"><b>Panel</b>CMS</a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Masz 0 nowych wiadomości</li>
                        <li>
                        </li>
                        <li class="footer"><a href="#">Zobacz wszystkie</a></li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">0</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Brak ostrzeżeń</li>
                    </ul>
                </li>
                <li class="user user-menu">
                    <a href="{{ URL::to('/logout') }}" >
                        <span>Wyloguj</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>