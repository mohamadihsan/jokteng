<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header<?= !empty($_SESSION['warna_component_var']) ? '-'.$_SESSION['warna_component_var'] : NULL; ?>">
            <h4 class="card-title"><?= $title ?></h4>
            <!-- <p class="card-category">Complete your profile</p> -->
            <!-- Button trigger modal -->
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-sm btn<?= !empty($_SESSION['warna_component_var']) ? '-'.$_SESSION['warna_component_var'] : NULL; ?>" onclick="add_data()" style="float: right;">
              <span data-toggle="tooltip" data-placement="top" title="<?= $add.' '.$title ?>">
                <i class="material-icons">add</i>
              </span>
            </button>
            <table id="table" class="table table-striped table-bordered display compact">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead> 
              <tbody>
              </tbody>  
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="form-modal"><?= $title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-modal-save">
          <!-- hidden ID -->
          <input type="hidden" name="jenis_produk_id_int" class="form-control" id="jenis_produk_id_int" readonly>
          <div class="form-group">
            <label for="nama_jenis_produk_var" class="bmd-label-floating"><?= $lbl_1 ?></label>
            <input type="text" name="nama_jenis_produk_var" class="form-control" id="nama_jenis_produk_var">
          </div>
          <div class="form-group">
            <label for="deskripsi_jenis_produk_var" class="bmd-label-floating"><?= $lbl_2 ?></label>
            <input type="text" name="deskripsi_jenis_produk_var" class="form-control" id="deskripsi_jenis_produk_var">
          </div>
          <div class="form-group text-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $close ?></button>
            <button type="submit" class="btn btn<?= !empty($_SESSION['warna_component_var']) ? '-'.$_SESSION['warna_component_var'] : NULL; ?>" id="btn-save"><?= $save ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="form-modal-2" tabindex="-1" role="dialog" aria-labelledby="form-modal-2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-md">
      <div class="modal-header">
        <h5 class="modal-title" id="form-modal-2"><?= $confirm_label ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-modal-delete">
          <div class="form-group">
            <!-- hidden ID -->
            <input type="hidden" name="id" class="form-control" id="id" readonly>
            <span><?= $confirm_delete ?></span>
          </div>  
          <div class="form-group text-right">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $close ?></button>
            <button type="submit" class="btn btn-danger" id="btn-delete"><?= $delete ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- DATATABLE -->
<script>
  $(document).ready(function() {
    var table = $("table").DataTable({
      processing: true,
      serverside: true,
      language: {
        infoEmpty: "<?= $dt_empty_table ?>",
        info: "<?= $dt_info1 ?> _PAGE_ <?= $dt_info2 ?> _PAGES_",
        lengthMenu: "<?= $dt_length_menu1 ?> _MENU_ <?= $dt_length_menu2 ?>",
        search: "<?= $dt_search ?>",
        zeroRecords: "<?= $dt_search_not_found ?>",
        dom: '<"top"i>rt<"bottom"flp><"clear">',
        paginate: {
          previous: "<?= $dt_previous ?>",
          next: "<?= $dt_next ?>"
        }
      },
      ajax: {
        url: '<?= base_url("api/type-product") ?>',
        dataSrc: 'data'
      },
      deferLoading: 10,
      columns: [
        { data: 'nama_jenis_produk_var' },
        { data: 'deskripsi_jenis_produk_var' },
        { 
          data: 'status_boo', 
          width: "15%",
          className: 'text-center',
          render: function(data) {
            if(data == 1)
            {
              return '<span class="badge badge-success"><?= $dt_active ?></span>';
            }
            else
            {
              return '<span class="badge badge-danger"><?= $dt_not_active ?></span>';
            }
          }   
        },
        {
          data: 'jenis_produk_id_int',
          width: "10%",
          className: 'text-center',
          render: function(data) {
            
            return '<a href="#" class="edit_data" onclick="edit_data('+data+')"><span data-toggle="tooltip" data-placement="top" title="<?= $edit ?>"><i class="material-icons text-warning">edit</i></span></a>'+
                    '<a href="#" class="delete_data" onclick="delete_data('+data+')"><span data-toggle="tooltip" data-placement="top" title="<?= $delete ?>"><i class="material-icons text-danger">delete_forever</i></span></a>';
            
          }
        }
      ]
    });
  });
</script>

