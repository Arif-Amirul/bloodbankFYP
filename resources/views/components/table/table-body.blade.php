@props([
    'colspan' => '',
])

<td {{ ($colspan != '') ? 'colspan = '.$colspan : '' }} {{ $attributes->merge(['class' => 'px-6  py-2 text-xs leading-5  dark:bg-gray-900 dark:text-white']) }}>
    {{ $slot }}
</td>
