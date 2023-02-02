<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="/assets/adminlte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Friends RG Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item<?php if(current_controller() == 'dashboard') echo ' menu-open'?>">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="list-header">作る</li>
                <li class="nav-item">
                    <a href="{{ route('engi.list') }}" class="nav-link<?php if(current_controller() == 'engi') echo ' active'?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>演技シート</p>
                    </a>
                </li>

                <li class="list-header">管理する</li>
                <li class="nav-item">
                    <a href="{{ route('items.list') }}" class="nav-link<?php if(currentRouteName() === 'items.list') echo ' active'?>">
                        <i class="nav-icon fas fa-walking text-lg"></i>
                        <p>一覧</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('items.download') }}" class="nav-link<?php if(currentRouteName() === 'items.download') echo ' active'?>">
                        <i class="nav-icon fas fa-file-download text-lg"></i>
                        <p>ダウンロード</p>
                    </a>
                </li>


                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item<?php if(current_controller() == 'friendsNote') echo ' menu-open'?>">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>フレンズノート　<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pages/layout/top-nav.html" class="nav-link<?php if(currentRouteName() === 'friendsNode.list') echo ' active'?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>めにゅー１</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/layout/top-nav-sidebar.html" class="nav-link<?php if(currentRouteName() === 'friendsNode.edit') echo ' active'?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>めにゅー２</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/pages/calendar.html" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Calendar</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>リスト　<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/layout/boxed.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Boxed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/layout/fixed-sidebar-custom.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Sidebar <small>+ Custom Area</small></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/layout/fixed-topnav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Navbar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/layout/fixed-footer.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fixed Footer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/layout/collapsed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Collapsed Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
