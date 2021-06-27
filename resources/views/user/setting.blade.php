@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          
          <div class="text-center">
            <img src="{{ \Storage::url($itemuser->foto)  }}" alt="profil" class="profile-user-img img-responsive img-circle">
          </div>

          <form action="{{ url('/admin/userimage') }}" method="post" enctype="multipart/form-data" class="form-inline">
            @csrf
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <input type="file" name="image" id="image">
                  <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
          </form>
          <hr>
          <form action="{{ url('admin/update') }}" method="post">
          @csrf
            <div class="form-group">
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
              <label for="name">Nama</label>
              <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="phone">Email</label>
              <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="phone">Alamat</label>
              <input type="text" name="alamat" id="alamat" value="{{ Auth::user()->alamat }}" class="form-control">
            </div>
            <div class="form-group">
              <label for="phone">No Tlp</label>
              <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone }}"class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
          
        </div>
      </div>      
    </div>
  </div>
</div>
@endsection