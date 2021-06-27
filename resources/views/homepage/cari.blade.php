@extends('layouts.template')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col col-md-12 col-sm-12 mb-4">
            <h3>{{ $cari }}</h3>
            @if(count($mencari)==0)
                <p>Produk Tidak Ada Dengan Nama {{ $cari }}</p>
            @else
        </div>
        
        <div class="row mt-4">
            @foreach($mencari as $produk)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <a href="{{ URL::to('produk/'.$produk->slug_produk) }}">
                        @if($produk->foto != null)
                        <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
                        @else
                        <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
                    @endif
                    </a>
                    <div class="card-body">
                        <a href="{{ URL::to('produk/'.$produk->slug_produk ) }}" class="text-decoration-none">
                            <p class="card-text">
                                {{ $produk->nama_produk }}
                            </p>
                        </a>
                        <div div class="row mt-4">
                            <div class="col">
                                <button class="btn btn-light">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="col-auto">
                                <p>
                                    Rp. {{ number_format($produk->harga, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col">
                {{ $mencari->links() }}
            </div>
        </div>
    </div>
</div>
    @endif
@endsection