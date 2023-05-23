@extends('layouts.main')

@section('body')
    <header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 align-self-center" style="text-align: left;">
                    <div class="row">
                        <div class="col" style="--bs-primary: #7356CC;--bs-primary-rgb: 115,86,204;">
                            <h2 class="font-weight-light mb-0" style="color: #009e23;font-family: Poppins, sans-serif;font-weight: bold;font-size: 18px;">Halo, Selamat Datang</h2>
                            <h1 style="margin-top: 15px;margin-bottom: 15px;color: rgb(0,0,0);font-size: 36px;font-family: Poppins, sans-serif;font-weight: bold;">Booking Lapangan Futsal Impianmu!</h1>
                            <h2 class="font-weight-light mb-0" style="color: rgb(0,0,0);font-family: Poppins, sans-serif;font-size: 16px;">Pesan lapangan yang kalian <br>minat tanpa antri dan ribet</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto" style="text-align: center;">
                            <a href="/register" class="btn btn-primary"  style="margin: 9px;background: #7356cc;color: #ECFF17;font-size: 16px;border-radius: 6px;border-top-left-radius: 6px;border-top-right-radius: 6px;border-bottom-right-radius: 6px;border-bottom-left-radius: 6px;font-weight: bold;">Register</a>
                            <a href="/login" class="btn btn-primary"  style="margin: 10px;background: #7356cc;color: #ECFF17;font-size: 16px;border-radius: 6px;border-top-left-radius: 6px;border-top-right-radius: 6px;border-bottom-right-radius: 6px;border-bottom-left-radius: 6px;font-weight: bold;">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <img class="img-fluid d-block mx-auto mb-5" src="{{ asset('images/locate1.png') }}">
                </div>
            </div>
        </div>
    </header>
@endsection