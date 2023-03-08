<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Article\CreateRequest;
use App\Http\Requests\User\Article\UpdateRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('article.index', [
            'articles' => Article::where('user_id', Auth::id())->orderBy('created_at', 'desc')->with('tags')->get(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('article.create', ['tags' => Tag::all()]);
    }

    /**
     * @param CreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        /** @var int $userId */
        $userId = Auth::id();
        /** @var string $title */
        $title = $request->title;
        /** @var string $content */
        $content = $request->content;
        /** @var array $tags */
        $tags = $request->tags;

        $this->article->storeArticle($userId, $title, $content, $tags);

        return to_route('article.index');
    }

    /**
     * @param \App\Models\Article $article
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article::where('id', $article->id)->with('tags')->first()]);
    }

    /**
     * @param \App\Models\Article $article
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article::where('id', $article->id)->with('tags')->first(), 'tags' => Tag::all()]);
    }

    /**
     * @param UpdateRequest $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Article $article)
    {
        /** @var string $title */
        $title = $request->title;
        /** @var string $content */
        $content = $request->content;
        /** @var array $tags */
        $tags = $request->tags;

        $this->article->updateArticle($title, $content, $article->id, $tags);
        return to_route('article.index');
    }

    /**
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $this->article->destroyArticle($article);
        return to_route('article.index');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function getVisitorIndex()
    {
        return view('article.index', ['articles' => Article::with(['user', 'tags'])->orderBy('created_at', 'desc')->paginate(20)]);
    }

    /**
     * @param \App\Models\Article $article
     * @return \Illuminate\Contracts\View\View
     */
    public function getVisitorShow(Article $article)
    {
        return view('article.show', ['article' => $article::with(['tags', 'user'])->where('id', $article->id)->first()]);
    }
}
