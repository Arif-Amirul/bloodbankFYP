@props([
    'route' => '',
    'activeUrl' => '',
    'title' => '',
    'iconName' => '',

])

<li
    class="relative hidden lg:block"
    >
    <a href="{{ $route }}"
        class="flex items-center px-4 py-2.5 text-base font-normal rounded-lg mb-2
        {{Route::current()->uri == $activeUrl || \Request::is($activeUrl) ? ' bg-gray-50  text-primary-900 dark:bg-slate-800 dark:text-primary-500' : ' hover:text-white bg-transparent text-gray-300 dark:text-white'}}
        ">

        <span class=" animate__animated animate__fadeInLeft animate__fast">
            {{$iconName}}
        </span>
        <span class="ml-3 text-sm font-medium myFontSemibold animate__animated animate__fadeInLeft animate__faster">{{$title}}</span>
    </a>
</li>


<li class="relative block lg:hidden">
    <a href="{{ $route }}"
        class="flex items-center px-4 py-2.5 text-base font-normal rounded-l-lg mb-2
        {{Route::current()->uri == $activeUrl || \Request::is($activeUrl) ? ' bg-gray-50  text-primary-900 dark:bg-slate-800 dark:text-primary-500' : ' hover:text-white bg-transparent text-gray-300 dark:text-white'}}
        ">

        <span class=" animate__animated animate__fadeInLeft animate__fast">
            {{$iconName}}
        </span>
        <span class="ml-3 text-sm font-medium myFontSemibold animate__animated animate__fadeInLeft animate__faster">{{$title}}</span>
    </a>
</li>
