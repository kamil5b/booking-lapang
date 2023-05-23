@extends('layouts.main')

@section('body')
    
    <header>
        <div class="container" style="margin-bottom: 40px;background: #ffffff;border-radius: 20px;padding: 40px;">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Tanggal Sewa</th>
                            <th>Waktu Sewa</th>
                            <th>Durasi Sewa</th>
                            <th>Nama Lapang</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr>
                                @foreach ($row as $p)
                                    <td>{{ $p }}</td>
                                @endforeach
                                <td>
                                    <a href="/order/delete/{{ $row['id'] }}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </header>
@endsection