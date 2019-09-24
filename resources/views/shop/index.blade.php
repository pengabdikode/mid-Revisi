@extends('layouts.pembeli.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h4><b>Pilih Kategori</b></h4>
                </a>
                @foreach ($kategori as $item)
                    <a href="{{route('kategori.barang',['id'=>$item->id])}}" class="list-group-item list-group-item-action {{ Request::segment(2) == $item->id ? ' active' : ''}}" value="{{$item->id}}">{{$item->nama_kategori}}</a>
                @endforeach
            </div>
            {{-- <form>
                @csrf
                <div class="form-group p-3">
                    <label for="formControlRange">Harga</label>
                    <input type="range" class="form-control-range" id="formControlRange">
                </div>
            </form> --}}
        </div>
        <div class="col-md-9">
            <div class="row justify-content-left">
                    @foreach ($barang as $item)
                    <div class="col-md-3 p-1">
                        <div class="card" >
                            @if ($item->foto == NULL)
                                <img src="{{asset('storage/asd.jpg'.$item->foto)}}" class="card-img-top" alt="..." >
                            @else
                                <img src="{{asset('storage/'.$item->foto)}}" class="card-img-top" alt="..." >
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nama_barang}}</h5>
                                <p class="card-text">Rp. {{number_format($item->harga)}}</p>
                                <form action="{{route('add.cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="barang_id" value="{{$item->id}}">
                                    <input type="submit" class="btn btn-block btn-sm btn-primary" value="Add Cart">
                                </form>
                                <a href="/info_barang/{{$item->id}}" class="btn btn-block btn-sm btn-success">Lihat Barang</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>

        {{-- <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Barang
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">warna</th>
                            <th scope="col">Stok Barang</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal input</th>
                            <th scope="col">Atribut</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                            <tr>
                                @if ($item->foto == null)
                                    <td>
                                        <img src="storage/asd.jpg" width="100" height="60">
                                    </td>
                                @else
                                <td>
                                    <img src="{{asset('storage/'.$item->foto)}}" width="100" height="60">
                                </td>
                                @endif
                                <td>{{$item->nama_barang}}</td>
                                <td>{{$item->merk}}</td>
                                <td>{{$item->tipe}}</td>
                                <td>{{$item->warna}}</td>
                                <td>{{$item->stok}}</td>
                                <td>{{$item->deskripsi}}</td>
                                <td>{{$item->created_at}}</td>
                                <td><form action="{{route('add.cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="barang_id" value="{{$item->id}}">
                                    <input type="submit" class="btn btn-block btn-danger btn-sm" value="Add Cart">
                                </form>
                                    <a href="/info_barang/{{$item->id}}" class="btn btn-sm btn-block btn-success">Lihat Barang</a>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $barang->links() }}
                </div>
            </div>
        </div> --}}

    </div>
    <div class="row justify-content-center">{{ $barang->links() }}</div>
</div>
@endsection
