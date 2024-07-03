@extends('master.master')

@section('title')
    Klasifikasi
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
                                Add Klasifikasi
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" border="1" id="clasificationTable">
                                <thead>
                                    <tr>
                                        <th class="card-title text-center">No</th>
                                        <th class="card-title text-center">Nama</th>
                                        <th class="card-title text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($clasifications as $clasification)
                                        <tr>
                                            <td class="card-text text-center">{{ $no++ }}</td>
                                            <td class="card-text text-center">{{ $clasification->name }}</td>
                                            <td class="card-text text-center">
                                                <div class="d-grid gap-2 d-md-flex align-items-auto">
                                                    <a type="button" class="btn btn-success btn-sm"
                                                        href="{{ route('clasification.edit', ['clasification' => $clasification]) }}">Edit</a>
                                                    <form
                                                        action="{{ route('clasification.delete', ['clasification' => $clasification]) }}"
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
    @include('master.modal.modal_clasification')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#clasificationTable').DataTable()
        })
    </script>
@endsection
