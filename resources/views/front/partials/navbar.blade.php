<nav class="main-header__nav main-menu">
    <ul class="main-menu__list">
        @foreach ($menus as $menu)
            @if ($menu->position === 'navbar')  {{-- Check if the menu's position is navbar --}}
            @php
            // Check if the current route matches the menu link
            $isActive = request()->url() === url($menu->link) || request()->is(trim($menu->link, '/'));
            $isDropdownActive = $menu->children->contains(function($child) {
                return request()->url() === url($child->link) || request()->is(trim($child->link, '/'));
            });
        @endphp

                <li class="{{ $isActive ? 'current' : '' }} {{ $menu->children->isNotEmpty() ? 'dropdown' : '' }} ">
                    <a class="{{ request()->is($menu->link) ? : '' }}" href="{{ $menu->link }}">{{ $menu->title }}</a>
                    @if ($menu->children->isNotEmpty())
                        <ul class="sub-menu {{ request()->is($menu->link) ? : '' }}">
                            @foreach ($menu->children as $child)
                                <li class="{{ request()->is($menu->link) ?  : '' }}">
                                    <a href="{{ $child->link }}">{{ $child->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>

            @endif
        @endforeach
        @php
            $activeEvents = \App\Models\Event::where('status', 'active')->get(); // Fetch only active events
        @endphp

        @if ($activeEvents->isNotEmpty())
            <li class="dropdown">
                <a href="#">Events</a>
                <ul class="sub-menu">
                    @foreach ($activeEvents as $event)
                        <li><a href="{{ route('events.show', $event->slug) }}">{{ $event->name }}</a></li>
                    @endforeach
                </ul>
            </li>
        @endif
     </ul>
</nav>

