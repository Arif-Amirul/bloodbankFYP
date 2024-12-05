
<div :class="toggleSidebarDesktop ? 'block  z-50' : 'hidden z-50'">
    <aside
        x-cloak
        class=" flex flex-col flex-shrink-0 w-[14rem] h-full duration-75 lg:z-0 lg:flex transition-width "
        :class="toggleSidebarMobile ? 'animate__animated animate__slideInLeft' : 'hidden lg:block '">

        <div class="relative flex flex-col flex-1 min-h-0 pt-0 backdrop-blur-xl bg-gradient-to-l from-primary-900 to-primary-800 dark:from-slate-900 dark:to-slate-900">
            <a href="{{ route('home') }}" class="flex items-center justify-center mt-3 mb-4 text-xl font-bold">
                <x-logo class="w-auto h-12 text-white" />
            </a>
            <div class="flex flex-col flex-1 pt-1 pb-4 ">
                <div class="flex-1 px-3 divide-y">
                    <ul class="pt-4 pb-2 list-none">
                        <x-sidebar.nav-item
                            title="Dashboard"
                            activeUrl="home"
                            route="{{route('home')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="home" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>

                        @if(auth()->user()->role=='1')
                        <x-sidebar.nav-item
                            title="Register User"
                            activeUrl="register-user-page"
                            route="{{route('register-user-page')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="login" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>
                        @endif

                        <x-sidebar.nav-item
                            title="Add Donor"
                            activeUrl="donor-page"
                            route="{{route('donor-page')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="user" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                            title="Manage Donor"
                            activeUrl="view-donor-page"
                            route="{{route('view-donor-page')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="database" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                        title="Donation"
                        activeUrl="donation-page"
                        route="{{route('donation-page')}}"
                        >
                        <x-slot name="iconName">
                            <x-icon name="folder-add" class="w-6 h-6"/>
                        </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                        title="Manage Donation"
                        activeUrl="view-donate-page"
                        route="{{route('view-donate-page')}}"
                        >
                        <x-slot name="iconName">
                            <x-icon name="database" class="w-6 h-6"/>
                        </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                            title="Add Blood Test"
                            activeUrl="blood-test-page"
                            route="{{route('blood-test-page')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="user" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                        title="Manage Blood Test"
                        activeUrl="view-blood-test-page"
                        route="{{route('view-blood-test-page')}}"
                        >
                        <x-slot name="iconName">
                            <x-icon name="database" class="w-6 h-6"/>
                        </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                            title="Add Patient"
                            activeUrl="patient-page"
                            route="{{route('patient-page')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="user" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                            title="Manage Patient"
                            activeUrl="view-patient-page"
                            route="{{route('view-patient-page')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="database" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                            title="Blood Transfer"
                            activeUrl="blood-transfer-page"
                            route="{{route('blood-transfer-page')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="truck" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>

                        <x-sidebar.nav-item
                            title="Manage Blood Transfer"
                            activeUrl="view-blood-request-page"
                            route="{{route('view-blood-request-page')}}"
                        >
                            <x-slot name="iconName">
                                <x-icon name="database" class="w-6 h-6"/>
                            </x-slot>
                        </x-sidebar.nav-item>

                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>

