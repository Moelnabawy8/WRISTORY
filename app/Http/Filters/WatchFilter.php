<?php 
namespace App\Http\Filters;


use YSM\Filterable\Filterable;


class WatchFilter extends Filterable
{
    protected array $allowedFilters = [
        'brand_id', 'category_id', 'price_min', 'price_max', "price_sort", "date_sort", 'search'
    ];

    public function brand_id( $value)
    {
        if (!is_null($value) && $value !== '') {
            $this->builder->where('brand_id', $value);
        }
    }

    public function category_id($value)
    {
        if (!is_null($value) && $value !== '') {
            $this->builder->where('category_id', $value);
        }
    }

    public function price_min($value)
    {
        if (!is_null($value) && $value !== '') {
            $this->builder->where('price', '>=', $value);
        }
    }

    public function price_max($value)
    {
        if (!is_null($value) && $value !== '') {
            $this->builder->where('price', '<=', $value);
        }
    }

    public function price_sort($value)
    {
        if (!is_null($value) && $value !== '') {
            if ($value == 'low_to_high') {
                $this->builder->orderBy('price', 'asc');
            } elseif ($value == 'high_to_low') {
                $this->builder->orderBy('price', 'desc');
            }
        }
    }

    public function date_sort($value)
    {
        if (!is_null($value) && $value !== '') {
            if ($value == 'newest') {
                $this->builder->orderBy('created_at', 'desc');
            } elseif ($value == 'oldest') {
                $this->builder->orderBy('created_at', 'asc');
            }
        }
    }

    public function search($value)
    {
        if (!is_null($value) && $value !== '') {
            $this->builder->where('name', 'like', '%' . $value . '%');
        }
    }
}
?>
