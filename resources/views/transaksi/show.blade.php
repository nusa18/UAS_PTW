@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-8 col-md-8 mb-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Item</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Kode
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Harga
                  </th>
                  <th>
                    Diskon
                  </th>
                  <th>
                    Qty
                  </th>
                  <th>
                    Subtotal
                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder->cart->detail as $detail)
                <tr>
                  <td>
                  {{ $no++ }}
                  </td>
                  <td>
                  {{ $detail->produk->kode_produk }}
                  </td>
                  <td>
                  {{ $detail->produk->nama_produk }}
                  </td>
                  <td class="text-right">
                  {{ number_format($detail->harga, 2) }}
                  </td>
                  <td class="text-right">
                  {{ number_format($detail->diskon, 2) }}
                  </td>
                  <td class="text-right">
                  {{ $detail->qty }}
                  </td>
                  <td class="text-right">
                  {{ number_format($detail->subtotal, 2) }}
                  </td>
                </tr>
              @endforeach
                <tr>
                  <td colspan="6">
                    <b>Total</b>
                  </td>
                  <td class="text-right">
                    <b>
                    {{ number_format($itemorder->cart->total, 2) }}
                    </b>
                  </td>
                </tr>
                @if($itemorder->cart->ongkir >= 100)
                <td colspan="7">
                  <h5>Silahkan Lakukan pembayaran ke Bank BRI</h5>
                  <p>Nomor Account : 0000-1234-4321 </p>
                  <p>Setelah melakukan pembayaran silahkan isi form konfirmasi pembayaran</p>
                </td>
                @else
                <td colspan="7">
                  <h5>Tunggu untuk admin mengisi ongkir terlebih dahulu</h5>
                </td>
                @endif
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-danger">Tutup</a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">Alamat Pengiriman</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>Nama Penerima</th>
                  <th>Alamat</th>
                  <th>No tlp</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    {{ $itemorder->nama_penerima }}
                  </td>
                  <td>
                    {{ $itemorder->alamat }}<br />
                    {{ $itemorder->kelurahan}}, {{ $itemorder->kecamatan}}<br />
                    {{ $itemorder->kota}}, {{ $itemorder->provinsi}} - {{ $itemorder->kodepos}}
                  </td>
                  <td>
                    {{ $itemorder->no_tlp }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ringkasan</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    Total
                  </td>
                  <td class="text-right">
                    {{ number_format($itemorder->cart->total, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Subtotal
                  </td>
                  <td class="text-right">
                  {{ number_format($itemorder->cart->subtotal, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Diskon
                  </td>
                  <td class="text-right">
                  {{ number_format($itemorder->cart->diskon, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Ongkir
                  </td>
                  <td class="text-right">
                  {{ number_format($itemorder->cart->ongkir, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Ekspedisi
                  </td>
                  <td class="text-right">
                  {{ $itemorder->cart->ekspedisi, 2}}
                  </td>
                </tr>
                <tr>
                  <td>
                    No. Resi
                  </td>
                  <td class="text-right">
                  {{ $itemorder->cart->no_resi , 2 }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Status Pembayaran
                  </td>
                  <td class="text-right">
                  {{ $itemorder->cart->status_pembayaran }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Status Pengiriman
                  </td>
                  <td class="text-right">
                  {{ $itemorder->cart->status_pengiriman }}
                  </td>
                </tr>
                
                @if(Auth::user()->role == "admin")
                <tr>
                  <td>
                    <p>Konfirmasi Pembayaran</p>
                  </td>
                </tr>
                <tr>
                  <td>
                      <img src="{{ \Storage::url($itemorder->cart->foto)  }}" alt="profil" class="profile-user-img img-responsive img-circle">
                  </td>
                </tr>
                
                @else
                @if($itemorder->cart->ongkir >= 100)
                <tr>
                  <td colspan="2">
                    <p>Konfirmasi Pembayaran</p>
                  </td>
                </tr>
                <tr>
                  <td colspan="2" class="text-center">
                      <img src="{{ \Storage::url($itemorder->cart->foto)  }}" alt="profil" class="profile-user-img img-responsive img-circle">
                  </td>
                </tr>
                
                <form action="{{ url('/admin/cartimage') }}" method="post" enctype="multipart/form-data" class="form-inline">
                  @csrf
                    <tr>
                      <td colspan="2">
                            <input style="width:250px" type="file" name="image" id="image">
                            <input type="hidden" name="cart_id" value={{ $itemorder->cart_id }}>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="2">
                          <button type="submit" class="btn btn-primary">Upload</button>
                      </td>
                    </tr>
                </form>
                @endif
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection