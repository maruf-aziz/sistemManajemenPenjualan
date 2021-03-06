@extends('layouts/main')

@section('title', 'Ubah Supplier')

@section('title_pages', 'Ubah Supplier')

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Ubah Supplier</h4>
            </div>
            
            <div class="card-body">
							<form method="post" action="/suppliers/{{ $supplier->id }}" >
								@method('patch')
                @csrf
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nama *</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name" value="{{ $supplier->name }}">
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" value="{{ $supplier->email }}">
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
									</div>
									<div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">No Telepon *</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror"" name="phone" value="{{ $supplier->phone }}">
                      @error('phone')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
                  </div>
									<div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Alamat *</label>
                      <input type="text" class="form-control @error('address') is-invalid @enderror"" name="address" value="{{ $supplier->address }}">
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
							<form action="{{ $supplier->id }}" method="POST" class="d-inline" id="delete{{ $supplier->id }}">
								@method('delete')
								@csrf
								<button type="button" data-nama="{{ $supplier->name }}" data-formid="{{ $supplier->id }}" class="btn btn-danger pull-right delete-btn">Hapus</button>
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
				text: 'Data Supplier '+nama+' yakin dihapus ?',
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