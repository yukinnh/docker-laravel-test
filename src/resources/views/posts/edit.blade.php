<x-app-layout>
    <x-slot name="header">
        記事編集
    </x-slot>
    
    <!--記事の編集フォーム-->
    <form enctype="multipart/form-data" action="/posts/{{ $article->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="title">
            <label for="published">記事タイトル</label>
            <input type="text" name=article[title] placeholder="タイトル"  value={{$article->title}}>
            <p class="title__error" style="color:red">{{ $errors->first('article.title') }}</p>
        </div>
        <div class="period_start">
            <label for="published">旅行開始日時</label>
            <input type="date" name=article[period_start] value={{$article->period_start}}>
            <p class="period_start__error" style="color:red">{{ $errors->first('article.period_start') }}</p>
        </div>
        <div class="period_end">
            <label for="published">旅行終了日時</label>
            <input type="date" name=article[period_end] value={{$article->period_end}}>
            <p class="period_end__error" style="color:red">{{ $errors->first('article.period_end') }}</p>
        </div>
        <div class="image_top">
            <label for="published">記事トップの画像</label>
            <input type="file" name=image_top value={{$article->image_top}}>
        </div>
        <div class="abstract">
            <label for="published">記事の概要</label>
            <textarea name="article[abstract]" placeholder="楽しかったです。">{{$article->abstract}}</textarea>
            <p class="abstract__error" style="color:red">{{ $errors->first('article.abstract') }}</p>
        </div>
        <button type="submit" class="ml-4 inline-flex text-gray bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
            <input type="submit" value="更新"/>
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
</x-app-layout>