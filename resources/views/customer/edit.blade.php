@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Form Edit Customer
          </h3>
          <div class="card-tools">
            <a href="{{ route('customer.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        
        <div class="card-body">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  Nama
                </td>
                <td>
                {{ $user->name }}
                </td>
              </tr>
              <tr>
                <td>
                  Email
                </td>
                <td>
                {{ $user->email }}
                </td>
              </tr>
              <tr>
                <td>
                  No Tlp
                </td>
                <td>
                {{ $user->phone }}
                </td>
              </tr>
              <tr>
                <td>
                  Status
                </td>
                <td>
                
                <form action="{{ route('customer.update', $user->id) }}" method="post">
                @csrf
                  {{ method_field('patch') }}
                    <div class="form-group mr-2">
                      <select name="status" id="status" class="form-control">
                        <option value="aktif" {{ $user->status == 'aktif'? 'selected': ''}}>Aktif</option>
                        <option value="non aktif" {{ $user->status == 'non aktif'? 'selected': ''}}>Non Aktif</option>
                      </select>
                    </div>
                    <div class="form-group">
                    </br>
                    </br>
                    </br>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
               
                  
                  
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection