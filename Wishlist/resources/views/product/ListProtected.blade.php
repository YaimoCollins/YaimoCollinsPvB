@extends('product.layout')

@section('content')
    <br>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="row">
        <div class="col-12">

            <table class="table table-bordered" id="laravel_crud">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Product Code</th>
                    <th>Description</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $products->links() !!}
        </div>
    </div>
@endsection