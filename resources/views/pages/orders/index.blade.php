@extends('layouts.default')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product List</strong>
                        {{-- <a href="/products/create" class="btn btn-primary float-right">Add Product</a> --}}
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Total Order</th>
                                    <th>Order Status</th>
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
                                        <td><span>{{ $item->name }}</span></td>
                                        <td><span>{{ $item->email }}</span></td>
                                        <td><span>{{ $item->phone_number }}</span></td>
                                        <td><span>{{ $item->address }}</span></td>
                                        <td><span>{{ $item->order_total }}</span></td>
                                        <td><span @if ($item->order_status == 'pending')
                                                class="badge badge-warning"
                                            @elseif ($item->order_status == 'success')
                                                class="badge badge-success"
                                            @elseif ($item->order_status == 'failed')
                                                class="badge badge-danger"
                                            @endif >
                                                {{ $item->order_status }}</span>
                                </td>
                                <td>
                                    <a href="/orders/{{ $item->id }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-picture-o"></i>
                                    </a>
                                    <a href="/orders/{{ $item->id }}/edit" class="btn btn-success btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="/orders/{{ $item->id }}" method="POST" class="d-inline">
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
                                    <td class="text-center">
                                        <span>Data tidak tersedia.</span>
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
