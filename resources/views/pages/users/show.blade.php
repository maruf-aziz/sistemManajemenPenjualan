@extends('layouts/main')

@section('title', 'Detail Akun')

@section('title_pages', 'Detail Akun')

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
              <h4 class="card-title">Detail</h4>
            </div>
            
            <div class="card-body">
              <div>
                @method('patch')
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name *</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name" value="{{ $user->name }}" disabled>
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email address *</label> 
                      <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" value="{{ $user->email }}" disabled>
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
                      <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" disabled>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Last Name</label>
                      <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" disabled>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone *</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror"" name="phone" value="{{ $user->phone }}" disabled>
                      @error('phone')
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
                      <label class="bmd-label-floating">Adress</label>
                      <input type="text" class="form-control" name="address" value="{{ $user->address }}" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>About Me</label>
                      <div class="form-group">
                        <textarea class="form-control" rows="5" name="description" disabled>{{ $user->description }}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="/users" class="btn btn-warning">Kembali</a>
                <a href="{{ $user->id }}/edit" class="btn btn-success pull-right">Edit</a>
                <form action="{{ $user->id }}" method="POST" class="d-inline" id="{{ $user->id }}">
									@method('delete')
									@csrf
									<button type="button" data-nama="{{ $user->name }}" data-formid="{{ $user->id }}" class="btn btn-danger pull-right delete-btn">Hapus</button>
								</form>
                <div class="clearfix"></div>
              </div>
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
	
	<script type="text/javascript">
		$('.delete-btn').on('click', function(e){
			e.preventDefault();
			var self = $(this);
			var nama = $(this).attr("data-nama");
			var formid = $(this).attr("data-formid");
			Swal.fire({
				icon: 'warning',
				title: 'Konfirmasi Hapus',
				text: 'Data User '+nama+' yakin dihapus ?',
				showCancelButton: true,
				confirmButtonText: 'Yes, Delete !'
			}).then((result) => {
				if (result.value) {
					$("#"+formid).submit();
					console.log(formid);
				}
			});
		});
	</script>

@endsection