<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('목록리스트') }}
        </h2>
    </x-slot>
	<div class="container m-10">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <h1>게시글 리스트</h1>
        @auth
        {{-- 로그인한 사용자가 아니면 스킵 auth --}}
            <a href="/posts/create" class="btn btn-primary">
            게시글 작성
            </a>
        @endauth

        <ul class="list-group mt-3">
            @foreach($posts as $post)
            <li class="list-group-item">
                <span>
                    <a href="{{ route('post.show',
                    ['id'=>$post->id, 'page'=>$posts->currentPage()])}}">
                    Title : {{ $post->title }}
                    </a>
                </span>

                {{-- <div>
                    Content : {{ $post->content }}
                </div> --}}

                <span>written on {{ $post->created_at->diffForHumans() }}
                    {{ $post->count }}
                    {{-- {{ $post->viewers->count() }} --}}
                    {{ $post->count > 0 ? Str::plural('view', $post->count) : 'view' }}
                    {{-- {{ $post->viewers->count() > 0 ? Str::plural('view', $post->viewers->count()) : 'view' }} --}}
                </span>
                <hr>
            </li>
            @endforeach
            </ul>
            <div class="mt-5">
                {{ $posts->links() }}
            </div>
    </div>
</x-app-layout>
