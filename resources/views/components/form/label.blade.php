@props(['name'])


<label
    for="{{$name}}"
    class="block uppercase font-bold text-xs text-gray-700 p-2"
>


    {{  ucwords($name) }}

</label>
