@extends('layouts.app')

@section('content')
    <h2>Your Cart</h2>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                    </td>
                    <td>
                        <form action="{{ route('cart.update', $item->id) }}">
                            <input type="number" name="quantity" value="{{$item->quantity}}" min="1" max="999">
                            <input type="submit" value="Update">
                        </form>
                    </td>
                    <td><a href="{{ route('cart.destroy', $item->id) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total Price: ${{ \Cart::session(auth()->id())->getTotal() }}</h3>
    <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to checkout</a>
@endsection