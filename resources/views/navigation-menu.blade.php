@props(['edition'])

<nav x-data="{ open: false }" class="nav">
    <!-- Primary Navigation Menu -->
    <div class="primary">
        <div class="links">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ route('home') }}">
                    <x-application-mark />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="nav-links">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>

                @if (isset($edition))
                    @foreach ($edition->categories as $category)
                        <x-nav-link
                            href="{{ route('category.show', ['edition' => $edition->year, 'category' => $category->slug]) }}">
                            {{ $category->name }}
                        </x-nav-link>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="dropdowns">
            <!-- Settings Dropdown -->
            <x-dropdown>
                <x-slot name="trigger">
                    @auth
                        <button class="nav-dropdown-trigger-button">
                            <img class="nav-dropdown-trigger-image" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    @endauth

                    @guest
                        <button class="nav-dropdown-trigger-button">
                            <img class="nav-dropdown-trigger-image"
                                src="https://ui-avatars.com/api/?name=Guest&color=FFFFFF&background=111827"
                                alt="Guest" />
                        </button>
                    @endguest
                </x-slot>

                <x-slot name="content">
                    @auth
                        <!-- Account Management -->
                        <div class="nav-heading">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                        @endif

                        <div class="nav-divider"></div>

                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <!-- Team Management -->
                            <div class="nav-heading">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-dropdown-link>
                            @endcan

                            <div class="nav-divider"></div>

                            <!-- Team Switcher -->
                            <div class="nav-heading">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-switchable-team :team="$team" />
                            @endforeach

                            <div class="nav-divider"></div>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>

                    @endauth

                    @guest
                        <!-- Authentication -->
                        <x-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('login') }}">
                            {{ __('Log In') }}
                        </x-dropdown-link>
                    @endguest
                </x-slot>
            </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="nav-hamburger">
            <button @click="open = ! open" class="hamburger-button">
                <svg class="hamburger-button-image" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hamburger-closed': open, 'hamburger-open': !open }" class="hamburger-open"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hamburger-closed': !open, 'hamburger-open': open }" class="hamburger-closed"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'responsive-nav-open': open, 'responsive-nav-closed': !open }"
        class="responsive-nav-closed responsive-nav">
        <x-responsive-nav-link href="{{ route('home') }}">
            {{ __('Home') }}
        </x-responsive-nav-link>

        @if (isset($edition))
            @foreach ($edition->categories as $category)
                <x-responsive-nav-link
                    href="{{ route('category.show', ['edition' => $edition->year, 'category' => $category->slug]) }}">
                    {{ $category->name }}
                </x-responsive-nav-link>
            @endforeach
        @endif

        @auth
            <!-- Account Management -->
            <div class="nav-divider"></div>

            <div class="nav-heading">
                {{ __('Manage Account') }}
            </div>

            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-responsive-nav-link>
            @endif

            <!-- Team Management -->
            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="nav-divider"></div>

                <div class="nav-heading">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-responsive-nav-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-responsive-nav-link>
                @endcan

                <div class="nav-divider"></div>

                <!-- Team Switcher -->
                <div class="nav-heading">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                    <x-switchable-team :team="$team" component="responsive-nav-link" />
                @endforeach
            @endif

            <!-- Authentication -->
            <div class="nav-divider"></div>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>

        @endauth

        @guest
            <!-- Authentication -->
            <div class="nav-divider"></div>
            <x-responsive-nav-link href="{{ route('register') }}">
                {{ __('Register') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('login') }}">
                {{ __('Log In') }}
            </x-responsive-nav-link>
        @endguest
    </div>
</nav>
