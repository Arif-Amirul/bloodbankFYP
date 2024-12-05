@extends('layouts.base')

@section('body')

<style>
    @media (min-width: 1024px) {
    .container {
        max-width: 1824px;
    }
}
</style>

<div x-data="{toggleSidebarMobile:false,toggleSidebarDesktop:true}">
    <div class="flex ">
        @include('include.sidebar')
        <div
            x-on:click="toggleSidebarMobile = !toggleSidebarMobile"
            class="fixed inset-0 z-10 bg-gray-900 opacity-50"
            x-bind:class="{ 'hidden': !toggleSidebarMobile, 'block': toggleSidebarMobile }" x-cloak>
        </div>
        <div class="w-full overflow-x-clip bg-gray-50 dark:bg-slate-800">
            @include('include.navbar')
            <main class="w-full ">
                <div class="container mx-auto md:mt-4 ">
                    <!--content-->
                    <div class="">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
