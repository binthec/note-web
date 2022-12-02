<?php
    use Illuminate\Support\Facades\Auth;
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <span id="header_avatar" class="header-avatar"></span>
            <span class="nav-link dropdown-toggle" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ようこそ　{!! Auth::user()->name !!}　さん
            </span>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                <a class="dropdown-item" href="#">FAQ</a>
                <a class="dropdown-item" href="#">Support</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user-cog"></i> プロフィール編集
                </a>
            </div>
        </li>
        <li class="nav-item d-none d-sm-inline-block" data-toggle="tooltip" title data-original-title="ヘルプ">
            <a href="#" class="nav-link" style="font-size: 18px;">
                <i class="far fa-question-circle text-lg"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               data-toggle="tooltip" data-placement="bottom" title="ログアウト">
                <i class="fas fa-sign-out-alt text-lg"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

        </li>
    </ul>
</nav>
<!-- /.navbar -->
