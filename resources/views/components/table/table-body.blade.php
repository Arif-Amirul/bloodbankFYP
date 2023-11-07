@props([
    'colspan' => '',
])

<td {{ ($colspan != '') ? 'colspan = '.$colspan : '' }} {{ $attributes->merge(['class' => 'px-6  py-3 whitespace-normal  text-xs leading-5  dark:bg-gray-900 dark:text-white']) }}>
    {{ $slot }}
</td>
