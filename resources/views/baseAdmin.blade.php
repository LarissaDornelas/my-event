@extends('assets')
@section('title')
Meu Evento
@endsection
@section('content')

<body style="background:#f9f9f9">

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo"><a href="index.html">
                        <!-- <img src="assets/images/logo.png" alt="" /> --><span>MEU EVENTO</span></a></div>
                <ul>
                    <li class="label">Área administrativa</li>
                    <li {!! Route::is('dashboard') ? "class='active'" : '' !!}><a href="{{ route('dashboard')}}"><i
                                class="ti-home"></i>
                            Dashboard </a>
                    </li>
                    <li {!! Route::is('getAllUsers') || Route::is('getOneUser')? "class='active'" : '' !!}><a
                            href="{{ route('getAllUsers')}}"><i class="ti-user"></i>
                            Usuários </a>
                    </li>
                    <li {!! Route::is('getAllEvents') ? "class='active'" : '' !!}><a
                            href="{{ route('getAllEvents')}}"><i class="ti-calendar"></i>
                            Eventos </a>
                    </li>

                    <li {!! Route::is('getAllProviders') || Route::is('getOneProvider')? "class='active'" : '' !!}><a
                            href="{{ route('getAllProviders')}}"><i class="ti-truck"></i>
                            Fornecedores </a>
                    <li class=@if( Route::is('getAllEventCategories') || Route::is('getAllProviderCategories')) 'open'
                        @else '' @endif><a
                            class="@if( Route::is('getAllEventCategories') || Route::is('getAllProviderCategories'))'' @else sidebar-sub-toggle @endif">
                            <i class="ti-bookmark-alt"></i> Categorias <span
                                class="sidebar-collapse-icon ti-angle-down active"></span></a>
                        <ul
                            style="display: @if( Route::is('getAllEventCategories')|| Route::is('getAllProviderCategories')) block @else none @endif">
                            <li {!! Route::is('getAllEventCategories') ? "class='active'" : '' !!}> <a
                                    href="{{ route('getAllEventCategories')}}"><i class="ti-bookmark-alt"></i>
                                    Eventos</a></li>
                            <li {!! Route::is('getAllProviderCategories') ? "class='active'" : '' !!}><a
                                    href="{{ route('getAllProviderCategories')}}"><i
                                        class="ti-bookmark-alt"></i>Fornecedores</a></li>



                        </ul>
                    </li>

                    <li><a><i class="ti-settings"></i>
                            Configurações </a>
                    </li>




                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->


    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <ul>

                            <li class="header-icon dib"><i class="ti-bell"></i>
                                <div class="drop-down">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="header-icon dib"><i class="ti-email"></i>
                                <div class="drop-down">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img"
                                                        src="assets/images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34
                                                            PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you
                                                            ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="header-icon dib"><span class="user-avatar">{{Auth::User()->name}} &nbsp; <i
                                        class="ti-angle-down f-s-10"></i></span>
                                <div class="drop-down dropdown-profile">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>

                                            <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                            <li><a href="#"><i class="ti-settings"></i> <span>Setting</span></a></li>

                                            <li><a href="#"><i class="ti-lock"></i> <span>Lock Screen</span></a></li>
                                            <li><a href="{{Route('logout')}}"><i class="ti-power-off"></i>
                                                    <span>Sair</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                @yield('pageTitle')
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">

                                    @yield('breadcrumbLinks')
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                @yield('pageContent')
                <div class="row">
                    <!--div-- class="col-lg-12">
                        <div class="footer">
                            <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                        </div>
                    </!--div-->
                </div>
                </section>
            </div>
        </div>
    </div>
    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>



    @endsection
    @section('morejs')
    @yield('addjs')
    @endsection
