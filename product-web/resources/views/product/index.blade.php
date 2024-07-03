@extends('master.master')

@section('title')
    Produk
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add Product
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" border="1" id="productTable">
                                <thead>
                                    <tr>
                                        <th class="card-title text-center">No</th>
                                        <th class="card-title text-center">Nama</th>
                                        <th class="card-title text-center">Klasifikasi</th>
                                        <th class="card-title text-center">Harga</th>
                                        <th class="card-title text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="card-text text-center">{{ $no++ }}</td>
                                            <td class="card-text text-center">{{ $product->name }}</td>
                                            <td class="card-text text-center">{{ $product->clasification->name }}</td>
                                            <td class="card-text text-center">Rp {{ $product->price }}</td>
                                            <td class="card-text text-center">
                                                <div class="d-grid gap-2 d-md-flex align-items-auto">
                                                    <a type="button" class="btn btn-success btn-sm"
                                                        href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                                                    <form action="{{ route('product.delete', ['product' => $product]) }}"
                                                        method="post">
                                                        {{ csrf_field() }}
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('master.modal.modal_product')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable()
        })
    </script>
@endsection
