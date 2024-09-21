




						<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `student_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-maroon">
	<h3><b><?= isset($id) ? "تعديل بيانات الطفل" : "تسجيل الطفل" ?></b></h3>
</div>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
		<div class="card rounded-0 shadow">
			<div class="card-body">
				<div class="container-fluid">
					<form action="" id="student-form">
						<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
						<label for="code" class="control-label">ID/Code</label>
										<input type="text" name="code" id="code" class="form-control form-control-sm rounded-0" value="<?php echo isset($code) ? $code : ''; ?>"  required/>
									</div>
								</div>
							</div>
							
								
							</div>
						</fieldset>
						<fieldset class="border-bottom">
							<legend>بيانات الطفل</legend>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
									<label for="lastname" class="control-label">القب</label>
										<input type="text" name="lastname" id="lastname" class="form-control form-control-sm rounded-0" value="<?php echo isset($lastname) ? $lastname : ''; ?>"  placeholder="القب">
										</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="middlename" class="control-label">الاب</label>
										<input type="text" name="middlename" id="middlename" class="form-control form-control-sm rounded-0" value="<?php echo isset($middlename) ? $middlename : ''; ?>"  placeholder="الاب"/>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">

									<label for="firstname" class="control-label">الاسم</label>
										<input type="text" name="firstname" id="firstname" class="form-control form-control-sm rounded-0" value="<?php echo isset($firstname) ? $firstname : ''; ?>"  placeholder="الاسم">
								
										</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="gender" class="control-label">الجنس</label>
										<select type="text" name="gender" id="gender" class="form-control form-control-sm rounded-0" required>
											<option value="Male" <?= isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
											<option value="Female" <?= isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="contact" class="control-label">الهاتف</label>
										<input type="text" name="contact" id="contact" class="form-control form-control-sm rounded-0" value="<?php echo isset($contact) ? $contact : ''; ?>"  placeholder="تلفون">
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="email" class="control-label">Email</label>
										<input type="email" name="email" id="email" class="form-control form-control-sm rounded-0" value="<?php echo isset($email) ? $email : ''; ?>"  placeholder="gmeil">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="address" class="control-label">تاريخ الميلاد</label>

										<input type="month" name="address" id="address" class="form-control form-control-sm rounded-0" value="<?php echo isset($address) ? $address : ''; ?>"  placeholder="تاريخ الميلاد">
								
									
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset class="border-bottom">
							<legend>معلومات الطفل</legend>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="emergency_name" class="control-label">المديرية</label>
										<input type="text" name="emergency_name" id="emergency_name" class="form-control form-control-sm rounded-0" value="<?php echo isset($emergency_name) ? $emergency_name : ''; ?>" placeholder="المديرية">
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="emergency_contact" class="control-label">العزلة</label>
										<input type="text" name="emergency_contact" id="emergency_contact" class="form-control form-control-sm rounded-0" value="<?php echo isset($emergency_contact) ? $emergency_contact : ''; ?>"  placeholder="العزلة">
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="emergency_relation" class="control-label">الحي \القرية</label>
										<input type="text" name="emergency_relation" id="emergency_relation" class="form-control form-control-sm rounded-0" value="<?php echo isset($emergency_relation) ? $emergency_relation : ''; ?>" placeholder="الحي/القرية">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-group">
										<label for="emergency_address" class="control-label">Address</label>
										<textarea rows="3" name="emergency_address" id="emergency_address" class="form-control form-control-sm rounded-0" placeholder="العنوان"><?= isset($emergency_address) ? $emergency_address : '' ?></textarea>
									</div>
								</div>
							</div>
						</fieldset>
						
					</form>
				</div>
			</div>	
			<div class="card-footer py-1 text-center">
				<button class="btn btn btn-flat btn-primary btn-sm" form="student-form"><i class="fa fa-save"></i> Save</button>
				<a class="btn btn btn-flat btn-light bg-gradient-light border text-dark btn-sm" href="./?page=students"><i class="fa fa-angle-left"></i> Cancel</a>
			</div>
		</div>	
	</div>	
</div>	

<script>
	$(document).ready(function(){
		$('#student-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_student",
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
						location.replace('./?page=students/view_student&id='+resp.sid)
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