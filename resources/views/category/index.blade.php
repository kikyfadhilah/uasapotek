@extends('layout.sbadmin')
@section('content')



<div class="container-fluid mt-4">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a href="{{ route('category.create') }}" class="btn btn-primary btn-lg">Tambah Kategori</a>
    <br><br>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            @foreach ($category as $d)
            <tr>
                <td>{{$i}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->deskripsi}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('category.edit',$d->id) }}" class="btn btn-warning">Edit</a>&nbsp&nbsp
                    <form method="post" action="{{route('category.destroy', $d->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-lg"
                            onclick="if(!confirm('Are you sure you want to delete this category?')){return false;}">Delete</button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
