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
            <span class="nav-link dropdown-toggle" id="navbarDropdown4" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                ようこそ　{{ Auth::user()->name ?? '' }}　さん
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

@section('footer_content')
    <script>
        $(function () {
            // ヘッダーのアイコン
            const iconBgColors = ['#e84d4d', '#5abc5a', '#a537db', '#f28c47', '#35ba99', '#0090e6', '#367bf5', '#f9556b', '#e6a200', '#e2ab48'];
            const name = '{{ Auth::user()->name ?? ''  }}'
            const avatar = document.querySelector('#header_avatar');
            let nameHeadLetter = name;
            nameHeadLetter = nameHeadLetter.trim();
            avatar.innerText = nameHeadLetter.substring(0, 1);
            let colorFromName = iconBgColors[Number.parseInt(name.replaceAll(/[g-z\-]/ig, '') || '0', 16) % iconBgColors.length];
            avatar.style.backgroundColor = colorFromName;
        });
    </script>
@endsection
