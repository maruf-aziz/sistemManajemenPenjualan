@extends('layouts/main')

@section('title', 'Update User')

@section('title_pages', 'Update User')

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
              <h4 class="card-title">Update User</h4>
            </div>
            
            <div class="card-body">
              <form method="post" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name *</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name" value="{{ $user->name }}">
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
                      <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" value="{{ $user->email }}">
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    	@enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <select class="custom-select custom-select-md @error('role') is-invalid @enderror" name="role" id="role">
												<option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
												<option value="pimpinan" {{ $user->role == 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
												<option value="sales" {{ $user->role == 'sales' ? 'selected' : '' }}>Sales</option>
											</select>
											@error('role')
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
                      <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Last Name</label>
                      <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone *</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror"" name="phone" value="{{ $user->phone }}">
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
                      <input type="text" class="form-control" name="address" value="{{ $user->address }}">
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
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <div class="form-group">
                        <textarea class="form-control" rows="5" name="description">{{ $user->description }}</textarea>
                      </div>
                    </div>
                  </div>
								</div>
								<a href="/users/{{ $user->id }}" class="btn btn-warning">Back</a>
                <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="javascript:;">
                <img class="img" src="{{ url('/images/'.$user->images) }}" />
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">{{ $user->role }}</h6>
              <h4 class="card-title">{{ $user->name }}</h4>
              <h5 class="card-title">{{ $user->address }}</h5>
              <p class="card-description">
                {{ $user->description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection