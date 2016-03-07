<aside class="main-sidebar">
    <section class="sidebar">
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="active treeview">
                <a href="{{ url('/admin/pages/')  }}"><i class="fa  fa-file-text-o"></i> <span>Strony</span></a>
            </li>
            <li class="active treeview">
                <ul class="treeview-menu">
                    @foreach ($parentPages as $link)
                    <li>
                        <a href="{{URL::to('/admin/pages/')}}/{{ $link->id}}/edit">
                            <i class="fa fa-circle-o"></i>
                            <span>{{$link->name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> Documentation</a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
            <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
        </ul>
    </section>
</aside>