@extends('master.master')

@section('title')
Klasifikasi
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4 mb-4">
                <div class="card-body">
                    <form action="{{ route('clasification.update', ['clasification' => $clasification]) }}" method="post">
                        {{ csrf_field() }}
                        @method('patch')
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $clasification->name }}" id="">
                        </div>
                        <button class="btn btn-primary btn-sm mt-2" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

