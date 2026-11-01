<header class="main-header sticky-header sticky-header--normal">
    <div class="container">
        <div class="main-header__inner">
            <div class="main-header__left">
                <div class="main-header__logo">
                    <a href="{{ route('front.home') }}">
                        <img src="{{ asset('storage/' . $settings['logo_dark']) }}" alt="{{ $settings['site_name'] }}" width="146">
                    </a>
                </div><!-- /.main-header__logo -->
                @include('front.partials.navbar')
            </div><!-- /.main-header__left -->

            <div class="main-header__right">
                <div class="mobile-nav__btn mobile-nav__toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </div><!-- /.mobile-nav__toggler -->
                <a href="{{ route('tours.index') }}"
                    class="main-header__booking-btn trevlo-btn trevlo-btn--white-two"><span>Start
                        Booking</span></a><!-- /.main-header__btn -->
                <div class="main-header__right-right">
                    <div class="main-header__phone">
                        <div class="main-header__phone-icon">
                            <span class="icon-phone-1"></span>
                        </div>
                        <div class="main-header__phone-text">
                            <p class="main-header__phone-title">Call Anytime</p>
                            <h4 class="main-header__phone-number"><a href="tel:{{ $settings['site_phone'] }}">{{ $settings['site_phone'] }}</a>
                            </h4>
                        </div>
                    </div><!-- /.main-header__phone -->
                    <div class="main-header__divider"></div>
                    <ul class="main-header__search-user">
                       
                        <li class="main-header__search-user-item">
                            <a href="{{ route('user.login') }}" class="main-header__user">
                                <span class="icon-user-1"></span>
                            </a>
                        </li>
                    </ul><!-- /.main-header__search-user -->
                </div><!-- /.main-header__right-right -->
            </div><!-- /.main-header__right -->
        </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
</header><!-- /.main-header -->
