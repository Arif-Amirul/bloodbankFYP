<header class="w-full py-4 pr-4 border-b backdrop-blur-xl bg-white/60 dark:border-gray-600 dark:bg-black/50"
    >
    <div class="px-3 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start w-full">
                <button x-on:click="toggleSidebarMobile = !toggleSidebarMobile"
                    class="p-2 mr-2 text-white bg-black rounded cursor-pointer dark:bg-primary-600 lg:hidden">
                    <x-icon x-cloak x-show="toggleSidebarMobile == false" name="menu" class="w-5 h-5" />
                    <x-icon x-cloak x-show="toggleSidebarMobile == true" name="menu-alt-1" class="w-5 h-5" />
                </button>

                <button x-on:click="toggleSidebarDesktop = !toggleSidebarDesktop"
                    class="hidden p-2 mr-2 text-white bg-black rounded cursor-pointer lg:block dark:bg-primary-500">
                    <x-icon x-cloak x-show="toggleSidebarDesktop == false" name="menu" class="w-5 h-5" />
                    <x-icon x-cloak x-show="toggleSidebarDesktop == true" name="menu-alt-1" class="w-5 h-5" />
                </button>

                <h1 class="hidden ml-2 text-xl font-semibold myFontSemibold md:block dark:text-white">
                    <span class="text-primary-800 bg-clip-text dark:text-primary-500 ">
                        BLOOD BANK MANAGEMENT SYSTEM
                    </span>
                </h1>
            </div>

            <div class="flex items-center mr-6 space-x-6 animate__animated animate__fadeInRight">
                <div class="relative " x-data="{menuOpen:false}" x-cloak>
                    <div x-on:click="menuOpen = !menuOpen" @click.away="menuOpen = false"
                        class="flex items-center space-x-2 cursor-pointer">
                        <x-avatar md src="https://cdn-icons-png.flaticon.com/512/4034/4034229.png" />
                        <p class="dark:text-gray-400 ">{{ auth()->user()->name }}</p>
                    </div>

                    <div x-show="menuOpen"
                        class="absolute right-0 z-50 w-56 mt-2 origin-top-right bg-white border-2 border-gray-100 rounded-md shadow-lg dark:bg-gray-800 dark:border-gray-700"
                        role="menu">
                        <div>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="flex items-center px-4 py-2 text-sm font-medium text-gray-500 rounded-lg hover:bg-gray-50 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-700">
                                <x-icon name="logout" class="w-4 h-4 mr-2" />
                                <span class="text-primary-800 bg-clip-text dark:text-primary-500 ">
                                Log Out
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
