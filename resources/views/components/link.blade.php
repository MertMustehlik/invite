@props([
    'label' => '',
    'url' => '',
    'customClass' => 'text-dark'
])
<a href="{{$url}}" class="text-gray-800 text-hover-primary {{$customClass}}">{!! $label !!}</a>