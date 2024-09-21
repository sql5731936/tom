
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-maroon">
	<div class="card-header">
		<h3 class="card-title">ادخال بيانات الطفل</h3>
		<div class="card-tools">
		<a href="./?page=students/print" class="btn btn-light btn-sm bg-gradient-light rounded-0 border" type="button" id="print"><i class="fa fa-print"></i> Print</a>
		
			<a href="./?page=students/manage_student" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-hover table-striped table-bordered" id="payment-histpry-table" style="width: 100%";>
				<colgroup>
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="12%">
					<col width="8%">
					<col width="18%">
					
					<col width="8%">
					<col width="5%">
				</colgroup>
				<thead>
<tr class="bg-gradient-primary">	
				<tr class="bg-gradient-primary"><th colspan="11"  style="text-align: center;">البيانات الشخصيةللأطفال دون العام</th></tr>
					<tr class="bg-gradient-primary"><th colspan="4"  style="text-align: center;"> العنوان</th>
					<th rowspan="2">رقم التسلسل</th>
					<th rowspan="2">تاريخ الانشاء</th>
					<th rowspan="2">تاريخ الميلاد</th>
					<th rowspan="2">الاسم الثلاثي</th>
					<th rowspan="2">Action</th>
					<th rowspan="2">#</th>
				</tr>	
				
					<tr class="bg-gradient-primary">
						
					
						<th>الهاتف</th>
						<th>الحي\القرية</th>
					
						<th>العزلة</th>
						<th>المديرية</th>
						
</tr>
							
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT *, concat(firstname, ' ', coalesce(concat(middlename,' '), ''), lastname) as `name` from `student_list` where delete_flag = 0 order by `name` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
						
							
							
							<td><?php echo $row['contact'] ?></td>
							<td><?php echo $row['emergency_relation'] ?></td>
							
						
							<td><?php echo $row['emergency_contact'] ?></td>
							<td><?php echo $row['emergency_name'] ?></td>
						<td><?php echo $row['code'] ?></td>
							<td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
							<td><?php echo $row['address'] ?></td>
							<td><?php echo $row['name'] ?></td>
							<td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="./?page=students/view_student&id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="./?page=students/manage_student&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>" data-code="<?php echo $row['code'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>

							<td class="text-center"><?php echo $i++; ?></td>
							
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete Student [<b>"+$(this).attr('data-code')+"</b>] permanently?","delete_student",[$(this).attr('data-id')])
		})
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [7] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_student($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_student",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>