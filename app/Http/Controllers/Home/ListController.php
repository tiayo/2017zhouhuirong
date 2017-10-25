<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Repositories\CommodityRepository;
use App\Services\Home\IndexService;
use App\Services\Manage\CategoryService;

class ListController extends Controller
{
    protected $commodity, $category, $index;

    public function __construct(CommodityRepository $commodity, CategoryService $category, IndexService $index)
    {
        $this->commodity = $commodity;
        $this->category = $category;
        $this->index = $index;
    }

    public function view($category_id)
    {
        $category = $this->category->first($category_id);

        //分类下所有商品（一级）
        $comodities = $this->commodity->selectGet([['category_id', $category_id]], '*')->toarray();

        //分类下所有商品（二级）
        foreach ($this->index->getCategoryChildren($category_id) as $catogory_child) {
            $data = $this->commodity->selectGet([
                ['category_id', $catogory_child['id']]
            ], '*')->toarray();
            $comodities = array_merge($data, $comodities);
        }

        return view('home.list.list', [
            'category' => $category,
            'comodities' => $comodities,
            'category_id' => $category_id,
        ]);
    }
}