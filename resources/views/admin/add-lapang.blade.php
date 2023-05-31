@extends('admin.main')

@section('body')
<form enctype="multipart/form-data" method="post" action="/admin/lapang/add" class="text-center" style="background: #e5e3e3;border-radius: 40px;padding: 35px;margin-bottom: 15px;margin-top: 15px; width: 650px">
    @csrf
    <div class="row">
        <div class="col"><img class="img-fluid" src="{{ asset('images/locate1.png') }}" width="160" height="235" style="margin: -35px;"></div>
    </div>
    <div class="row">
        <div class="col" style="text-align: left;">
            <div class="row" style="font-weight: bold;">
                <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Nama</label></div>
            </div><input class="form-control-lg" type="text" style="text-align: left;" name="name">
        </div>
    </div>
    <div class="row">
        <div class="col" style="text-align: left;">
            <div class="row" style="font-weight: bold;">
                <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Tipe</label></div>
            </div>
            <select class="form-select-lg" name="category" required>
                <option value="" selected disabled>Category</option>
                    <option value="Futsal">Futsal</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Tenis">Tenis</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col" style="text-align: left;">
            <div class="row" style="font-weight: bold;">
                <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Latitude</label></div>
            </div><input class="form-control-lg" type="text" style="text-align: left;" name="lat">
        </div>
        <div class="col" style="text-align: left;">
            <div class="row" style="font-weight: bold;">
                <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Longitude</label></div>
            </div><input class="form-control-lg" type="text" style="text-align: left;" name="lng">
        </div>
    </div>
    <div class="row">
        <div class="col" style="text-align: left;">
            <div class="row" style="font-weight: bold;">
                <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Gambar</label></div>
            </div><input type="file" name="pic" class="form-control-lg">
        </div>
    </div>
    <div class="row" style="margin-top: 25px; text-align: left;">
        <div class="col"><button class="btn btn-primary" type="input" style="font-family: Inter, sans-serif;font-size: 24px;background: #00b728;color: rgb(0,0,0);">Buat</button></div>
    </div>
</form>
@endsection