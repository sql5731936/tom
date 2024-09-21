<?php

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `payment_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="container-fluid">
	<form action="" id="payment-form">
		<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
		<input type="hidden" name ="account_id" value="<?php echo isset($account_id) ? $account_id : (isset($_GET['account_id']) ? $_GET['account_id'] : '') ?>">
		<div class="form-group">
			<label for="month_of" class="control-label">تمهيدي</label>
			<input type="month_of" name="month_of" id="" class="form-control form-control-sm rounded-0" value="<?php echo isset($month_of) ? $month_of : ''; ?>"  required placeholder="YYYY-MM"/>
		</div>
		<div class="row">

		
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">

							
							<label for="bb" class="control-label">الزيارة الثانية</label>
							<input type="month" name="bb" id="bb" class="form-control form-control-sm rounded-0" value="<?php echo isset($bb) ? $bb : ''; ?>"  required placeholder="YYYY-MM"/>
	<?php /*
										<select type="text" name="الثانية" id="الثانية" class="form-control form-control-sm rounded-0" >
										<option value=" " <?= isset($الثانية) && $الثانية == '' ? 'selected' : '' ?>></option>
							            <option value="لا" <?= isset($الثانية) && $الثانية == 'لا' ? 'selected' : '' ?>>لا</option>
										<option value="نعم" <?= isset($الثانية) && $الثانية == 'نعم' ? 'selected' : '' ?>>نعم</option>
										</select>
							*/?></div>
						</div>
						
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="aa" class="control-label">الزيارة الاولى</label>
								<input type="month" name="aa" id="aa" class="form-control form-control-sm rounded-0" value="<?php echo isset($aa) ? $aa : ''; ?>"  required placeholder="YYYY-MM"/>
	<?php /*

								<?php /*<select type="text" name="الأولى" id="الأولى" class="form-control form-control-sm rounded-0" >
										<option value=" " <?= isset($الأولى) && $الأولى == '' ? 'selected' : '' ?>></option>
							            <option value="لا" <?= isset($الأولى) && $الأولى == 'لا' ? 'selected' : '' ?>>لا</option>
										<option value="نعم" <?= isset($الأولى) && $الأولى == 'نعم' ? 'selected' : '' ?>>نعم</option>
										</select>
										*/?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="dd" class="control-label"> الزيارةالرابعة</label>
								<input type="month" name="dd" id="dd" class="form-control form-control-sm rounded-0" value="<?php echo isset($dd) ? $dd : ''; ?>"  required placeholder="YYYY-MM"/>

								<?php /*	<select type="text" name="الرابعة" id="الرابعة" class="form-control form-control-sm rounded-0" >
										<option value=" " <?= isset($الرابعة) && $الرابعة == '' ? 'selected' : '' ?>></option>
							            <option value="لا" <?= isset($الرابعة) && $الرابعة == 'لا' ? 'selected' : '' ?>>لا</option>
										<option value="نعم" <?= isset($الرابعة) && $الرابعة == 'نعم' ? 'selected' : '' ?>>نعم</option>
										</select>
										*/?>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="cc" class="control-label">الزيارة الثالثة</label>

								<input type="month" name="cc" id="cc" class="form-control form-control-sm rounded-0" value="<?php echo isset($cc) ? $cc : ''; ?>"  required placeholder="YYYY-MM"/>

								<?php /*
								<select type="text" name="الثالثة" id="الثالثة" class="form-control form-control-sm rounded-0" >
										<option value=" " <?= isset($الثالثة) && $الثالثة == '' ? 'selected' : '' ?>></option>
							            <option value="لا" <?= isset($الثالثة) && $الثالثة == 'لا' ? 'selected' : '' ?>>لا</option>
										<option value="نعم" <?= isset($الثالثة) && $الثالثة == 'نعم' ? 'selected' : '' ?>>نعم</option>
										</select>
										*/?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="ff" class="control-label">الزيارة السادسة</label>

								<input type="month" name="ff" id="ff" class="form-control form-control-sm rounded-0" value="<?php echo isset($ff) ? $ff : ''; ?>"  required placeholder="YYYY-MM"/>
								<?php /*
								<select type="text" name="السادسة" id="السادسة" class="form-control form-control-sm rounded-0" >
										<option value=" " <?= isset($السادسة) && $السادسة == '' ? 'selected' : '' ?>></option>
							            <option value="لا" <?= isset($السادسة) && $السادسة == 'لا' ? 'selected' : '' ?>>لا</option>
										<option value="نعم" <?= isset($السادسة) && $السادسة == 'نعم' ? 'selected' : '' ?>>نعم</option>
										</select>
										*/?>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label for="ee" class="control-label">الزيارة الخامسة</label>
								<input type="month" name="ee" id="ee" class="form-control form-control-sm rounded-0" value="<?php echo isset($ee) ? $ee : ''; ?>"  required placeholder="YYYY-MM"/>
							
								<?php /*
								<select type="text" name="الخامسة" id="الخامسة" class="form-control form-control-sm rounded-0" >
										<option value=" " <?= isset($الخامسة) && $الخامسة == '' ? 'selected' : '' ?>></option>
							            <option value="لا" <?= isset($الخامسة) && $الخامسة == 'لا' ? 'selected' : '' ?>>لا</option>
										<option value="نعم" <?= isset($الخامسة) && $الخامسة == 'نعم' ? 'selected' : '' ?>>نعم</option>
										</select>
										*/?>
							</div>
						</div>
					</div>





		















		
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#uni_modal').on('shown.bs.modal', function(e){
			end_loader()
		})
		$('#uni_modal').on('hidden.bs.modal', function(e){
			if('<?= isset($account_id) ?>' == 1 && $('#payment-form').length > 0 && $('#payment-form').find('[name="id"]').val() != ""){
				uni_modal("<i class='fa fa-money-check-alt'></i> تحصين الطفل", "accounts/payment_history.php?account_id=<?= isset($account_id) ? $account_id : '' ?>", 'modal-lg')
				e.preventDefault()
			}
		})
		$('#payment-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_payment",
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
						alert_toast(resp.msg, resp.status)
						$('#uni_modal').on('hidden.bs.modal', function(){
							if($('#payment-form').length > 0 ){
								uni_modal("<i class='fa fa-money-check-alt'></i> تحصين الطفل", "accounts/payment_history.php?account_id=<?= isset($account_id) ? $account_id : (isset($_GET['account_id']) ? $_GET['account_id'] : '') ?>", 'modal-lg')
							}
						})
						$('.modal').modal('hide')
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
