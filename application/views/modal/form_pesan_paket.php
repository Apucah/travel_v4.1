<!-- Tambah Mobil -->
<div class="modal" id="pemesanan_paket">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close hidden-mobil" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Pemesanan Paket</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <div class="form-horizontal">
          <div class="box-body">

            <div class="form-group">
              <label for="id_jenis" class="col-sm-2 control-label">Pilih Paket</label>
              <div class="col-sm-8">
                <select class="form-control" name="paket">
                  <?php foreach ($daftar_paket as $paket) {?>
                  <option value="<?=$paket->paket;?>"><?=$paket->nama_paket;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Tanggal Mulai</label>
              <div class="col-sm-10">
                <input class="form-control" id="inputPassword3" type="date" name="tgl_mulai">
              </div>
            </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="button" class="btn btn-default hidden-mobil">Batal</button>
              <button type="submit" class="btn btn-info pull-right" id="save-pemesanan-paket">Simpan</button>
              </div><!-- /.box-footer -->
            </div>
          </div>
          </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <!-- END TAMBAH MOBIL -->
