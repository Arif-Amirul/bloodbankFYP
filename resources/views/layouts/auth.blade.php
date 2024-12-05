@extends('layouts.base')

@section('body')
<div class="relative bg-center bg-no-repeat bg-cover"
    style="background-image: url(https://ghost-cms.s3.ap-south-1.amazonaws.com/2023/06/blood-donation.jpg);">
    <div class="absolute inset-0 z-0 opacity-75 bg-gradient-to-b from-primary-900 to-primary-800 dark:from-slate-900 dark:to-slate-900">
    </div>
    <div class="justify-center min-h-screen mx-0 sm:flex sm:flex-row">

        <div class="z-10 flex flex-col self-center p-10 sm:max-w-5xl xl:max-w-2xl">
            <div class="flex-col self-start hidden text-white lg:flex">
                <img src="" class="mb-3">
                <h1 class="mb-4 text-6xl font-bold">
                    <span style="font-size: 150%;">BLOOD BANK</span>
                </h1>
                <h4 class="mb-4 text-3xl font-bold">
                    <span style="font-size: 164%;">MANAGEMENT SYSTEM</span>
                </h4>
                <p class="pr-3 mr-40 text-lg"></p>
            </div>

        </div>
        <div class="z-50 flex self-center justify-center">
            @yield('content')

            @isset($slot)
                {{ $slot }}
            @endisset
        </div>
    </div>
</div>
@endsection
