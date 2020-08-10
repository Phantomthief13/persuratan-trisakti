<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <!--CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    </head>
    <body class="bg-info">
        <div class="container mx-auto mt-5">
            <br>
            <br><br>
            <div class="row">
                <div class="col-8">
                    <center style="font-family: 'Anton', sans-serif;">
                        <img src="/img/trisakti.png" width="150" height="150" alt="">
                        <div style="font-size: 60px">APLIKASI PERSURATAN</div>
                        <div style="font-size: 40px">UNIVERSITAS TRISAKTI</div>
                        <div style="font-size: 16px">Jl. Kyai Tapa No.1, RT.6/RW.16, Grogol, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11440</div>
                    </center>
                </div>
                <div class="col-4">
                    <div class="card">
                    <h5 class="card-header">LOGIN</h5>
                    <div class="card-body">
                    <hr>
                                @if(\Session::has('alert'))
                                    <div class="alert alert-danger">
                                        <div>{{Session::get('alert')}}</div>
                                    </div>
                                @endif
                                @if(\Session::has('alert-success'))
                                    <div class="alert alert-success">
                                        <div>{{Session::get('alert-success')}}</div>
                                    </div>
                                @endif
                        <form method="post" action="/login/LoginPost">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="nip" id="username" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Isi username dengan NIP yang sudah didaftarkan</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
