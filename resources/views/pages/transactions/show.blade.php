@extends('layouts/main')

@section('title', 'Detail Transaksi')

@section('title_pages', 'Detail Transaksi')

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
              <h4 class="card-title">Detail Transaksi</h4>
            </div>
            
            <div class="card-body">
              <form method="post" action="" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tanggal Transaksi</label>
                      <input type="text" class="form-control" value="{{ $transactions->dibuat }}" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">                  
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Discount </label>
                      <input type="text" class="form-control" name="last_name" value="{{ $transactions->disc }} %">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">PPN 10%</label>
                      <input type="text" class="form-control @error('phone') is-invalid @enderror"" name="phone" value="@currency($transactions->tax)">
                      @error('phone')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                    @enderror
                    </div>
									</div>
									<div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Total</label>
                      <input type="text" class="form-control" name="first_name" value="@currency($transactions->total_cost)">
                    </div>
                  </div>
								</div>
								<a href="/transactions" class="btn btn-warning">Kembali</a>
                <button type="button" class="btn {{ $transactions->status == 'sukses' ? 'btn-outline-success' : 'btn-outline-danger' }} pull-right">{{ $transactions->status }}</button>
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
              <h6 class="card-category text-gray">Customer</h6>
              <h4 class="card-title">{{ $transactions->pelanggan }}</h4>
              <h5 class="card-title">{{ $transactions->alamat }}</h5>
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
              <table class="table table-hover" id="example" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Beli</th>
                    <th scope="col">Sub Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($detail as $item)
										<tr>
											<td>{{ $loop->iteration }}</td>	
											<td>{{ $item->name_product }}</td>	
											<td>{{ $item->name }}</td>	
											<td>@currency($item->unit_price) /{{ $item->unit }}</td>	
											<td>{{ $item->amount }}</td>	
											<td>@currency($item->subTotal)</td>	
										</tr>											
									@endforeach
								</tbody>
								<tr>
									<td colspan="4"></td>
									<th colspan="1" align="right">Total</th>
									<td>@currency($total)</td>
								</tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection