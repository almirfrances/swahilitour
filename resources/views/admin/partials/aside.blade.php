<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold">{{ $settings['site_name'] }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- Messages -->
        <li class="menu-item {{ request()->is('admin/messages*') ? 'active' : '' }}">
            <a href="{{ route('admin.messages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-message-dots"></i>
                <div data-i18n="Messages">Messages</div>
                @if($unopenedMessagesCount > 0)
                <div class="badge bg-primary rounded-pill ms-auto">{{ $unopenedMessagesCount }}</div>
                @endif
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Tour & Hotels">Tours & Hotels</span>
        </li>

        <!-- New Menu Item for Destinations -->
    <li class="menu-item {{ request()->is('admin/destinations*') ? 'active' : '' }}">
        <a href="{{ route('admin.destinations.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-map"></i>
            <div data-i18n="Destinations">Destinations</div>
        </a>
    </li>
    <li class="menu-item {{ request()->is('admin/types*') ? 'active' : '' }}">
        <a href="{{ route('admin.types.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-layout"></i>
            <div data-i18n="Types">Types</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('admin/amenities*') ? 'active' : '' }}">
        <a href="{{ route('admin.amenities.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-star"></i> <!-- Use an appropriate icon -->
            <div data-i18n="Amenities">Amenities</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('admin/tours*') ? 'active' : '' }}">
        <a href="{{ route('admin.tours.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-plane"></i> <!-- Use an appropriate icon -->
            <div data-i18n="Tours">Tours</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('admin/hotels*') ? 'active' : '' }}">
        <a href="{{ route('admin.hotels.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i> <!-- Use an appropriate icon for hotels -->
            <div data-i18n="Hotels">Hotels</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('admin/bookings*') ? 'active' : '' }}">
        <a href="{{ route('admin.bookings.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-calendar"></i> <!-- Icon for Bookings -->
            <div data-i18n="Bookings">Bookings</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('admin/reviews*') ? 'active' : '' }}">
        <a href="{{ route('admin.reviews.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-messages"></i> <!-- Icon for Reviews -->
            <div data-i18n="Reviews">Reviews</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text" data-i18n="Events">Events</span>
    </li>

    <li class="menu-item {{ request()->is('admin/events*') ? 'active' : '' }}">
        <a href="{{ route('admin.events.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-calendar-event"></i>
            <div data-i18n="Events">Events</div>
        </a>
    </li>

           <!-- Event Promos menu item -->
    <li class="menu-item {{ request()->is('admin/promos*') ? 'active' : '' }}">
        <a href="{{ route('admin.promos.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-flag"></i>
            <div data-i18n="Event Promos">Event Promos</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('admin/events/bookings*') ? 'active' : '' }}">
        <a href="{{ route('admin.event.bookings.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-calendar"></i> <!-- Icon for Bookings -->
            <div data-i18n="Event Bookings">Event Bookings</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text" data-i18n="Email Marketing">Email Marketing</span>
    </li>

    <li class="menu-item {{ request()->is('admin/subscribers*') ? 'active' : '' }}">
        <a href="{{ route('admin.subscribers.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-file"></i>
            <div data-i18n="Subscribers">Subscribers </div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('admin/emails*') ? 'active' : '' }}">
        <a href="{{ route('admin.emails.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-spray"></i>
            <div data-i18n="Email Campaign">Email Campaign </div>
        </a>
    </li>



        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Front Pages">Front Pages</span>
        </li>
       <!-- New Homepage Customization Menu Item -->
        <li class="menu-item {{ request()->is('admin/homepages*') ? 'active' : '' }}">
            <a href="{{ route('admin.homepages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="Homepage">Homepage </div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/galleries*') ? 'active' : '' }}">
            <a href="{{ route('admin.galleries.index') }}" class="menu-link">
                <i class="menu-icon tf-icons fas fa-images"></i>
                <div data-i18n="Gallery">Gallery</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/faqs*') ? 'active' : '' }}">
            <a href="{{ route('admin.faqs.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-help"></i>
                <div data-i18n="FAQS">FAQS</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/tour-guides*') ? 'active' : '' }}">
            <a href="{{ route('admin.tourGuides.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="Tour Guide">Tour Guide </div>
            </a>
        </li>



        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="User Management">User Management</span>
        </li>

            <!-- Users -->
    <li class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-users"></i>
            <div data-i18n="Users">Users</div>
        </a>
    </li>








        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="App Settings">App Settings</span>
        </li>

        <!-- Settings -->
        <li class="menu-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n=" "> </span>
        </li>




        </ul>
</aside>
