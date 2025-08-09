<?php

namespace App\Http\Controllers;

use App\Services\WatchService;
use App\Http\Requests\StoreWatchRequest;
use App\Http\Requests\UpdateWatchRequest;

class WatchController extends Controller
{
    protected $watchService;

    public function __construct(WatchService $watchService)
    {
        $this->watchService = $watchService;
    }

    public function index()
    {
        $watches = $this->watchService->getAllWithFilters();
        $brands = $this->watchService->getBrands();
        $categories = $this->watchService->getCategories();

        return view('watches.index', [
            'watches' => $watches,
            'brands' => $brands,
            'categories' => $categories,
            'selectedBrand' => request('brand_id'),
            'selectedCategory' => request('category_id'),
            'selectedPrice' => request('price_sort'),
            'search' => request('search'),
            'minPrice' => request('price_min'),
            'maxPrice' => request('price_max'),
            'date_sort' => request('date_sort'),
        ]);
    }

    public function create()
    {
        $categories = $this->watchService->getCategories();
        $brands = $this->watchService->getBrands();

        return view('watches.create', compact('categories', 'brands'));
    }

    public function store(StoreWatchRequest $request)
    {
        $data = $request->validated();

        // رفع الصورة وحفظ اسمها في البيانات لو الصورة موجودة
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $this->watchService->createWatch($data);

        return redirect()->route('watches.index')->with('success', 'Watch created successfully.');
    }

    public function show(string $id)
    {
        $watch = $this->watchService->getWatchById($id);
        return view('watches.show', compact('watch'));
    }

    public function edit(string $id)
    {
        $watch = $this->watchService->getWatchById($id);
        $categories = $this->watchService->getCategories();
        $brands = $this->watchService->getBrands();

        return view("watches.edit", compact('watch', 'categories', 'brands'));
    }

    public function update(UpdateWatchRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $this->watchService->updateWatch($data, $id);

        return redirect()->route('watches.index')->with('success', 'Watch updated successfully.');
    }

    public function destroy(string $id)
    {
        $this->watchService->deleteWatch($id);
        return redirect()->route('watches.index')->with('success', 'Watch deleted successfully.');
    }
}
