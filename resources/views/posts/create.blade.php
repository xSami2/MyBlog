<x-layout>
<section class="max-w-md mx-auto py-8">

    <h1 class="text-lg font-bold mb-4">       Publish New Post     </h1>

   <x-panel>
    <form  method="POST" action="/admin/posts" enctype="multipart/form-data">
        @csrf

        <x-form.input name="title"/>{{-- form/input.blade.php  --}}
        <x-form.input name="thumbnail" type="file"/>
        <x-form.textarea name="execrpt"/>
        <x-form.textarea name="body"/>




         <x-form.field>

            <x-form.label name="category"/>

             <select name="category_id" id="category">

                 @foreach(App\Models\Category::all() as $category)
                     <option
                         value="{{$category->id}}"
                         {{old('category_id')==$category->id ? 'Selected' :"" }}
                     >{{ucwords($category->name)}}</option>
                 @endforeach
             </select>

               <x-form.error name="category"/>

         </x-form.field>




        <x-form.button> Publish </x-form.button>
    </form>
   </x-panel>

    </section>
</x-layout>
