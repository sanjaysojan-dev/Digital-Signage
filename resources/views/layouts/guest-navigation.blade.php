<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('wiki') }}">
                        <!--x-application-logo class="block h-10 w-auto fill-current text-gray-600"/-->
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('wiki')" :active="request()->routeIs('wiki')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('documentation')" :active="request()->routeIs('documentation')">
                        {{ __('Documentation') }}
                    </x-nav-link>

                    <x-nav-link href="https://github.com/sanjaysojan-dev/Digital-Signage-Scripts.git">
                        {{ __('Github') }}
                    </x-nav-link>

                    <x-nav-link :href="route('userDisplays')" :active="request()->routeIs('userDisplays')">
                        {{ __('Content Management') }}
                    </x-nav-link>

                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Register') }}
                    </x-nav-link>

                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('wiki')" :active="request()->routeIs('wiki')">
                    {{ __('Documentation') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>
</nav>
