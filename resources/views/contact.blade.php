@extends('layouts.main')

@section('body')
    <header>
        <div class="container" style="margin-bottom: 40px;background: #ffffff;border-radius: 20px;padding: 40px;max-width: 900px;">
            <h1 style="text-align: center;">Contact</h1>
            <div class="row">
                <div class="col-3">
                    <h2>Alamat</h2>
                </div>
                <div class="col">
                    <h2>: Jl. Sukasuka no 18</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <h2>No. Telepon</h2>
                </div>
                <div class="col">
                    <h2>: 022-7123456</h2>
                </div>
            </div>
            <form method="post" action="/feedback">
                @csrf
                <div class="row" style="padding-top: 30px;margin-bottom: -10px;">
                    <div class="col-3">
                        <h2>Feedback</h2>
                    </div>
                    <div class="col"><textarea name="feedback" class="form-control-lg" style="height: 175px;max-width: 345px;width: 260px;"></textarea></div>
                </div>
                <div class="row" style="padding-top: 30px;">
                    <div class="col offset-sm-3"><button class="btn btn-primary" type="submit" style="background: #00b728;">Kirim</button></div>
                </div>
            </form>
        </div>
    </header>
@endsection