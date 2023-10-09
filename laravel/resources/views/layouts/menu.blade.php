<header class="header_section">
    <div class="head1">
        <div class="container">
            <div class="top_contact-container">
                <div class="tel_container">
                    <a href="">
                        <img src="images/telephone-symbol-button.png" alt=""> Call : +01 1234567890
                    </a>
                </div>
                <div class="social-container">
                    <a href="">
                        <img src="images/fb.png" alt="" class="s-1">
                    </a>
                    <a href="">
                        <img src="images/twitter.png" alt="" class="s-2">
                    </a>
                    <a href="">
                        <img src="images/instagram.png" alt="" class="s-3">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="/">
                <img src="images/logom  .png" alt="" style="width: 100px; height 75px; ">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="d-flex  flex-column flex-lg-row align-items-center w-100 justify-content-between">
                <ul class="navbar-nav  ">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}"> About </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produk') }}"> Product </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontak') }}">Contact us</a>
                    </li>

                </ul>


                <div class="login_btn-contanier ml-0 ml-lg-5">
                    <div class="nav-item dropdown">
                        @guest
                            @if (Route::has('login'))
                                <div class="nav-item">
                                    <a href="{{ route('login') }}"><img
                                        src="images/user.png" alt=""><span> {{ __('Login') }}</span>
                                    </a>
                                </div>
                            @endif
                        @else
                            <a class="
                nav-link
                dropdown-toggle
                text-muted
                waves-effect waves-dark
                pro-pic
              "
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle"
                                    width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated bg-dark" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-account me-1 ms-1"></i>
                                    My
                                    Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-wallet me-1 ms-1"></i>
                                    My
                                    Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-email me-1 ms-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="mdi mdi-settings me-1 ms-1"></i>
                                    Account
                                    Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off me-1 ms-1"></i>{{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>

        </nav>
    </div>
</header>
