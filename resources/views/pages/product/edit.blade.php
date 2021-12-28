@extends('layouts.default')

@section('content')
    <form action="/products/{{ $item->id }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-header">
                <strong>Edit Form</strong>
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="name" name="name" placeholder="Product Name" class="form-control"
                            value="{{ old('name') ? old('name') : $item->name }}" /><small
                            class="help-block form-text">Please enter the name of the
                            product</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9">

                        <select class="form-control" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == old('category'))
                                    selected="selected"
                            @endif
                            >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <small class="help-block form-text">Please enter the name of the
                            product</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Quantity</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="qty" name="qty" placeholder="Quantity" class="form-control"
                            value="{{ old('qty') ? old('qty') : $item->qty }}" /><small
                            class="help-block form-text">Please enter the
                            quantity</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class="form-control-label">Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="price" name="price" placeholder="Price" class="form-control"
                            value="{{ old('price') ? old('price') : $item->price }}" /><small
                            class="help-block form-text">Please enter the price in
                            IDR</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class="form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="description" id="description" rows="9" placeholder="Content..."
                            class="form-control">{{ old('description') ? old('description') : $item->description }}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-multiple-input" class="form-control-label">Images</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-multiple-input" name="images"
                            value="{{ old('images') ? old('images') : $gallery->images }}" accept="image/*" multiple=""
                            class="form-control-file" />
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </form>
@endsection
