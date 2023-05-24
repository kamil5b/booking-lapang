@extends('admin.main')

@section('body')
<form method="post" action="/admin/lapang/edit" class="text-center" style="background: #e5e3e3;border-radius: 40px;padding: 35px;margin-bottom: 15px;margin-top: 15px;">
    @csrf
    <input type="hidden" name="id" value={{ $id }}>
    <div class="row">
        <div class="col"><img class="img-fluid" src="{{ asset('images/locate1.png') }}" width="160" height="235" style="margin: -35px;"></div>
    </div>
    <div class="row">
        <div class="col" style="text-align: left;">
            <div class="row" style="font-weight: bold;">
                <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Nama</label></div>
            </div><input class="form-control-lg" type="text" style="text-align: left;" name="name" value="{{ $name }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row" style="font-weight: bold;">
                <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Tipe</label></div>
            </div>
            <select class="form-select-lg" name="category" required>
                <option value="{{ $category }}" selected disabled>{{ $category }}</option>
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
            </div><input class="form-control-lg" type="text" style="text-align: left;" name="lat" value="{{ $lat }}">
        </div>
        <div class="col" style="text-align: left;">
            <div class="row" style="font-weight: bold;">
                <div class="col text-start"><label class="col-form-label" style="font-size: 24px;font-family: Inter, sans-serif;">Longitude</label></div>
            </div><input class="form-control-lg" type="text" style="text-align: left;" name="lng" value="{{ $lng }}">
        </div>
    </div>
    <div class="row" style="margin-top: 25px;">
        <div class="col"><button class="btn btn-primary" type="input" style="font-family: Inter, sans-serif;font-size: 24px;background: #00b728;color: rgb(0,0,0);">Buat</button></div>
    </div>
</form>
@endsection