@extends('admin.main')

@section('body')
@if($page == 'lapang')
<a href="/admin/lapang/add">
<button class="btn btn-primary" type="input" style="font-family: Inter, sans-serif;font-size: 16px;background: #00b728;color: rgb(0,0,0);">Add Lapang</button>
</a>
@endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        @foreach ($headers as $h)
                                        <th>{{ $h }}</th>
                                        @endforeach
                                        @if($editable)
                                        <th>Edit</th>
                                        @endif
                                        @if($deletable)
                                        <th>Cancel</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                    <tr>
                                        @foreach ($row as $p) 
                                            <td>{{ $p }}</td>
                                        @endforeach
                                        @if($editable)
                                        <td>
                                            <a href="/admin/{{ $page }}/edit/{{ $row['id'] }}">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                        </td>
                                        @endif
                                        @if($deletable)
                                        <td>
                                            <a href="/{{ $page }}/delete/{{ $row['id'] }}">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
@endsection