<?php

namespace App\Services;

use App\Models\Watch;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Filters\WatchFilter;

class WatchService
{
    public function getAllWithFilters()
    {
        return Watch::filterable(WatchFilter::class)->get();
    }

    public function getBrands()
    {
        return Brand::all();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function createWatch(array $data)
    {
        $watch = new Watch();
        $watch->name = $data['name'];
        $watch->brand_id = $data['brand_id'];
        $watch->category_id = $data['category_id'];
        $watch->price = $data['price'];

        if (!empty($data['image'])) {
            $watch->image = $data['image'];
        }

        $watch->save();
        return $watch;
    }

    public function updateWatch(array $data, $id)
    {
        $watch = Watch::findOrFail($id);

        $watch->name = $data['name'];
        $watch->brand_id = $data['brand_id'];
        $watch->category_id = $data['category_id'];
        $watch->price = $data['price'];

        if (!empty($data['image'])) {
            // حذف الصورة القديمة لو موجودة
            if ($watch->image && file_exists(public_path('images/' . $watch->image))) {
                unlink(public_path('images/' . $watch->image));
            }
            $watch->image = $data['image'];
        }

        $watch->save();
        return $watch;
    }

    public function deleteWatch($id)
    {
        $watch = Watch::findOrFail($id);

        if ($watch->image && file_exists(public_path('images/' . $watch->image))) {
            unlink(public_path('images/' . $watch->image));
        }

        $watch->delete();
    }

    public function getWatchById($id)
    {
        return Watch::findOrFail($id);
    }
}
