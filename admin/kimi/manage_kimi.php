<?php

//////////// CREATE كوداضافة البيانات  في  view////////////////////kimi//////////////
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `kimi` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>



<div class="container-fluid">
	<form action="" id="kimi-form"  enctype="multipart/form-data">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">

		
		<div class="form-group">
			
		
		
		<?php
			echo "<img src='data:image/jpeg;base64," . base64_encode($image) . "' alt='$name'  width='100' height='100'>";?></dd>

</div>
<div class="form-group">
		<label for="image" class="control-label">image</label>
		
			<input type="file" name="image" id="image" class="form-control form-control-sm rounded-0"  required/>
		</div>
		<div class="form-group">
			<label for="name" class="control-label">Name</label>
			<input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo isset($name) ? $name : ''; ?>"  required/>
		</div>

		
		<div class="form-group">
		<label for="name" class="control-label">age</label>
		<input type="text" name="age" id="age" class="form-control form-control-sm rounded-0" value="<?php echo isset($age) ? $age : ''; ?>"  required/>
		
		</div>
		
		
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#kimi-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_kimi",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body, .modal").scrollTop(0)
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>