<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16">
            <div class="flex w-full">
                <!-- Logo -->
                <div class="flex w-full items-center">
                    @guest
                        <a href="{{ route('visitor.article.index') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    @endauth
                    <div class="ml-auto flex">
                        @guest
                            <div>
                                <x-anchor-button route="{{ route('login') }}" title="ユーザーログイン"
                                    class="bg-indigo-500 hover:bg-indigo-600" />
                            </div>
                        @endguest
                        @auth
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    ダッシュボード
                                </x-nav-link>
                                <x-nav-link :href="route('article.index')" :active="request()->routeIs('article.index')">
                                    自分の投稿一覧
                                </x-nav-link>
                                <x-nav-link :href="route('article.create')" :active="request()->routeIs('article.create')">
                                    記事を投稿する
                                </x-nav-link>
                                <x-nav-link :href="route('logout')" :active="request()->routeIs('logout')">
                                    サインアウト
                                </x-nav-link>
                            </div>
                        @endauth
                    </div>
                </div>

            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">

        </div>
    </div>
</nav>
