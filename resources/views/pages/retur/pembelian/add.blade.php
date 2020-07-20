@extends('layouts/main')

@section('title', 'Retur Penjualan')

@section('title_pages', 'Retur Penjualan')

@section('content')

  <div class="content">
    <div class="container-fluid">
      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
			@endif
			
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Retur Penjualan</h4>              
            </div>
            <div class="card-body">
							<form action="/list_pembelian" method="POST">
                @csrf
                <div class="form-group">
                  <label for="">Pilih dan Cari Transaksi</label>
                  <br>
                  <select name="id_tr" id="id_tr" style="width: 50%;" required>
                    <option value="">--- Pilih Transaksi ---</option>
                    @foreach ($transactions as $item)
                        <option value="{{ $item->id_pemb }}">{{ $item->dibuat }} - {{ $item->nama_supplier }} ( @currency($item->total_cost) )</option>                        
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success">Buat Retur</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function() {
        $('#id_tr').select2();
    });
  </script>

@endsection