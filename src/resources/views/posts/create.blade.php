<x-app-layout>
    <x-slot name="header">
        新規投稿
    </x-slot>
    
    <!--記事の入力フォーム-->
    <form enctype="multipart/form-data" action="/posts" method="POST">
    @csrf
        <div class="form-group">
            <label for="title">記事タイトル</label>
            <input type="text" name="article[title]" class="form-control" placeholder="タイトル" value="{{ old('article.title') }}">
            <p class="title__error" style="color:red">{{ $errors->first('article.title') }}</p>
        </div>
        <div class="form-group">
            <label for="period_start">旅行開始日時</label>
            <input type="date" name="article[period_start]" class="form-control" value="{{ old('article.period_start') }}">
            <p class="period_start__error" style="color:red">{{ $errors->first('article.period_start') }}</p>
        </div>
        <div class="form-group">
            <label for="period_end">旅行終了日時</label>
            <input type="date" name="article[period_end]" class="form-control" value="{{ old('article.period_end') }}">
            <p class="period_end__error" style="color:red">{{ $errors->first('article.period_end') }}</p>
        </div>
        <div class="form-group">
            <label for="image_top">記事トップの画像</label>
            <input type="file" name="image_top" value={{ $article->image_top }}>
        </div>
        <div class="form-group">
            <label for="abstract">記事の概要</label>
            <textarea name="article[abstract]" class="form-control" placeholder="今日も一日お疲れ様でした。">{{ old('article.abstract') }}</textarea>
            <p class="abstract__error" style="color:red">{{ $errors->first('article.abstract') }}</p>
        </div>
        
        <!--投稿-->
        <div class="form-group">
            <label for="photo">写真を選択</label>
            <input type="file" name="photo[]" class="form-control">
        </div>
        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea name="post[comment]" class="form-control" placeholder="楽しそうですね！">{{ old('post.comment') }}</textarea>
        </div>
        <button type="button" class="ml-4 inline-flex text-gray bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
            投稿を追加
        </button>
        
        <!--保存ボタン-->
        <button type="submmit" class="ml-4 inline-flex text-gray bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
            保存
        </button>
        
    </form>
    
    <!--記事一覧に戻る-->
    <div class='footer'>
        <a href="/posts/myposts">
            <button type="button" class="ml-4 inline-flex text-gray bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                戻る
            </button>
        </a>
    </div>
    <!--
    ・Laravel開発入門の機能のとおりに投稿に対する処理を一つ実装すると、投稿を増やす（減らす）たびにデータベースにレコードを挿入するために同じページにリダイレクトしなければならないのか？
    ・同じページにリダイレクトすると、データが保存されずに消える？
    -->
    
</x-app-layout>