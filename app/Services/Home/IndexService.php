<?php

namespace App\Services\Home;

use App\Repositories\{
    ArticleRepository,
    CategoryRepository,
    CommodityRepository
};

class IndexService
{
    protected $commodity, $category, $article;

    public function __construct(CommodityRepository $commodity,
                                CategoryRepository $category,
                                ArticleRepository $article)
    {
        $this->commodity = $commodity;
        $this->category = $category;
        $this->article = $article;
    }

    /**
     * 获取符合要求的商品
     *
     * @param $type
     * @param $limit
     * @return mixed
     */
    public function getByType($type, $limit)
    {
        return $this->commodity->getByType($type, $limit);
    }

    /**
     * 获取父级栏目
     * 
     * @return mixed
     */
    public function getCategoryParent()
    {
        return $this->category->getParent();
    }

    /**
     * 通过父级id获取下级
     *
     * @param $parent_id
     * @return mixed
     */
    public function getCategoryChildren($parent_id)
    {
        return $this->category->selectGet([
            ['parent_id', $parent_id],
        ], 'name', 'id');
    }

    /**
     * 获取文章条数
     *
     * @param $num
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getArticle($num)
    {
        return $this->article->get($num);
    }

    /**
     * 搜索
     *
     * @param $keyword
     * @return mixed
     */
    public function getSearch($keyword)
    {
        return $this->commodity->selectGet([
            ['name', 'like', "%$keyword%"],
        ], '*');
    }
}