    
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/core/bootstrap-material-design.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?= base_url() ?>assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?= base_url() ?>assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?= base_url() ?>assets/js/plugins/bootstrap-notify.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/jquery.loading.min.js"></script>
  <script>
    function tampilkan_notif(status, pesan){

      var icon_var;

      if (status == 'success') 
      {
        icon_var = "done";
      }
      else if(status == 'warning')
      {
        icon_var = "warning";
      }
      else
      {
        icon_var = "error"
      }

      $.notify({
        icon: icon_var,
        message: pesan

      },{
        type: status,
        timer: 500,
        placement: {
          from: 'top',
          align: 'right'
        }
      });
    }
  </script>
</body>

</html>