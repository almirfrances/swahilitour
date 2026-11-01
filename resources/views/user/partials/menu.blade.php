<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
        <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
            @isUser
                <a href="/" class="app-brand-link gap-2">
                    {{-- <span class="app-brand-logo demo">
                  <img src="{{ asset('storage/' . ($settings['logo_dark'] )) }}" alt="Dark Logo" class="img-fluid mb-3">
            </span> --}}
                    <span class="app-brand-text demo menu-text fw-bold">{{ $settings['site_name'] }}</span>
                </a>
            @endisUser





            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
                <i class="ti ti-x ti-sm align-middle"></i>
            </a>
        </div>

        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">





                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        @php
                            $user = null;

                            if (auth()->guard('web')->check())   {
                                $user = auth()->guard('web')->user();
                            }
                        @endphp

                        <div class="avatar avatar-online user-initials">
                            {{ strtoupper($user->username[0]) }}
                        </div>



                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online user-initials">
                                            {{ strtoupper($user->username[0]) }}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        @isUser
                                            <span class="fw-medium d-block">{{ $user->full_name }}</span>
                                        @endisUser




                                        <small class="text-muted">{{ $user->username }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>

                        @isUser
                            <li>
                                <a class="dropdown-item" href="{{ route('user.settings.account') }}">
                                    <i class="ti ti-settings me-2 ti-sm"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                            </li>
                        @endisUser




                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('faqs.index') }}">
                                <i class="ti ti-help me-2 ti-sm"></i>
                                <span class="align-middle">FAQ</span>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('user.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>

        {{-- <!-- Search Small Screens -->
        <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
            <input type="text" class="form-control search-input border-0" placeholder="Search..."
                aria-label="Search..." />
            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
        </div> --}}
    </div>
</nav>
<style>
    .user-initials {
        width: 40px;
        height: 40px;
        background-color: #d12728;
        color: white;
        font-size: 22px;
        font-weight: bold;
        text-transform: uppercase;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        border-radius: 10%;
        object-fit: cover;
    }
</style>
