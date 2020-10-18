<!DOCTYPE html>
<html>

<head>
    <title>Login</title>


    @include('admin/partials/head');
</head>

<body class="hold-transition login-page">


    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Crud Laravel 7</b> Dengan Login Manual Auth</a>
        </div>

        @if ($message = Session::get('logout'))
        <div class="alert alert-success">
            {{ $message}}
        </div>
        @endif
        @if ($message = Session::get('gagal'))
        <div class="alert alert-warning">
            {{ $message}}
        </div>
        @endif
        @if ($message = Session::get('invalid'))
        <div class="alert alert-danger">
            {{ $message}}
        </div>
        @endif
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Selama Datang</p>

                <form action="{{ route('post.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                    </div>
                </form>





            </div>

        </div>
    </div>




    @include('admin/partials/script')
</body>

</html>
