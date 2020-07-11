@extends('layouts/main')

@section('title', 'Detail Pembelian')

@section('title_pages', 'Detail Pembelian')

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
              <h4 class="card-title">Detail Pembelian</h4>
            </div>
            
            <div class="card-body">
              <form method="post" action="" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tanggal Transaksi</label>
                      <input type="text" class="form-control" value="{{ $purchases->dibuat }}" disabled>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating">Total Transaksi</label>
                      <input type="text" class="form-control" value="@currency($purchases->total_cost)" disabled>
                    </div>
                  </div>
                </div>
								<a href="/purchases" class="btn btn-warning">Kembali</a>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <div class="card-avatar">
              <a href="javascript:;">
                <img class="img" src="/images/default.png" />
              </a>
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">Supplier</h6>
              <h4 class="card-title">{{ $purchases->name }}</h4>
              <h5 class="card-title">{{ $purchases->email }}</h5>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Detail Item</h4>              
            </div>
            <div class="card-body">
              <form method="post" action="" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <table class="table table-hover" id="example" style="width:100%">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Jumlah Beli</th>
                      <th scope="col">Isi / satuan</th>
                      <th scope="col">Harga Satuan</th>
                      <th scope="col">Total Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($detail as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>	
                        <td>{{ $item->name_product }}</td>	
                        <td>{{ $item->amount }} / {{ $item->unit }}</td>	
                        <td>{{ $item->value }}</td>	
                        <td>@currency($item->price_per_seed)</td>	
                        <td>@currency($item->total_price)</td>	
                      </tr>											
                    @endforeach
                  </tbody>
                </table>
                
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
			var formid = $(this).attr("data-formid");
			Swal.fire({
				icon: 'warning',
				title: 'Konfirmasi Batalkan Transaksi',
				text: 'Transaksi ini yakin dibatalkan ?',
				showCancelButton: true,
				confirmButtonText: 'Yes, Batalkan !'
			}).then((result) => {
				if (result.value) {
					$("#batal"+formid).submit();
					console.log(formid);
				}
			});
		});
	</script>

@endsection