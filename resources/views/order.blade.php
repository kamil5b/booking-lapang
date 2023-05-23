@extends('layouts.main')

@section('body')

    <header>
        <div class="container" style="margin-bottom: 40px;">
            <div class="row gy-2 justify-content-center align-items-start" style="background: #ffffff;border-radius: 15px;">
                <div class="col-auto">
                    <form enctype="multipart/form-data" method="post" action="/order" class="text-center" style="background: #e5e3e3;border-radius: 40px;padding: 35px;margin-bottom: 15px;margin-top: 15px;">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="lapang_id" value="{{ $id }}">
                        <div class="row">
                            <div class="col"><img class="img-fluid" src="{{ asset('images/locate1.png') }}" width="160" height="235" style="margin: -35px;"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row" style="font-weight: bold;">
                                    <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Nama</label></div>
                                </div><input class="form-control-lg" type="text" readonly value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left;">
                                <div class="row" style="font-weight: bold;">
                                    <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Tanggal Sewa</label></div>
                                </div><input class="form-control-lg" type="date" style="text-align: left;" name="tanggal">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align: left;">
                                <div class="row" style="font-weight: bold;">
                                    <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Waktu Sewa</label></div>
                                </div><input class="form-control-lg" type="time" style="text-align: left;" name="waktu">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row" style="font-weight: bold;">
                                    <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Durasi Sewa / Jam</label></div>
                                </div><input class="form-control-lg" type="number" name="durasi">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="row" style="font-weight: bold;">
                                    <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">KTM Jaminan</label></div>
                                </div><input type="file" name="ktm" class="form-control-lg">
                            </div>
                        </div>
                        
                        <div class="row" style="margin-top: 25px;">
                            <div class="col"><button class="btn btn-primary" type="input" style="font-family: Inter, sans-serif;font-size: 24px;background: #00b728;color: rgb(0,0,0);">Pesan</button></div>
                        </div>
                    </form>
                </div>
                <div class="col-auto">
                    <div class="text-center" style="background: #ffffff;border-radius: 40px;padding: 35px;">
                        <div class="row">
                            <div class="col"><img class="rounded img-fluid" src="{{ asset('images/Rectangle%2026.png') }}"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h3 style="font-size: 24px;font-family: Inter, sans-serif;">{{ $name }}</h3>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <h4 style="font-size: 20px;font-family: Inter, sans-serif;">Lapangan {{ $category }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection