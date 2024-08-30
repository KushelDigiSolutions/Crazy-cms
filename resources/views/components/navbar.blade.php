<nav class="main-header navbar navbar-expand navbar-{{ Auth::user()->mode }} navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        @auth
            <li class="nav-item">
                <span class="nav-link">Hello, {{ Auth::user()->name }}</span>
            </li>
            @role('admin')
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <!-- <input type="submit" value="Log out" class="btn btn-primary btn-sm"> -->
                    </form>
                </li>
            @endrole
            @role('user')
                <li class="nav-item">
                    <div class="crazy-cms-banner">
                        <div class="crazy-cms-container">
                            <div class="crazy-cms-content">
                                <div class="crazy-cms-right-click">
                                    <div class="crazy-cms-icon-name1">
                                        <div class="crazy-cms-icon-name cursor-pointer tyh">
                                            <img class="cursor-pointer" src="{{ asset('admin/img/ByeWind.svg') }}" alt="">
                                            <span class="nick">Nick</span>
                                        </div>
                                        <div class="crazy-cms-click-icon cursor-pointer">
                                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.293 0.29303L5.99997 4.58603L1.70697 0.29303L0.292969 1.70703L5.99997 7.41403L11.707 1.70703L10.293 0.29303Z" fill="#8A93A3"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="crazy-cms-sidebar">
                                <div class="crazy-cms-settings">
                                    <div class="crazy-cms-plans">
                                        <div class="crazy-cms-oneset">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.0004 24H9.00042V20.487C7.95768 20.1181 6.99187 19.5601 6.15142 18.841L3.10742 20.6L0.107422 15.4L3.15042 13.645C2.95053 12.5574 2.95053 11.4426 3.15042 10.355L0.107422 8.6L3.10742 3.4L6.15142 5.159C6.99187 4.43993 7.95768 3.88194 9.00042 3.513V0H15.0004V3.513C16.0432 3.88194 17.009 4.43993 17.8494 5.159L20.8934 3.4L23.8934 8.6L20.8504 10.355C21.0503 11.4426 21.0503 12.5574 20.8504 13.645L23.8934 15.4L20.8934 20.6L17.8494 18.842C17.0089 19.5607 16.0431 20.1184 15.0004 20.487V24ZM11.0004 22H13.0004V18.973L13.7514 18.779C14.9834 18.4598 16.1048 17.8101 16.9944 16.9L17.5374 16.347L20.1604 17.862L21.1604 16.13L18.5404 14.617L18.7464 13.871C19.0851 12.6439 19.0851 11.3481 18.7464 10.121L18.5404 9.375L21.1604 7.862L20.1604 6.13L17.5374 7.649L16.9944 7.1C16.1043 6.19134 14.983 5.54302 13.7514 5.225L13.0004 5.027V2H11.0004V5.027L10.2494 5.221C9.01741 5.54015 7.89603 6.18988 7.00642 7.1L6.46342 7.653L3.84042 6.134L2.84042 7.866L5.46042 9.379L5.25442 10.125C4.91578 11.3521 4.91578 12.6479 5.25442 13.875L5.46042 14.621L2.84042 16.134L3.84042 17.866L6.46342 16.351L7.00642 16.904C7.89651 17.8127 9.01785 18.461 10.2494 18.779L11.0004 18.973V22ZM12.0004 16C11.2093 16 10.4359 15.7654 9.77814 15.3259C9.12034 14.8864 8.60765 14.2616 8.3049 13.5307C8.00215 12.7998 7.92294 11.9956 8.07728 11.2196C8.23162 10.4437 8.61258 9.73098 9.17199 9.17157C9.7314 8.61216 10.4441 8.2312 11.2201 8.07686C11.996 7.92252 12.8003 8.00173 13.5312 8.30448C14.2621 8.60723 14.8868 9.11992 15.3263 9.77772C15.7658 10.4355 16.0004 11.2089 16.0004 12C16.0004 13.0609 15.579 14.0783 14.8288 14.8284C14.0787 15.5786 13.0613 16 12.0004 16ZM12.0004 10C11.6049 10 11.2182 10.1173 10.8893 10.3371C10.5604 10.5568 10.304 10.8692 10.1527 11.2346C10.0013 11.6001 9.96168 12.0022 10.0389 12.3902C10.116 12.7781 10.3065 13.1345 10.5862 13.4142C10.8659 13.6939 11.2223 13.8844 11.6102 13.9616C11.9982 14.0387 12.4003 13.9991 12.7658 13.8478C13.1312 13.6964 13.4436 13.44 13.6634 13.1111C13.8831 12.7822 14.0004 12.3956 14.0004 12C14.0004 11.4696 13.7897 10.9609 13.4146 10.5858C13.0396 10.2107 12.5309 10 12.0004 10Z" fill="#160647"/>
                                            </svg>
                                        </div>
                                        <div class="crazy-cms-refer">
                                            <span>Settings</span>
                                        </div>
                                    </div>
                                    <!-- Add more settings or actions here -->
                                </div>
                                <!-- Add more sidebar content or functionality here -->
                            </div>
                        </div>
                    </div>
                </li>
            @endrole
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @endauth
    </ul>
</nav>