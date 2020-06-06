@extends('layouts/main')

@section('title', 'User Profile')

@section('title_pages', 'User Profile')

@section('content')

  <div class="content">
    <div class="container-fluid">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Profil Saya</h4>
            </div>
            
            <div class="card-body">
              <form method="post" action="/users/{{ Auth::user()->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating">Company (disabled)</label>
                      <input type="text" class="form-control" value="Apotik Sugih Waras" disabled>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name *</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}">
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email address *</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" value="{{ Auth::user()->email }}">
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Fist Name</label>
                      <input type="text" class="form-control" name="first_name" value="{{ Auth::user()->first_name }}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Last Name</label>
                      <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone *</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror"" name="phone" value="{{ Auth::user()->phone }}">
                      @error('phone')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="bmd-label-floating">Adress</label>
                      <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div>
                      <label for="images">Ubah Foto</label>
                      <input type="file" class="form-control-file @error('images') is-invalid @enderror" name="images" id="images">
                      @error('images')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">New Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                      @error('password')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Konfirmasi Password *</label>
                      <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" id="password-confirm">
                      @error('password-confirm')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <div class="form-group">
                        <textarea class="form-control" rows="5" name="description">{{ Auth::user()->description }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Simpan Edit</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="javascript:;">
                <img class="img" src="{{ url('/images/'.Auth::user()->images) }}" />
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">{{ Auth::user()->role }}</h6>
              <h4 class="card-title">{{ Auth::user()->name }}</h4>
              <h5 class="card-title">{{ Auth::user()->address }}</h5>
              <p class="card-description">
                {{ Auth::user()->description }}
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Data User</h4>              
            </div>
            <div class="card-body">
              <a href="/users/create" class="btn btn-success"><i class="material-icons">create</i> Tambah</a>
              <table class="table table-hover" id="example" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Phone</th>
                    <th scope="col">Akses</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $item)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      {{-- <td>{{ $item->name }}</td> --}}
                      <td><a href="/users/{{ $item->id }}" class="badge badge-primary">{{ $item->name }}</a></td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->phone }}</td>
                      <td>{{ $item->role }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection