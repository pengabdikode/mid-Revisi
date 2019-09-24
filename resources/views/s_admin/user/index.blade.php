@extends('layouts.s_admin.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data User
                </div>
                <div class="card-body">
                        <p><a href="{{route('user.create')}}" class="btn btn-sm btn-success">Tambah Admin</a></p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">E-mail</th>
                            <th scope="col">Name</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            {{-- @foreach ($item->roles == 'admin') --}}
                            <tr>
                                <td>{{$item->email}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->roles}}</td>
                                {{-- <td><a href="{{route('kategori.edit',['id'=>$item->id])}}" class="btn btn-sm btn-success">Update Kategori</a> --}}
                                    <td><form action="{{route('user.destroy',['id'=>$item->id])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete">
                                            <input type="submit" class="btn btn-danger btn-sm" value="Hapus User">
                                    </form>
                                    </td>
                                {{-- </td> --}}
                                </tr>
                            {{-- @endforeach --}}
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