<!-- FORM VALIDATION -->
<script src="<?= base_url() ?>assets/js/core/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#form-modal-save").validate({
      rules: {
        nama_jenis_produk_var: {
          required: true,
          minlength: 5
        }
      },
      messages: {
        nama_jenis_produk_var: {
          required: "<?= $required_nama_jenis_produk_var ?>",
          minlength: "<?= $minlength_nama_jenis_produk_var ?>"
        }
      },
      submitHandler: function(form) {

        // deklarasi
        var status;
        var url;
        var method;
        var id = $('#jenis_produk_id_int').val();
        var data = {
          'nama_jenis_produk_var': $('#nama_jenis_produk_var').val(),
          'deskripsi_jenis_produk_var': $('#deskripsi_jenis_produk_var').val()
        }
        data = JSON.stringify(data);

        if (id == '' || id == null) 
        {
          url = '<?= base_url("api/type-product") ?>';
          method = 'POST';
        }
        else
        {
          url = '<?= base_url("api/type-product/") ?>'+id;
          method = 'PATCH';
        }

        jQuery.ajax({
          url: url,
          type: method,
          dataType: 'json',
          data: data,
          beforeSend: function() {
            // tampilkan gambar loading
            $('#btn-save').prop('disabled', true);
            $('#form-modal').loading({
              theme: 'light',
              message: '<?= $message_verify ?>',
              shownClass: 'loading-shown'
            });
          },
          complete: function(xhr, textStatus) {
            // sembunyikan gambar loading
            $('#btn-save').prop('disabled', false);
            // console.log(textStatus);
            $('.modal').loading('stop');
          },
          success: function(data, textStatus, xhr) {
            //called when successful
            // console.log(data);
            if (data.status === true) 
            {
              tampilkan_notif('success', data.message);
              $('#form-modal').modal('hide');
            }
            else
            {
              // notif
              tampilkan_notif('danger', data.message);
            }
          },
          error: function(xhr, textStatus, errorThrown) {
            //called when there is an error
            // console.log(errorThrown);
            // notif
            tampilkan_notif('danger', errorThrown);
          }
        })
      }
    });
  });
</script>

<!-- FUNCTION -->
<script>
function add_data() {
  $('#form-modal-save')[0].reset();
  $('#form-modal').modal('show');
}
  
function edit_data(id) {
  
  jQuery.ajax({
    url: '<?= base_url("api/type-product/") ?>'+id,
    type: 'GET',
    beforeSend: function() {
      $('.edit_data').prop('disabled', true);
      $('.card-body').loading({
        theme: 'light',
        message: '<?= $message_verify ?>',
        shownClass: 'loading-shown'
      });
    },
    complete: function(xhr, textStatus) {
      $('.edit_data').prop('disabled', false);
      // console.log(textStatus);
      $('.card-body').loading('stop');
    },
    success: function(data, textStatus, xhr) {
      //called when successful
      // console.log(data);
      if (data.status === true) 
      {
        // console.log(data);
        $('#jenis_produk_id_int').val(data.data.jenis_produk_id_int);
        $('#nama_jenis_produk_var').val(data.data.nama_jenis_produk_var);
        $('#deskripsi_jenis_produk_var').val(data.data.deskripsi_jenis_produk_var);
        $('#form-modal').modal('show');
      }
      else
      {
        // notif
        tampilkan_notif('danger', data.message);
      }
    },
    error: function(xhr, textStatus, errorThrown) {
      //called when there is an error
      // console.log(errorThrown);
      // notif
      tampilkan_notif('danger', errorThrown);
    }
  })
}

function delete_data(id) {
  $('#id').val(id);
  $('#form-modal-2').modal('show');
}


$('#form-modal-delete').submit(function (event) {
  event.preventDefault();

  var id = $('#id').val();

  jQuery.ajax({
    url: '<?= base_url("api/type-product/") ?>'+id,
    type: 'DELETE',
    beforeSend: function() {
      // tampilkan gambar loading
      $('#btn-delete').prop('disabled', true);
      $('#form-modal-2').loading({
        theme: 'light',
        message: '<?= $message_verify ?>',
        shownClass: 'loading-shown'
      });
    },
    complete: function(xhr, textStatus) {
      // sembunyikan gambar loading
      $('#btn-delete').prop('disabled', false);
      // console.log(textStatus);
      $('#form-modal-2').loading('stop');
    },
    success: function(data, textStatus, xhr) {
      //called when successful
      if (data.status === true) 
      {
        tampilkan_notif('success', data.message);
        $('#form-modal-2').modal('hide');
      }
      else
      {
        // notif
        tampilkan_notif('danger', data.message);
      }
    },
    error: function(xhr, textStatus, errorThrown) {
      //called when there is an error
      // console.log(errorThrown);
      // notif
      tampilkan_notif('danger', errorThrown);
    }
  })
});
</script>