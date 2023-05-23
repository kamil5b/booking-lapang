@extends('layouts.main')

@section('body')
    <header>
        <div class="container" style="margin-bottom: 40px;background: #ffffff;border-radius: 20px;">
            <h1>Receipt</h1>
            <div class="row gy-2 justify-content-center align-items-start" style="background: rgba(255,255,255,0);border-radius: 15px;">
                <div class="col-auto col-lg-5" style="text-align: left;">
                    <div class="text-start" style="background: #e5e3e3;border-radius: 40px;padding: 35px;margin-bottom: 15px;margin-top: 15px;height: 565.984px;">
                        <div class="row">
                            <div class="col">
                                <h4>Nama : {{ $name }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Tanggal Sewa : {{ $tanggal }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Jam Bermain : {{ $waktu }}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4>Durasi Sewa : {{ $durasi }} Jam</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <img class="img-fluid" src="{{ asset('/ktm/'.$ktm) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h4 class="text-center">PemesananMu telah berhasil!</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="text-center" style="background: #ffffff;border-radius: 40px;padding: 35px;">
                        <div class="row">
                            <div class="col"><img class="rounded img-fluid" src="{{ asset('/images/locate1.png') }}"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="/jadwalku">
                                    <button class="btn btn-primary" type="button" style="font-family: Inter, sans-serif;font-size: 24px;background: #00b728;color: rgb(0,0,0);">Lihat JadwalKu</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection