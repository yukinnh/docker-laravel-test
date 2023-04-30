<x-app-layout>
    <!--記事TOP-->
    <h2 class='title'>
        {{ $article->title }}
    </h2>
    <div class='content'>
        <h3>旅行開始日時</h3>
        <p class='period_start'>
            <span>{{ $article->period_start }}</span>
        </p>
        <h3>旅行終了日時</h3>
        <p class='period_end'>{{ $article->period_end }}</p>
        <div class='image_top'>
            <img src="{{asset('./upload/'.$article->image_top)}}" width="100">
        </div>
        <h3>記事の概要</h3>
        <p class='abstract'>{{ $article->abstract }}</p>
        <h3>作成日時</h3>
        <p class='created_at'>{{ $article->created_at }}</p>
        <h3>更新日時</h3>
        <p class='updated_at'>{{ $article->updated_at }}</p>
    </div>
    
    <!--投稿部分の表示-->
    <div class='posts'>
    <h3>投稿</h3>
            <p class='image'>
                <img src="{{asset('./upload_posts/'.$posts->image)}}" width="100">
            </p>
            <h3>コメント</h3>
            <div class='comments'>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $posts->comment }}</p>
            </div>
    </div>
    
    <!--記事一覧に戻る-->
    <div class='footer'>
        <a href="/posts/myposts">
            <button type="button" class="ml-4 inline-flex text-gray bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                戻る
            </button>
        </a>
    </div>
</x-app-layout>