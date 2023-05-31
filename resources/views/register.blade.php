@extends('layouts.main')

@section('body')

    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-4 align-self-center m-auto" style="text-align: left;">
                    <form method="post" action="/register" style="background: #7dff99;padding: 25px;border-radius: 15px;">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <h5 style="font-size: 18px;font-family: Poppins, sans-serif;text-align: center;color: #ff0000;font-weight: bold;">Silahkan Registrasi</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col"><label class="form-label" style="font-size: 12px;font-family: Poppins, sans-serif;">Nama Lengkap</label>
                                <input class="form-control" type="text" required="" name="name" ></div>
                        </div>
                        <div class="row">
                            <div class="col"><label class="form-label" style="font-size: 12px;font-family: Poppins, sans-serif;">Email</label>
                                <input class="form-control" type="text" inputmode="email" required="" name="email"></div>
                        </div>
                        <div class="row">
                            <div class="col"><label class="form-label" style="font-size: 12px;font-family: Poppins, sans-serif;">NIM</label>
                                <input class="form-control" type="text" inputmode="tel" required="" name="nim"></div>
                        </div>
                        <div class="row">
                            <div class="col"><label class="form-label" style="font-size: 12px;font-family: Poppins, sans-serif;">Password</label>
                                <input class="form-control" type="password" required="" name="password"></div>
                        </div>
                        <div class="row">
                            <div class="col"><label class="form-label" style="font-size: 12px;font-family: Poppins, sans-serif;">Konfirmasi Password</label>
                                <input class="form-control" type="password" required="" name="pass2"></div>
                        </div>
                        <div class="row" style="margin-top: 25px;">
                            <div class="col text-center">
                                <input class="btn btn-primary" type="submit" style="color: #ecff17;background: #7356cc;font-family: Poppins, sans-serif;font-weight: bold;"></div>
                        </div>
                    </form>
                </div>
                <div class="col-auto m-auto"><img class="img-fluid d-block mx-auto mb-5" src="{{ asset('images/clipboard-image.png') }}"></div>
            </div>
        </div>
    </header>
@endsection