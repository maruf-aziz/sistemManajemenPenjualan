<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<title>Faktur {{ $transactions->id_tr }}-/{{ $transactions->dibuat }}-/{{ $transactions->id }}</title>
		{{-- <style type="text/css" media="print">

			@page{ size: A4 landscape; margin: 2cm; }
			
			</style> --}}
  </head>
  <body>
		
		<div class="container mt-3">
			<div class="row">
				<div class="col-md-6">
					<p style="margin-top: 15px;">
						PT SAMUDERA INDAH INTERMEDIKA <br>
						JL AGUS SALIM NO 35 SURAKARTA <br>
						TELP : 0271 730998 <br>
						NPWP : 01.486.020.6.526.000 <br>
						TANGGAL PENGUKUHAN PMP : 28 Februari 2012 <br>
						------------------------------------------ <br>
						KEPADA : <br>
						 {{-- DATABASE SUPPLIER --}}
						 {{ $transactions->name }} <br>
						 {{ $transactions->address }} <br>
						 {{ $transactions->phone }}
					</p>
				</div>
				<div class="col-md-6">
					<div class="card" style="width: 100%;">
						<div class="card-body">
							<h6 class="card-title">============ FAKTUR PENJUALAN ==========</h6>
							<table class="table table-borderless">
								<tr>
									<td> NO TRANS</td>
									<td> : </td>
									<td>{{ $transactions->id_tr }}-/{{ $transactions->dibuat }}-/{{ $transactions->id }}</td>
								</tr>
								<tr>
									<td> TANGGAL</td>
									<td> : </td>
									<td>{{ $transactions->dibuat}}</td>
								</tr>
								<tr>
									<td> NO ORDER</td>
									<td> : </td>
									<td> - </td>
								</tr>
								<tr>
									<td> TGL TEMPO</td>
									<td> : </td>
									<td> {{ $transactions->dibuat }}</td>
								</tr>
								<tr>
									<td> SALESMEN</td>
									<td> : </td>
									<td> {{ $transactions->petugas }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<hr style="height:2px;border-width:0;color:black;background-color:black">

			{{-- TABLE DETAIL --}}
			<div class="row mt-3">
				<div class="col-12">
					<table class="table table-borderless">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama Barang</th>
								<th scope="col">Qty</th>
								<th scope="col">Unit</th>
								<th scope="col">No lot</th>
								<th scope="col">Exp Date</th>
								<th scope="col">Harga</th>
								<th scope="col">Disc</th>
								<th scope="col">Jumlah</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($detail as $item)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $item->name_product }}</td>
										<td>{{ $item->amount }}</td>
										<td>{{ $item->unit }}</td>
										<td>{{ $item->lot }}</td>
										<td>{{ $item->exp }}</td>
										<td>@currency($item->unit_price)</td>
										<td>{{ $item->disc_item }}</td>
										<td>@currency($item->subTotal)</td>
									</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="7"></td>
								<td>Sub Total</td>
								<td>@currency($total)</td>
							</tr>							
							<tr>
								<td colspan="7"></td>
								<td>Discount</td>
								<td>{{ $transactions->disc }} %</td>
							</tr>
							{{-- <tr>
								<td colspan="7"></td>
								<td>DPP</td>
								<td>@currency($transactions->total_cost)</td>
							</tr> --}}
							<tr>
								<td colspan="7"></td>
								<td>PPN 10%</td>
								<td>@currency($transactions->tax)</td>
							</tr>
							<tr>
								<td colspan="7"></td>
								<td>Total</td>
								{{-- <td>@currency($transactions->total_cost + $transactions->tax)</td> --}}
								<td>@currency($transactions->total_cost)</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>

			<hr style="height:2px;border-width:0;color:black;background-color:black">

			<div class="row">
				<div class="col-4" align="center">
					<p>Penerima</p>
				</div>
				<div class="col-4" align="center">
					{{-- jeda --}}
				</div>
				<div class="col-4" align="center">
					<p>Hormat Kami</p>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-12">
					<style>
						@media print{
							.nonprint {display: none}
						}
					</style>
					<div class="nonprint">
						<a href="javascript:window.print()" class="btn btn-success pull-right" style="width: 100%">Cetak</a>
					</div>
				</div>
				
			</div>
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>