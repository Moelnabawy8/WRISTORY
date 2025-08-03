@extends('layouts.app')

@section('title', 'سلة التسوق')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">🛒 سلة التسوق الخاصة بك</h2>

    @if($cartItems->count() > 0)
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>الإجمالي</th>
                    <th>إجراء</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                @foreach($cartItems as $item)
                    @php $subtotal = $item->quantity * $item->watch->price; @endphp
                    @php $total += $subtotal; @endphp

                    <tr>
                        <td>
                            <img src="{{ asset('images/' . $item->watch->image) }}" alt="{{ $item->watch->name }}" style="width: 80px;">
                        </td>
                        <td>{{ $item->watch->name }}</td>
                        <td>
                            <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex justify-content-center">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control w-50">
                                <button type="submit" class="btn btn-sm btn-success ms-2">تحديث</button>
                            </form>
                        </td>
                        <td>{{ $item->watch->price }} $</td>
                        <td>{{ $subtotal }} $</td>
                        <td>
                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">إزالة</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end me-2">
            <h4>الإجمالي: <strong>{{ $total }} $</strong></h4>
            <a href="{{ route('checkout',$item->watch) }}" class="btn btn-primary mt-3 px-5">إتمام الدفع</a>
        </div>
    @else
        <div class="alert alert-info text-center">
            سلة التسوق فارغة حالياً.
            <br>
            <a href="{{ route('watches.index') }}" class="btn btn-outline-primary mt-3">تصفح الساعات</a>
        </div>
    @endif
</div>
@endsection
