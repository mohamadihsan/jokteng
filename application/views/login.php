<div class="content">
  <div class="container-fluid">
    <div class="row">
		<div class="col-md-6 offset-md-1">
		    <div class="card">
		      	<div class="card-header card-chart card-header<?= !empty($_SESSION['warna_component_var']) ? '-'.$_SESSION['warna_component_var'] : NULL; ?>">
					<div>
						<h2><?= !empty($_SESSION['nama_admin_web_var']) ? $_SESSION['nama_admin_web_var'] : NULL; ?></h2>
					</div>
		      	</div>  
		      	<div class="card-body">
					<h4 class="card-title"></h4>
					<form id="form-login">
						<div class="form-group">
					     	<label for="username_var" class="bmd-label-floating">Username</label>
					     	<input type="text" name="username_var" class="form-control" id="username_var">
					  	</div>
					  	<div class="form-group">
					     	<label for="password_var" class="bmd-label-floating">Password</label>
					     	<input type="password" name="password_var" class="form-control" id="password_var">
					  	</div>
						<button type="submit" class="btn btn<?= !empty($_SESSION['warna_component_var']) ? '-'.$_SESSION['warna_component_var'] : NULL; ?>" id="btn-login">Login</button>
					</form>
			    </div>
			    <div class="card-footer">
			        <div class="stats">
			          	<i class="material-icons">copyright</i>
			          	<script>
			            	document.write(new Date().getFullYear())
			          	</script> Created by 
			          	<a href="" target="_blank"> <?= DEVELOPER_NAME ?> </a>.
			        </div>
			    </div>
			</div>	
		</div>
	</div>
</div>		

<script src="<?= base_url() ?>assets/js/core/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$("#form-login").validate({
			rules: {
				username_var: {
					required: true,
					minlength: 2
				},
				password_var: {
					required: true,
					minlength: 5
				}
			},
			messages: {
				username_var: {
					required: "<?= $required_username_var ?>",
					minlength: "<?= $minlength_username_var ?>"
				},
				password_var: {
					required: "<?= $required_password_var ?>",
					minlength: "<?= $minlength_password_var ?>"
				}
			},
			submitHandler: function(form) {
				// $('#form-login').submit(function (event) {
					// event.preventDefault();

					// deklarasi
					var status;
					var data = {
						'username_var': $('#username_var').val(),
						'password_var': $('#password_var').val()
					}
					data = JSON.stringify(data);

					jQuery.ajax({
					  	url: '<?= base_url("api/verify") ?>',
					  	type: 'POST',
					  	dataType: 'json',
					  	// data: {username_var: v_username_var, password_var: v_password_var},
					  	data: data,
					  	beforeSend: function() {
					  		// tampilkan gambar loading
					  		$('#btn-login').prop('disabled', true);
					  		$('.card').loading({
							  	theme: 'light',
							  	message: '<?= $message_verify ?>',
							  	shownClass: 'loading-shown'
							});
					  	},
					  	complete: function(xhr, textStatus) {
					    	// sembunyikan gambar loading
					  		$('#btn-login').prop('disabled', false);
					    	console.log(textStatus);
					    	$('.card').loading('stop');
					  	},
					  	success: function(data, textStatus, xhr) {
					    	//called when successful
					    	console.log(data);
					    	if (data.logged_in === true) 
					    	{
					    		window.location.href = "<?= base_url('dashboard') ?>";
					    	}
					    	else
					    	{
						    	// notif
						    	tampilkan_notif('danger', data.message);
					    	}
					  	},
					  	error: function(xhr, textStatus, errorThrown) {
					    	//called when there is an error
					    	console.log(errorThrown);
					    	// notif
					    	tampilkan_notif('danger', errorThrown);
					  	}
					})
				// })
		    }
		});
	});
</script>
<script>
	
</script>