<!--
<div class="modal" id="welcome">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Selemat Datang</h4>
      </div>
      <div class="modal-body">
        <p>Selamat Datang Kembali <span class="text-aqua"><?=$data_user->nama_lengkap;?></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" aria-label="Close">Tutup</button>
      </div>
    </div>
  </div>
</div> -->


<?php

  $this->load->view('modal/pilihan');
  $this->load->view('modal/form_identitas');
  $this->load->view('modal/form_pesan_paket');
  $this->load->view('modal/form_pemesanan_paket_identitas');
  $this->load->view('modal/form_pesan_bangku');
  $this->load->view('modal/form_pemesanan_bangku_identitas');
  $this->load->view('modal/form_mobil');
  $this->load->view('modal/form_supir');
  $this->load->view('modal/form_jenis_mobil');
?>
