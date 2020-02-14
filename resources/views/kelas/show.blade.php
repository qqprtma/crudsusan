@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Kelas</div>

                <div class="card-body">
                <div class="form-group">
                <label>Kelas</label>
                <input type="text" name='kelas' value="{{$kelas->kelas}}" class="form-control" readonly>
                </div>
                <ul>
                @foreach($kelas->siswa as $data)
                <li>{{$data->nama}} - {{$data->nis}}</li>
                @endforeach
                </ul>
                <div class="form-group">
                <a href="{{ url()->previous() }}" class="btn btn-primary" readonly>Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
