@props(['active' => false])

@php

$classes = "block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white";
if($active) $classes = "block text-left text-white px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white bg-blue-500 ";

    @endphp
<a {{ $attributes->merge(  ['class' => $classes] )  }}>

    {{$slot}}

</a>



