@auth()
    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments"  >

            @csrf
            <header class="flex items-center  ">

                <img src="https://i.pravatar.cc/60?u{{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">

                <h2 class="ml-3 "> Want To Comment</h2>

            </header>

            <div class="mt-7 ">

                                <textarea
                                    name="body"
                                    class="w-full text-sm focus:outline-none focus:ring"
                                    rows="5"
                                    placeholder=" Quick Think of Something to say"
                                    required></textarea>

                @error('body')
                <span class="text-xs text-red-500 font-bold"> {{$message}}</span>
                @enderror

            </div>
            <x-form.button> Submit </x-form.button>
        </form>
    </x-panel>

@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register </a> Or <a href="/login" class="hover:underline">Log in </a> To Comment
    </p>
@endauth
