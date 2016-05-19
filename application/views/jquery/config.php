
<script type="text/javascript">
  $(document).ready(function(){

    // $('input[name="tgl_mulai4"]').daterangepicker();

    $('body').addClass('sidebar-collapse');
    // notif sukses
    var sukses = '  <div id="noti" class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>	<i class="icon fa fa-check"></i> Berhasil</h4></div>'
    $('#notifikasi').append(sukses).hide();

    $('#noti').hide();

    // AJAX SAVE MOBIL
    $('#save-mobil').click(function(){
      var datanya = {
        plat_mobil_depan : $('input[name="plat_mobil_depan"]').val(),
        plat_mobil_tengah : $('input[name="plat_mobil_tengah"]').val(),
        plat_mobil_akhir : $('input[name="plat_mobil_akhir"]').val(),
        nama_mobil : $('input[name="nama_mobil"]').val(),
        id_jenis : $('select[name="id_jenis"]').val()
      };


      // console.log(datanya);

      $.ajax({
        method : 'POST',
        url : "<?=site_url('dashboard/insert_mobil');?>",
        data : datanya,
        success : function(data){
          $('div#mobil').fadeOut(300,function(){
            $('div#notifikasi').fadeIn(200).fadeOut(10000,function(){
            });

          });
        }
      });

    });

    // END AJAX SAVE mobil

    // AJAX SAVE supir
    $('#save-supir').click(function(){
      var datanya = {
        nama_supir : $('input[name="nama_supir"]').val(),
        jadwal_kerja : $('select[name="jadwal_kerja[]"]').val(),
        plat_mobil : $('select[name="plat_mobil"]').val(),
      };

      $.ajax({
        method : 'POST',
        url: "<?=site_url('dashboard/insert_supir');?>",
        data : datanya,
        success : function(data){
          $('div#supir').fadeOut(300,function(){
            $('div#notifikasi').fadeIn(200).fadeOut(10000);
          });
        }
      });
    });



    // AJAX JENIS MOBIL
    $('#save-jenis-mobil').click(function(){
      var datanya = {
        nama_jenis : $('input[name="nama_jenis"]').val(),
        kapasitas : $('input[name="kapasitas"]').val(),
      };


      $.ajax({
        method : 'POST',
        url: "<?=site_url('dashboard/insert_jenis_mobil');?>",
        data : datanya,
        success : function(data){
          $('div#jenis_mobil').fadeOut(300,function(){
            $('div#notifikasi').fadeIn(200).fadeOut(10000,function() {
              window.location="<?=site_url('dashboard');?>";
            });
          });
        }
      });

    });
    // END AJAX JENIS MOBIL





      // IDENTIAS AJAX
      $('#save-identitas').click(function(){
        $('div#identitas_pelanggan').fadeOut(300,function(){
          $('div#pemesanan_paket').fadeIn(300);
          $('#iden').hide();
        });
      });


      $('#save-identitas-bangku').click(function(){
        $('div#identitas_pelanggan_bangku').fadeOut(300,function(){
          $('div#pemesanan_bangku').fadeIn(300);
          $('#iden').hide();
        });
      });


      // AJAX pemesanan_paket
      $('#save-pemesanan-paket').click(function(){

        var dataa = {
          nama : $('input[name="nama"]').val(),
          alamat : $('input[name="alamat"]').val(),
          no_telp : $('input[name="no_telp"]').val(),
          paket : $('select[name="paket"]').val(),
          tgl_mulai : $('input[name="tgl_mulai"]').val()
        };

        $.ajax({
            method : 'POST',
            url: "<?=site_url('dashboard/insert_identitas');?>",
            data : dataa,
            success : function(data){
                $('div#pemesanan_paket').fadeOut(300,function(){
                  $('div#notifikasi').fadeIn(200).fadeOut(1000,function(){
                    window.location="<?=base_url();?>invoice/paket/"+data;
                  });
                });
            }
        });

        // console.log(dataa);

      });

      // AJAX PEMESANAN PAKET WITH IDENTITAS
      $('#save-pemesanan-paket-identitas').click(function(){
        var data = {
          id_pemesan : $('select[name="identitas2"]').val(),
          paket : $('select[name="paket2"]').val(),
          tgl_mulai : $('input[name="tgl_mulai2"]').val()
        };


        $.ajax({
            method : 'POST',
            url: "<?=site_url('dashboard/insert_pemesanan_paket');?>",
            data : data,
            success : function(data){
                $('div#pemesanan_paket_identitas').fadeOut(300,function(){
                  $('div#notifikasi').fadeIn(200).fadeOut(1000,function(){
                    window.location="<?=base_url();?>invoice/paket/"+data;
                  });
                });
            }
        });
      });


    // AJAX PEMESANAN BANGKU WITH IDENTITAS
    $('#save-pemesanan-bangku-identitas').click(function(){
      var data = {
        id_pemesan : $('select[name="identitas"]').val(),
        jumlah_bangku : $('input[name="jumlah_bangku4"]').val(),
        tujuan : $('input[name="tujuan4"]').val(),
        tgl_mulai : $('input[name="tgl_mulai4"]').val(),
      };

      $.ajax({
          method : 'POST',
          url: "<?=site_url('dashboard/insert_bangku_with_identitas');?>",
          data : data,
          success : function(data){
            console.log(data);
              $('div#pemesanan_bangku_identitas').fadeOut(300,function(){
                $('div#notifikasi').fadeIn(200).fadeOut(1000,function(){
                  window.location="<?=base_url();?>invoice/bangku/"+data;
                  // console.log(data);
                });
              });
          }
      });

      // console.log(data);
    });
    // END AJAX PEMESANAN BANGKU WITH INDENTITAS


    // PEMESANAN BANGKU
    $('#save-pemesanan-bangku').click(function(){
      var dataa = {
        nama : $('input[name="nama2"]').val(),
        alamat : $('input[name="alamat2"]').val(),
        no_telp : $('input[name="no_telp2"]').val(),
        jumlah_bangku : $('input[name="jumlah_bangku2"]').val(),
        tujuan : $('input[name="tujuan2"]').val(),
        tgl_mulai : $('input[name="tgl_mulai2"]').val(),
      };



      $.ajax({
        method : 'POST',
        url : "<?=base_url('dashboard/insert_bangku');?>",
        data : dataa,
        success : function(data){
          console.log(data);
            $('div#pemesanan_bangku').fadeOut(300,function(){
              $('div#notifikasi').fadeIn(200).fadeOut(1000,function(){
                window.location="<?=base_url();?>invoice/bangku/"+data;
                // console.log(data);
              });
            });
        }
      });

    });


    // END PEMESANAN BANGKU

    // SELECT 2
    $(".select2").select2();

    $('div#welcome').fadeIn(1100);

    $('button[aria-label="Close"]').click(function(){
      $('div#welcome').fadeOut(500);
    });


    $('#add-mobil').click( function() {
      $('div#mobil').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });
// CLOSE MODAL
    $('.hidden-mobil').click(function(){
      $('div#mobil').fadeOut(300);
      $('div#supir').fadeOut(300);
      $('div#jenis_mobil').fadeOut(300);
      $('div#pemesanan_paket').fadeOut(300);
      $('div#pilihan-paket').fadeOut(300);
      $('div#pilihan-bangku').fadeOut(300);
      $('div#identitas_pelanggan').fadeOut(300);
      $('div#identitas_pelanggan_bangku').fadeOut(300);
      $('div#pemesanan_paket_identitas').fadeOut(300);
      $('div#pemesanan_bangku_identitas').fadeOut(300);

      $('body').removeClass('sidebar-collapse');
    });


    $('#add-supir').click(function(){
      $('div#supir').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });

    $('#add-jenis-mobil').click(function(){
      $('#jenis_mobil').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });

    $('#pesan-paket').click(function(){
      $('#pilihan-paket').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });

    $('#pesan-bangku').click(function(){
      $('#pilihan-bangku').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });

    // PILIHAN PAKET
    $('#tidak-paket').click(function(){
      $('#pilihan-paket').fadeOut(300);
      $('#identitas_pelanggan').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });

    $('#ya-paket').click(function(){
      $('#pilihan-paket').fadeOut(300);
      $('#pemesanan_paket_identitas').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });


    // PILIHAN BANGKU
    $('#tidak-bangku').click(function(){
      $('#pilihan-bangku').fadeOut(300);
      $('#identitas_pelanggan_bangku').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });

    $('#ya-bangku').click(function(){
      $('#pilihan-bangku').fadeOut(300);
      $('#pemesanan_bangku_identitas').fadeIn(500);
      $('body').addClass('sidebar-collapse');
    });



  });


  // date
  // $('input[type="date"]').datepicker({
  //   formatData : 'yyyy-mm-dd'
  // });


  // ajax hapus status_model
  $('.hapus-paket').click(function(){
    var no_pem = $(this).attr('data-id');

    $.ajax({
      method: 'POST',
      url : '<?=base_url();?>status/hapus_paket',
      data : { no_pemesanan : no_pem},
      success : function(data){
        $('div#notifikasi').fadeIn(200).fadeOut(5000,function(){
          $('tr#'+no_pem).remove();
        });
      }
    });
  });

  $('.hapus-bangku').click(function(){
    var no_pem = $(this).attr('data-id');

    $.ajax({
      method: 'POST',
      url : '<?=base_url();?>status/hapus_bangku',
      data : { no_pemesanan : no_pem},
      success : function(data){
        $('div#notifikasi').fadeIn(200).fadeOut(5000,function(){
          $('tr#'+no_pem).remove();
        });
      }
    });
  });


  $('.konfirmasi-bangku').click(function(){
    var no_pem = $(this).attr('data-id');

    $.ajax({
      method: 'POST',
      url : '<?=base_url();?>status/konfirmasi_bangku',
      data : { no_pemesanan : no_pem},
      success : function(data){
        $('div#notifikasi').fadeIn(200).fadeOut(5000,function(){

        });
      }
    });
  });

  $('.konfirmasi-paket').click(function(){
    var no_pem = $(this).attr('data-id');

    // console.log(no_pem);
    $.ajax({
      method: 'POST',
      url : '<?=base_url();?>status/konfirmasi_paket',
      data : { no_pemesanan : no_pem},
      success : function(data){
        $('div#notifikasi').fadeIn(200).fadeOut(5000,function(){

        });
      }
    });

  });

  </script>
