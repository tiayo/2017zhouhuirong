<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\IndexService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $index;

    public function __construct(IndexService $index)
    {
        $this->index = $index;
    }

    public function index()
    {
        //商品
        $commodities_1 = $this->index->getByType(1, 3);
        $commodities_2 = $this->index->getByType(1, 3);

        //顶级栏目
        $parent_ctegory = $this->index->getCategoryParent();

        //获取文章
        $articles = $this->index->getArticle(6);

        return view('home.index.index', [
            'commodities_1' => $commodities_1,
            'commodities_2' => $commodities_2,
            'parent_ctegory' => $parent_ctegory,
            'articles' => $articles,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');

        $commodities = $this->index->getSearch($keyword);

        return view('home.index.search', [
            'commodities' => $commodities,
        ]);
    }
}