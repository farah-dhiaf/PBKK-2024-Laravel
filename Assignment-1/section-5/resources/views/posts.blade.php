<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <!-- foreach looping di laravel dan akan mengambil data yang diparsing -->
    @foreach ($posts as $post )
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href="/posts/{{$post['slug']}}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{$post['title']}}</h2>

        </a>
        <div> 
            By
            <!-- <a href="#">{{$post['author']}}</a> | {{$post['created_at']->format('F d, Y')}} -->
            <a href="/authors/{{$post->author->username}}" class="text-base text-gray-500 hover:underline">{{$post->author->name}}</a>
            In
            <a href="/categories/{{$post->category->slug}}" class="text-base text-gray-500 hover:underline">{{$post->category->name}}</a> | {{$post['created_at']->diffForHumans()}}
        </div>
        <p class="my-4 font-light">
            <!-- str limit untuk membatasi kata yang ditampilkan, baca di docs laravel -->
            {{Str::limit($post['body'], 50)}}
        </p>
        <a href="/posts/{{$post['slug']}}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
    </article>
    @endforeach
    
</x-layout>
