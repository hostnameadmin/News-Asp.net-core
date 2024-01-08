<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Services;

class Menu
{
    public function compose(View $view)
    {
        $categories = Category::where('status', 1)->orderBy('priority', 'asc')->get();
        $menu = [];
        $menu['category'] = [];
        if ($categories) {
            foreach ($categories as $category) {
                $catArray = [
                    'name' => $category->name,
                    'id'   => $category->id,
                    'icon' => $category->icon,
                    'subcategory' => []
                ];
                $subcategories = Subcategory::where('id_category', $category->id)
                    ->where('status', 1)->get();
                if ($subcategories) {
                    foreach ($subcategories as $subcategory) {
                        $subcatArray = [
                            'name' => $subcategory->name,
                            'id'   => $subcategory->id,
                            'service' => []
                        ];
                        $services = Services::where('id_subcategory', $subcategory->id)
                            ->where('status', 1)->get();
                        if ($services) {
                            foreach ($services as $service) {
                                $subcatArray['service'][] = [
                                    'name' => $service->name,
                                    'id'   => $service->id,
                                ];
                            }
                        }
                        $catArray['subcategory'][] = $subcatArray;
                    }
                }
                $menu['category'][] = $catArray;
            }
        }
        $view->with('menu', $menu);
    }
}
