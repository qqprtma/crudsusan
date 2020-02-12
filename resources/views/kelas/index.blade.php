@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Daftar Kelas
                <a href="{{route('kelas.create')}}"
                class= "btn btn-primary float-right">
                Tambah Data
                </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class ="table-responsive">
                         <table class="table">
                         <thead>
                         <tr>
                         <th>Nomor</th>
                         <th>Nama Kelas</th>
                         <th colspan="3">Aksi</th>
                         </tr>
                         </thead>
                         <tbody>
                        @php $no=1; @endphp
                         @foreach($kelas as $data)
                         <tr>
                         <td>{{ $no++ }}</td>
                         <td>{{$data->nama}}</td>
                         <form action="{{route('kelas.destroy', $data->id)}}" method="post">
                         @csrf
                         @method('DELETE')
                         <td>
                            <a href="{{route('kelas.show', $data->id)}}" class="btn btn-info">show</a></td>
                         <td>
                            <a href="{{route('kelas.edit', $data->id)}}" class="btn btn-success">edit</a></td>
                         <td>
                            <button type="submit" onklick="return confirm('Apakah anda yakin?');"
                            class="btn btn-danger">Delete</button></td>
                            </form>
                         </tr>
                      @endforeach
                      </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
