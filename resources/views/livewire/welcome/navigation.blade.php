<nav class="">


        <x-nav-link :href="route('login')" :active="request()->routeIs('login')"
                    wire:navigate>
            {{ __('Login') }}
        </x-nav-link>

            <x-nav-link :href="route('register')" :active="request()->routeIs('register')"
                        wire:navigate>
                {{ __('Register') }}
            </x-nav-link>
</nav>
