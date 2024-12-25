<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', env('APP_NAME'))</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('back/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('back/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('css')
    <style>
        .img-profile {
            object-fit: cover
        }
        .colors {
            width: 100px;
            position: fixed;
            right: -60px;
            top: 100px;
            display: flex;
            transition: all .3s ease
        }

        .colors.open {
            right: 0;
        }
        .colors button {
            background: #d9d9d9;
            border: 0;
            width: 40px;
            height: 40px;
        }

        .colors ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            background: #e4e4e4;
            width: 60px;
            justify-content: center;
            padding: 5px 0;
        }

        .colors ul li {
            width: 20px;
            height: 20px;
            margin: 3px;
            cursor: pointer;
        }
    </style>

    @if (App::getLocale() == 'ar')
        <style>
            .topbar .dropdown .dropdown-menu {
                right: -60%;
            }
            body {
                direction: rtl;
                text-align: right;
            }

            .colors {
                right: unset;
                left: -60px;
            }

            .colors.open {
                right: unset;
                left: 0;
            }

            .sidebar {
                padding: 0
            }

            .sidebar .nav-item .nav-link {
                text-align: right;
            }

            .sidebar .nav-item .nav-link[data-toggle=collapse]::after {
                float: left;
                transform: rotate(180deg)
            }

            .ml-auto, .mx-auto {
                margin-left: unset!important;
                margin-right: auto!important;
            }
        </style>
    @endif
</head>

<body id="page-top">
    <div class="colors">
        <button><i class="fas fa-cog"></i></button>
        <ul>
            <li class="bg-gradient-primary"></li>
            <li class="bg-gradient-dark"></li>
            <li class="bg-gradient-success"></li>
            <li class="bg-gradient-info"></li>
            <li class="bg-gradient-warning"></li>
            <li class="bg-gradient-danger"></li>
        </ul>
    </div>

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        {{-- <ul>
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul> --}}

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-globe"></i> {{ __('admin.langs') }}</span>

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>

                                @endforeach
                            </div>
                        </li>

                        @if (Auth::user())
                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    @php
                                        $count = Auth::user()->unreadnotifications->count();
                                    @endphp

                                    <span class="{{ $count == 0 ? 'd-none' : '' }} badge badge-danger badge-counter" data-count="{{ $count }}">
                                        @php
                                            if($count > 5) {
                                                echo '5+';
                                            }else {
                                                echo $count;
                                            }
                                        @endphp
                                    </span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Notification Center
                                    </h6>
                                    @foreach (Auth::user()->notifications()->take(5)->get() as $item)
                                    <a class="dropdown-item d-flex align-items-center {{ $item->read_at ? '' : 'bg-light'}}" href="{{ $item->data['url'] }}?id={{ $item->id }}">
                                        <div>
                                            <div class="small text-gray-500">{{ $item->created_at->format('F d, Y') }}</div>
                                            <span class="font-weight-bold">{{ $item->data['msg'] }}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                    <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.notifications') }}">Show All Alerts</a>
                                </div>
                            </li>
                        @endif



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

                                @php
                                    if(Auth::user()->image) {
                                        $src = asset('images/'.Auth::user()->image->path);
                                    }else {
                                        $src = 'https://ui-avatars.com/api/?background=random&name='.Auth::user()->name;
                                    }
                                @endphp

                                <img class="img-profile rounded-circle"
                                    src="{{ $src }}" alt="news">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> {{ __('admin.out') }}</button>
                                </form>

                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('back/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('back/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('back/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('back/js/sb-admin-2.min.js') }}"></script>
    @yield('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        document.querySelector('.colors button').onclick = () => {
            document.querySelector('.colors').classList.toggle('open')
        }

        document.querySelectorAll('.colors ul li').forEach(el => {
            el.onclick = () => {
                let cl = el.classList[0];
                document.querySelector('#sidebar_color').className = '';
                document.querySelector('#sidebar_color').classList.add(cl)
                localStorage.setItem('cl', cl)
            }
        });

        let oldclass = localStorage.getItem('cl')??'bg-gradient-primary'
        document.querySelector('#sidebar_color').classList.add(oldclass)

    </script>
    <script>
        let userId = '{{ Auth::id() }}'
    </script>
    @vite(['resources/js/app.js'])
</body>

</html>
