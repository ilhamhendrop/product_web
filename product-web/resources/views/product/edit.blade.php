@extends('master.master')

@section('title')
    Product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <form action="{{ route('product.update', ['product' => $product]) }}" method="post">
                            {{ csrf_field() }}
                            @method('patch')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ $product->name }}" id="">
                            </div>
                            <div class="form-group mt-2">
                                <label>Klasifikasi</label>
                                <select name="clasification_id" class="form-control">
                                    <option value="{{ $product->clasification->id }}" selected>{{ $product->clasification->name }}</option>
                                    @foreach ($clasifications as $clasification)
                                        <option value="{{ $clasification->id }}">{{ $clasification->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>Harga</label>
                                <input type="number" name="price" placeholder="Harga" value="{{ $product->price }}" class="form-control"
                                    id="">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
