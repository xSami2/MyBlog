@props(['$trigger'])
<div>

    <div x-data="{show:false } "@click.away="show=false">
        {{--Trigger--}}
       <div @click="show=!show" >
           {{$trigger}}
       </div>
        {{--Links--}}
        <div x-show = "show" class="py-2 absolute bg-gray-100 w-32 mt-2 rounded-xl z-50 overflow-auto max-h-52">

            {{$slot}}
        </div>
    </div>
