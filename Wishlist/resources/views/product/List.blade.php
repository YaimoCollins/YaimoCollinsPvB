@extends('layouts.app')

@section('content')
    <h2 style="margin-top: 12px;" class="text-center">Christmas Wishlist</h2>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ route('products.create') }}" class="btn btn-success mb-2">Add</a>
                <br>
                <div class="row">
                    <div class="col-12">

                        <table class="table table-bordered" id="laravel_crud">
                            <thead>
                            <tr>
                                <th>Titel</th>
                                <th>Prijs</th>
                                <th>Beschrijving</th>
                                <th>Created at</th>
                                <td colspan="2">Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ date('Y-m-d', strtotime($product->created_at)) }}</td>
                                    <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $products->links() !!}
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-12">

                        <table class="table table-bordered" id="laravel_crud">
                            <thead>
                            <tr>
                                <th>Titel</th>
                                <th>Prijs</th>
                                <th>Beschrijving</th>
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
            @endauth
        </div>
    @endif
@endsection