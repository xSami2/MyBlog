<x-layout>
<section class="max-w-md mx-auto py-8">

    <h1 class="text-lg font-bold mb-4">       Publish New Post     </h1>

   <x-panel>
    <form  method="POST" action="/admin/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">

            <label for="title" class="block uppercase font-bold text-xs text-gray-700 p-2" >
                Title
            </label>
            <input
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="title"
                id="title"
                value="{{old('title')}}"
                required>
            @error('title')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror

            <div class="mb-6">

                <label for="title" class="block uppercase font-bold text-xs text-gray-700 p-2" >
                    Thumbnail
                </label>
                <input
                    class="border border-gray-400 p-2 w-full"
                    type="file"
                    name="thumbnail"
                    id="thumbnail"
                    value="{{old('thumbnail')}}"
                    required>
                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror

            <label for="excerpt" class="block uppercase font-bold text-xs text-gray-700 p-2" >
                Excerpt
            </label>
            <textarea
                class="border border-gray-400 p-2 w-full"
                type="text"
                name="excerpt"
                id="excerpt"
                required>{{old('excerpt')}}</textarea>
            @error('excerpt')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror

            <label for="body" class="block uppercase font-bold text-xs text-gray-700 p-2" >
                Body
            </label>
            <textarea
                class="border border-gray-400 p-3 w-full"
                type="text"
                name="body"
                id="body"
                required> {{old('body')}}</textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror

            <label for="category_id" class="block uppercase font-bold text-xs text-gray-700 p-2" >
                Category
            </label>


            <select name="category_id" id="category">

                @foreach(App\Models\Category::all() as $category)
                <option
                    value="{{$category->id}}"
                    {{old('category_id')==$category->id ? 'Selected' :"" }}
                >{{ucwords($category->name)}}</option>
                @endforeach
            </select>
            @error('body')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror




        </div>
        <x-submit-button> Publish </x-submit-button>
    </form>
   </x-panel>

    </section>
</x-layout>
