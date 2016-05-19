<!-- TAMBAH SUPIR -->
<div class="modal" id="supir">
  <div class="col-sm-12">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close hidden-mobil" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Tambah Supir</h4>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <div class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama Supir</label>
                <div class="col-sm-8">
                  <input class="form-control" id="inputEmail3" type="text" name="nama_supir">
                </div>
              </div>
              <div class="form-group">
                <label for="jadwal_kerja[]" class="col-sm-2 control-label">Hari</label>
                <div class="col-sm-8">
                  <select multiple class="form-control" name="jadwal_kerja[]">
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                    <option>Minggu</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="plat_mobil" class="col-sm-2 control-label">Plat Mobil</label>
                <div class="col-sm-8">
                  <select class="form-control" name="plat_mobil">
                    <?php foreach ($plat_mobil as $isinya) {
                    echo '<option value="'.$isinya['plat_mobil'].'">'.$isinya[plat_mobil]. ' - ' . $isinya['nama_mobil'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
              </div><!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default hidden-mobil">Batal</button>
                <button type="submit" class="btn btn-info pull-right" id="save-supir">Simpan</button>
                </div><!-- /.box-footer -->
              </div>
            </div>
            </div><!-- /.modal-content -->
          </div>
          </div><!-- /.modal-dialog -->
        </div>
        <!-- END TAMBAH SUPIR -->
