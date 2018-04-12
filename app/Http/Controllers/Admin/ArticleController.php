<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\DataTables\ArticleDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use function auth;
use function dd;
use function flash;
use function request;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepository
     */
    protected $articleRepository;

    /**
     * ArticleController constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @param ArticleDataTable $dataTable
     * @return mixed
     */
    public function index(ArticleDataTable $dataTable)
    {
        return $dataTable->render('admin.article.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * @param StoreArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(StoreArticleRequest $request)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'thumb' => request('thumb'),
            'content' => request('content'),
        ];

        $this->articleRepository->create($data);

        flash('文章创建成功')->success()->important();

        return redirect()->route('admin.article.index');
    }

    /**
     * @param Article $article
     * @return $this
     */
    public function show(Article $article)
    {
        return view('admin.article.show')
            ->with('article', $article);
    }

    /**
     * @param Article $article
     * @return $this
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit')
            ->with('article', $article);
    }

    /**
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'thumb' => request('thumb'),
            'content' => request('content'),
        ];

        $this->articleRepository->update($data, $article->id);


        flash('文章信息修改成功')->success()->important();

        return redirect()->back();
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $this->articleRepository->delete($article->id);

        flash('文章删除成功')->success()->important();

        return redirect()->back();
    }
}
