<x-app-layout>
    <x-slot name="header">
        最新の投稿
    </x-slot>
    <div class='posts'>
        @foreach ($articles as $article)
            <div class='post'>
                <div class="container px-5 py-24 mx-auto flex flex-wrap">
                    <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                  <a href="/posts/{{ $article->id }}"><h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $article->title }}</h1></a>
                                  <img src="{{asset('./upload/'.$article->image_top)}}" width="100">
                                  <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $article->abstract }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class='paginate'>
        {{ $articles->links() }}
    </div>
</x-app-layout>