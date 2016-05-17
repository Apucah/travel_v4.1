<!-- Tambah Mobil -->
<div class="modal" id="mobil">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close hidden-mobil" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Tambah Stok Mobil</h4>
      </div>
      <div class="modal-body">
        <!-- form start -->
        <div class="form-horizontal">
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Plat Mobil</label>
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-xs-2">
                    <input class="form-control" placeholder="E" type="text" name="plat_mobil_depan">
                  </div>
                  <div class="col-xs-1">
                    <span> <i class="fa fa-minus"></i></span>
                  </div>
                  <div class="col-xs-4">
                    <input class="form-control" placeholder="1234" type="text" name="plat_mobil_tengah">
                  </div>
                  <div class="col-xs-1">
                    <span> <i class="fa fa-minus"></i> </span>
                  </div>
                  <div class="col-xs-3">
                    <input class="form-control" placeholder="FG" type="text" name="plat_mobil_akhir">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Nama Mobil</label>
              <div class="col-sm-10">
                <input class="form-control" id="inputPassword3" type="text" name="nama_mobil">
              </div>
            </div>
            <div class="form-group">
              <label for="id_jenis" class="col-sm-2 control-label">Jenis Mobil</label>
              <div class="col-sm-8">
                <select class="form-control" name="id_jenis">
                  <?php foreach ($jenis_mobil as $jenis_m) {?>
                  <option value="<?=$jenis_m->id_jenis;?>"><?=$jenis_m->nama_jenis;?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="button" class="btn btn-default hidden-mobil">Batal</button>
              <button type="submit" class="btn btn-info pull-right" id="save-mobil">Simpan</button>
              </div><!-- /.box-footer -->
            </div>
          </div>
          </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <!-- END TAMBAH MOBIL -->
