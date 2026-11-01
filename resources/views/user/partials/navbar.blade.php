<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
      <ul class="menu-inner">
        <!-- Dashboards -->




        <li class="menu-item {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">

            <a href="{{ route('user.dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-smart-home"></i>
              <div data-i18n="Dashboards">Dashboards</div>
            </a>

          </li>

          <li class="menu-item {{ request()->routeIs('user.tickets.*') ? 'active' : '' }}">
            <a href="{{ route('user.tickets.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-ticket"></i>
                <div data-i18n="Tickets">Tickets</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('user.bookings.*') ? 'active' : '' }}">
            <a href="{{ route('user.bookings.list') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-bookmark"></i>
                <div data-i18n="Bookings">My Bookings</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('user.event.bookings.*') ? 'active' : '' }}">
            <a href="{{ route('user.event.bookings.list') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-bookmark"></i>
                <div data-i18n="Event Bookings">My Event Bookings</div>
            </a>
        </li>


      


      </ul>
    </div>
  </aside>
