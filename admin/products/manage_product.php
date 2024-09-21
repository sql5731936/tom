<?php

//////////// CREATE كوداضافة البيانات  في  view////////////////////kimi//////////////
require_once('../../config.php');
if(isset($_GET['product_id']) && $_GET['product_id'] > 0){
    $qry = $conn->query("SELECT * from `products` where product_id = '{$_GET['product_id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>



<div class="container-fluid">
<form action="" id="product-form"  enctype="multipart/form-data">
		<input type="hidden" name ="product_id" value="<?php echo isset($product_id) ? $product_id : '' ?>">

		
		<div class="form-group">
			
		
		
		<?php
		////
		//	echo "<img src='data:image/jpeg;base64," . base64_encode($image) . "' alt='$name'  width='100' height='100'>";?></dd>

</div>
<div class="form-group">
		<label for="product_image" class="control-label">product_image</label>
		
			<input type="file" name="product_image" id="product_image" class="form-control form-control-sm rounded-0"  />
		</div>


		<div class="form-group">
		<label for="image" class="control-label">image</label>
		
			<input type="file" name="image" id="image" class="form-control form-control-sm rounded-0"  />
		</div>


		<div class="form-group">
			<label for="name" class="control-label">product_cat</label>
			<input type="text" name="product_cat" id="product_cat" class="form-control form-control-sm rounded-0" value="<?php echo isset($product_cat) ? $product_cat : ''; ?>"  >
		</div>
		<div class="form-group">
			<label for="name" class="control-label">product_brand</label>
			<input type="text" name="product_brand" id="product_brand" class="form-control form-control-sm rounded-0" value="<?php echo isset($product_brand) ? $product_brand : ''; ?>"  >
		</div>
		<div class="form-group">
		<label for="name" class="control-label">product_title</label>
		<input type="text" name="product_title" id="product_title" class="form-control form-control-sm rounded-0" value="<?php echo isset($product_title) ? $product_title : ''; ?>"  >
        </div>
		<div class="form-group">
		<label for="name" class="control-label">product_price</label>
		<input type="text" name="product_price" id="product_price" class="form-control form-control-sm rounded-0" value="<?php echo isset($product_price) ? $product_price : ''; ?>"  >
		</div>
        <div class="form-group">
			<label for="name" class="control-label">product_desc</label>
			<input type="text" name="product_desc" id="product_desc" class="form-control form-control-sm rounded-0" value="<?php echo isset($product_desc) ? $product_desc : ''; ?>"  >
		</div>

		
		
        <div class="form-group">
			<label for="name" class="control-label">product_keywords</label>
			<input type="text" name="product_keywords" id="product_keywords" class="form-control form-control-sm rounded-0" value="<?php echo isset($product_keywords) ? $product_keywords : ''; ?>"  >
		</div>
		

		
		
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#product-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_product",
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