@extends('layout')

@section('content')
    @foreach($posts as $post)

        <article>

            <h1>
                <a href="/posts/{{$post->slug}}">
                {{$post->title}}

            </h1>
            <p>
                <a href="/categories/{{$post->category->slug}}">  {{ $post->category->name }}  </a>
            </p>
            </a>
            <div>
                {{$post->excerpt}}
            </div>
        </article>

    @endforeach



@endsection
