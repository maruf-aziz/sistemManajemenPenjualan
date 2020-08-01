@extends('layouts/main')

@section('title', 'Ubah Pelanggan')

@section('title_pages', 'Ubah Pelanggan')

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Pelanggan</h4>
            </div>
            
            <div class="card-body">
							<form method="post" action="/customers/{{ $customer->id }}" >
								@method('patch')
                @csrf
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name *</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name" value="{{ $customer->name }}">
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" value="{{ $customer->email }}">
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
									</div>
									<div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Phone *</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror"" name="phone" value="{{ $customer->phone }}">
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
											<label class="bmd-label-floating">Alamat</label>
                      <input type="text" class="form-control @error('address') is-invalid @enderror"" name="address" value="{{ $customer->address }}">
                      @error('address')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    	@enderror
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary pull-right">Edit</button>
								
                <div class="clearfix"></div>
							</form>
							<form action="{{ $customer->id }}" method="POST" class="d-inline" id="delete{{ $customer->id }}">
								@method('delete')
								@csrf
								<button type="button" data-nama="{{ $customer->name }}" data-formid="{{ $customer->id }}" class="btn btn-danger pull-right delete-btn">Hapus</button>
							</form>
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
				text: 'Data customer '+nama+' yakin dihapus ?',
				showCancelButton: true,
				confirmButtonText: 'Yes, Delete !'
			}).then((result) => {
				if (result.value) {
					$("#delete"+formid).submit();
					console.log(formid);
				}
			});
		});
	</script>

@endsection