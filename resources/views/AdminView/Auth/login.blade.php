@extends('AdminView.AppLayouts.login')

@section('title', __('Login Admin'))

@section('sidebar')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-6 col-md-push-3 col-lg-push-3 text-center">
            <h1>ADL Admin Login</h1>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-6 col-lg-6 col-md-push-3 col-lg-push-3">
            <form method="POST" action="{!! route('admin.auth.login') !!}" class="form-horizontal form-login">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" autofocus placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" value="1"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-green">Sign in</button>
                    </div>
                </div>
            </form>
            <div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection