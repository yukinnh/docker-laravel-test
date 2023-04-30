<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Auth; // 認証モデル
use App\Models\User; //ユーザ情報
use App\Http\Requests\BlogRequest;


class ArticlesController extends Controller
{
    //TOPページ表示
    public function top(Article $article){
        // top.blade.phpに取得したデータを渡す
        return view('posts/top')->with([
            'articles' => $article->getPaginateByLimit(1)
        ]);
    }
    
    //記事の保存
    public function store(BlogRequest $request, Article $article)
    {
        //記事トップ画像の保存処理
        $file = $request->file('image_top');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();
            $move = $file->move('./upload', $filename);
        }else{
            $filename = "";
        }
        
        //記事の保存処理
        $input = $request['article'];
        $article->fill($input);
        $article->user_id = auth()->user()->id;
        $article->image_top = $filename;
        $article->save();
        
        return redirect('/posts/' . $article->id);
    }
    
    //記事の新規投稿
    public function create(Tag $tag, Post $post, Article $article)
    {
        return view('posts/create')->with([
            //'tags' => $tag->get(),
            'posts' => $post,
            'article' => $article
        ]);
    }
    
    //自分が投稿した記事の編集・記事の新規投稿
    public function myposts(Article $article)
    {
        return view('posts/myposts')->with([
            'articles' => $article->getPaginateOnlyLoginUserByLimit(5, Auth::id())
        ]); 
    }
    
    //記事の投稿の追加
    public function addPost(BlogRequest $request, $travel_id)
    {
        $add = new Post;
        $add->id = $travel_id;
        $add->image = $request->image;
        $add->comment = $request->comment;
        $add->save();
    }
    
    //記事の閲覧
    public function show(Article $article, Post $post)
    {
        //'article'はbladeファイルで使う変数
        return view('posts/show')->with([
            'article' => $article,
            'posts' => $post
        ]);
    }
    
    //記事の編集
    public function edit(Article $article)
    {
        return view('posts/edit')->with(['article' => $article]);
    }
    
    
    //更新
    public function update(BlogRequest $request, Article $article){
        
        //記事トップ画像の保存処理
        $file = $request->file('image_top');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();
            $move = $file->move('./upload',$filename);
        }else{
            $filename = "";
        }
        
        //記事の更新処理
        $input_article = $request['article'];
        $article->fill($input_article);
        $article->user_id = auth()->user()->id;
        $article->image_top = $filename;
        $article->save();
        return redirect('posts/'. $article->id);
    }
    
    //記事の削除
    public function delete(Article $article)
    {
        $article->delete();
        return redirect('posts/myposts');
    }
}
