@props([
    'title' => '',
    'routeBackBtn' => '',
    'titleBackBtn' => '',
    'disableBackBtn' => 'false'
])

<div class="px-2">
    <div class="flex flex-col items-center justify-between p-4 mb-4 space-y-3 text-white bg-black rounded-md dark:bg-primary-600 md:flex-row md:space-y-0">
        <h1 class="text-base font-semibold uppercase myFontSemibold animate__animated animate__fadeInLeft animate__faster">
            {{$title}}
        </h1>
        @if($disableBackBtn == 'true')
            <div class="flex ">
                <a href="{{$routeBackBtn}}" class="flex items-center px-4 py-1 space-x-2 text-white transition ease-in-out delay-75 scale-95 rounded-lg bg-primary-600 dark:bg-black dark:text-white hover:scale-100">
                    <x-icon name="arrow-left" class="w-4 h-4"/>
                    <p class="text-sm myFontRegular">Kembali ke {{$titleBackBtn}}</p>
                </a>
            </div>
        @endif
    </div>
    <div class="px-2 py-5 mb-24 bg-white border rounded-lg shadow-sm  dark:bg-slate-900 dark:border-none">
        <div class="py-4 ">
            {{$slot}}
        </div>
    </div>
</div>
