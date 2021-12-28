<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="/"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Product</li><!-- /.menu-title -->
                <li class="{{ request()->is('products') ? 'active' : '' }}">
                    <a href="/products"> <i class="menu-icon fa fa-list"></i>Products</a>
                </li>
                <li class="menu-title">Orders</li><!-- /.menu-title -->
                <li class="{{ request()->is('orders') ? 'active' : '' }}">
                    <a href="/orders"> <i class="menu-icon fa fa-list"></i>Orders</a>
                </li>
                <li class="{{ request()->is('category') ? 'active' : '' }}">
                    <a href="/category"> <i class="menu-icon fa fa-plus"></i>Categories</a>
                </li>

                <li class="menu-title">Transaksi</li><!-- /.menu-title -->
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-list"></i>Lihat Transaksi</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
