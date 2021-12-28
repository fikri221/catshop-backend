@extends('layouts.default')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product List</strong>
                        <a href="/products/create" class="btn btn-primary float-right">Add Product</a>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Image</th>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($items as $item)
                                    <tr>
                                        <td class="serial">{{ $no++ }}</td>
                                        <td class="avatar">
                                            @foreach ($item->galleries as $gallery)
                                                <div class="round-img">
                                                    <a href="{{ $gallery->images }}"><img class="rounded-circle"
                                                            src="{{ $gallery->images }}" alt="" /></a>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td>#{{ $item->id }}</td>
                                        <td><span class="product">{{ $item->name }}</span></td>
                                        <td><span class="category">
                                                @foreach ($item->product_categories as $p_category)
                                                    {{ $p_category->category->name }}
                                                @endforeach
                                            </span></td>
                                        <td><span class="price">Rp. {{ $item->price }}</span></td>
                                        <td><span class="qty">{{ $item->qty }}</span></td>
                                        <td>
                                            <a href="/products/{{ $item->id }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-picture-o"></i>
                                            </a>
                                            <a href="/products/{{ $item->id }}/edit" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="/products/{{ $item->id }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            Data tidak tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div>
@endsection
