<x-app-layout>
    <x-slot name="header">
        記事編集・新規投稿
    </x-slot>
    
    <!--記事の新規投稿ボタン-->
    <a href="/posts/create">
        <button type="button" class="ml-4 inline-flex text-gray bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
            記事の新規投稿
        </button>
    </a>
    
    <!--自分で作成した記事の表示-->
    @foreach ($articles as $article)
        <div class='post'>
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-20">
                            <a href="/posts/{{ $article->id }}"><h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $article->title }}</h1></a>
                            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $article->abstract }}</p>
                            <img src="{{asset('./upload/'.$article->image_top)}}" width="100">
                            <div class='edit'>
                                <a href="/posts/{{$article->id}}/edit">
                                    <button type="button" class="ml-4 inline-flex text-gray bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                                        記事の編集
                                    </button>
                                </a>
                                <form action="/posts/{{$article->id}}" method="POST">
                                @csrf               <!--CSRFからの保護-->
                                @method('DELETE')   <!--疑似フォームメソッド-->
                                    <button type="submit" onclick="deleteArticle({{$article->id}})" class="ml-4 inline-flex text-gray bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                                        削除
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        function deleteArticle(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？'))
            {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>
</x-app-layout>