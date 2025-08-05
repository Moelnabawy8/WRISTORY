<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Watch;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Filters\WatchFilter;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // filter using package using YSM\Filterable\Filterable
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();
       
        $watches = Watch::filterable(WatchFilter::class)->get();
        
        $selectedBrand = request('brand_id');
        $selectedCategory = request('category_id');
        $selectedPrice = request('price_sort');
        $search = request('search');
        $minPrice = request('price_min');
        $maxPrice = request('price_max');
        $date_sort = request('date_sort');

        return view('watches.index', compact(
            'watches',
            'brands',
            'categories',
            'selectedBrand',
            'selectedCategory',
            'selectedPrice',
            'search',
            'minPrice',
            'maxPrice',
            'date_sort'
        ));
    }
    // filter without using package


    // public function index(Request $request)
    // {
    //     $brandId = $request->input('brand_id');
    //     $categoryId = $request->input('category_id');
    //     $pricesort=$request->input('price_sort');
    //     $search = $request->input('search');
    //     $minPrice = $request->input('min_price');
    //     $maxPrice = $request->input('max_price');
    //     $date_sort=$request->input('date_sort');

    //    $watches= Watch::query();
    //     if ($brandId) {
    //         $watches->where('brand_id', $brandId);
    //     }
    //     if ($categoryId) {
    //         $watches->where('category_id', $categoryId);
    //     }
    //     if ($pricesort) {
    //         if ($pricesort == 'low_to_high') {
    //             $watches->orderBy('price', 'asc');
    //         } elseif ($pricesort == 'high_to_low') {
    //             $watches->orderBy('price', 'desc');
    //         }
    //     } else {
    //         $watches->orderBy('created_at', 'desc'); 
    //     }
    //     if($search) {
    //         $watches->where('name', 'like', '%' . $search . '%');
    //     }
    //     if ($minPrice) {
    //         $watches->where('price', '>=', $minPrice);
    //     }
    //     if ($maxPrice) {
    //         $watches->where('price', '<=', $maxPrice);
    //     }
    //     if ($date_sort) {
    //         if ($date_sort == 'newest') {
    //             $watches->orderBy('created_at', 'desc');
    //         } elseif ($date_sort == 'oldest') {
    //             $watches->orderBy('created_at', 'asc');
    //         }
    //     }
    //     return view('watches.index',[
    //         'watches' => $watches->get(),
    //         'brands' => Brand::all(),
    //         'categories' => Category::all(),
    //         'selectedBrand' => $brandId,
    //         'selectedCategory' => $categoryId,
    //         'selectedPrice' => $pricesort,
    //         'search' => $search,
    //         "minPrice" => $minPrice,
    //         "maxPrice" => $maxPrice,
    //         'date_sort' => $date_sort,
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('watches.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $watch = new Watch();
        $watch->name = $request->name;
        $watch->brand_id = $request->brand_id;
        $watch->category_id = $request->category_id;
        $watch->price = $request->price;


        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $watch->image = $imageName;
        }

        $watch->save();

        return redirect()->route('watches.index')->with('success', 'watches created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $watch = Watch::findOrFail($id);
        return view('watches.show', compact('watch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $watch = Watch::FindOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view("watches.edit", compact('watch', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $watch = Watch::findOrFail($id);

        $watch->name = $request->name;
        $watch->brand_id = $request->brand_id;
        $watch->category_id = $request->category_id;
        $watch->price = $request->price;

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا موجودة
            if ($watch->image && file_exists(public_path('images/' . $watch->image))) {
                unlink(public_path('images/' . $watch->image));
            }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);

            $watch->image = $imageName;
        }


        $watch->save();

        return redirect()->route('watches.index')->with('success', 'Watch updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $watch = Watch::findOrFail($id);

        if ($watch->image && file_exists(public_path('images/' . $watch->image))) {
            unlink(public_path('images/' . $watch->image));
        }

        $watch->delete();

        return redirect()->route('watches.index')->with('success', 'Watch deleted successfully.');
    }
}
