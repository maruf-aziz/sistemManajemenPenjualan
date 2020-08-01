@extends('layouts/main')

@section('title', 'Tambah Akun')

@section('title_pages', 'Tambah Akun')

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Tambah Data</h4>
              <p class="card-category">Admin / Pimpinan / Sales</p>
            </div>
            <div class="card-body">
              <form method="post" action="/users" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                  <label for="name" class="bmd-label-floating">Nama Lengkap *</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group mt-3">
                  <label for="first_name" class="bmd-label-floating">Nama Depan</label>
                  <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{ old('first_name') }}">
                  @error('first_name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group mt-3">
                  <label for="last_name" class="bmd-label-floating">Nama Belakang</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ old('last_name') }}">
                  @error('last_name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="form-group mt-3">
                  <label for="email" class="bmd-label-floating">Email *</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group mt-3">
                  <label for="role" class="bmd-label-floating">Hak Akses *</label>
                  {{-- <input type="text" class="form-control @error('role') is-invalid @enderror" name="role" id="role" value="{{ old('role') }}"> --}}
                  <select class="custom-select custom-select-md @error('role') is-invalid @enderror" name="role" id="role">
                    <option selected value="">-- Pilih Hak Akses --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="pimpinan" {{ old('role') == 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                    <option value="sales" {{ old('role') == 'sales' ? 'selected' : '' }}>Sales</option>
                  </select>
                  @error('role')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group mt-3">
                  <label for="phone" class="bmd-label-floating">No Telephone *</label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">
                  @error('phone')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group mt-3">
                  <label for="address" class="bmd-label-floating">Alamat</label>
                  <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
                  @error('address')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="mt-3">
                  <label for="images">Foto</label>
                  <input type="file" class="form-control-file @error('images') is-invalid @enderror" name="images" id="images">
                  @error('images')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group mt-4">
                  <label for="description" class="bmd-label-floating">Deskripsi Diri</label>
                  <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ old('description') }}">
                  @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="form-group mt-3">
                  <label for="password" class="bmd-label-floating">Password *</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}">
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group mt-3">
                  <label for="password-confirm" class="bmd-label-floating">Konfirmasi Password *</label>
                  <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" id="password-confirm">
                  @error('password-confirm')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection