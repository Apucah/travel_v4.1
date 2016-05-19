<?php error_reporting(0); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Invoice</title>

	<link rel='stylesheet' type='text/css' href='<?=base_url("assets/invoice/css/style.css");?>' />
	<link rel='stylesheet' type='text/css' href='<?=base_url("assets/invoice/css/print.css");?>' media="print" />
	<!-- <script type='text/javascript' src='<?=base_url("assets/invoice/js/jquery-1.3.2.min.js");?>'></script> -->
	<script type='text/javascript' src='<?=base_url("assets/invoice/js/example.js")?>'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">KWITANSI PEMBAYARAN</textarea>

		<div id="identity">


AKOER TOUR TRAVEL<br>
Jl.PERJUANGAN NO 65A KESAMBI <br> CIREBON <br>

Phone: (555) 555-5555</readonly>


		</div>

		<div style="clear:both"></div>

		<div id="customer">

			      <table id="meta" style="float:left !important">
							<tr>
									<td class="meta-head">Nama</td>
									<td><span><?=$datanya->nama;?></span></td>
							</tr>
							<tr>

									<td class="meta-head">Alamat</td>
									<td><span id="date"><?=$datanya->alamat;?></span></td>
							</tr>
							<tr>
									<td class="meta-head">Nomor Telepon</td>
									<td><span id="date"><?=$datanya->no_telp;?></span></td>
							</tr>
						</table>
            <table id="meta">
                <tr>
                    <td class="meta-head">No Kwitansi</td>
                    <td><span><?=$datanya->no_pemesanan?></span></td>
                </tr>
                <tr>

                    <td class="meta-head">Tanggal Pemesanan</td>
                    <td><span id="date"><?=$datanya->tgl_pemesanan?></span></td>
                </tr>
                <!-- <tr>
                    <td class="meta-head">Total</td>
                    <td><div class="due">Rp. 875.000</div></td>
                </tr> -->

            </table>

		</div>

		<table id="items">

		  <tr>
		      <th>Barang</th>
		      <th>Deskrpsi</th>
		      <th>Jumlah Bangku</th>
		      <th>Tujuan</th>
					<th>Tgl Mulai</th>
					<!-- <th>Mobil</th>
					<th>
						Plat
					</th> -->
		  </tr>

		  <tr class="item-row">
		      <!-- <td class="item-name"><div class="delete-wpr"><span>1 Bangku</span> -->
		      <!-- <a class="delete" href="javascript:;" title="Remove row">x</a></div></td> -->
		      <td class="description" style="height:120px!important"><span><?=$barang?></span></td>
		      <td><span class="cost">Pemesanan <?=$barang;?></span></td>
		      <td><span class="qty"><?=$datanya->jumlah_bangku;?></span></td>
		      <td><span class="price"><?=$datanya->tujuan;?></span></td>
					<td>
						<span><?=$datanya->tgl_mulai?></span>
					</td>
					<!-- <td>
						<span><?=$datanya->nama_mobil;?></span>
					</td>
					<td>
						<span><?=$datanya->plat_mobil;?></span>
					</td> -->
		  </tr>

		  <!-- <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>1 Paket</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

		      <td class="description"><textarea>Paket perjalanan </textarea></td>
		      <td><textarea class="cost">75.000</textarea></td>
		      <td><textarea class="qty">3</textarea></td>
		      <td><span class="price">225.000</span></td>
		  </tr> -->

		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row"> </a></td>
		  </tr>

		  <tr>
		      <td colspan="2" class="blank"></td>
		      <td colspan="2" class="total-line">Harga Perbangku</td>
		      <td class="total-value"><div id="subtotal">Rp. 100.000</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Jumlah Bangku</td>
		      <td class="total-value"><div id="total"><?=$datanya->jumlah_bangku;?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Diskon</td>

		      <td class="total-value"><textarea id="paid">0 %</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance"><b>Total</b></td>
		      <td class="total-value balance"><div class="due"><b>Rp. <?=$datanya->total?></b></div></td>
		  </tr>

		</table>
		<div class="">

		</div>
		<div id="terms">
		  <textarea>Terimakasih Atas Kepercayaan Anda</textarea>
		</div>

	</div>

</body>

</html>
