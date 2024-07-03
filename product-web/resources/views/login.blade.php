@extends('master.login')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card mt-5 justify-content-center">
                    <div class="card-header">
                        <h5 class="text-center card-title">Login</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan Email" id="">
                            </div>
                            <div class="form-group mt-2">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Password" id="">
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button class="btn btn-primary mt-2" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
