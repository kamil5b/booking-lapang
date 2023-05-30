@extends('layouts.main')

@section('body')

    <header>
        <div class="container" style="margin-bottom: 40px;">
            <div class="row gx-5 gy-4 row-cols-2 justify-content-center align-items-center">
                @foreach ($data as $row)
                    <div class="col-auto">
                        <div class="text-center" style="background: #ffffff;border-radius: 40px;padding: 35px;">
                            <div class="row">
                                <div class="col">
                                    <?php $pic = 'pic/'.$row['pic']; 
                                        if($row['pic'] == ""){
                                            $pic = 'images/Rectangle%2026.png';
                                        }
                                    ?>
                                    <img class="rounded img-fluid" src="{{ asset($pic) }}" style="max-height: 150px">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h3 style="font-size: 24px;font-family: Inter, sans-serif;">{{ $row['name'] }}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <a href="/order/{{ $row['id'] }}">
                                        <button class="btn btn-primary" type="button" style="font-family: Inter, sans-serif;font-size: 24px;background: #00b728;color: rgb(0,0,0);">Booking</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </header>
@endsection