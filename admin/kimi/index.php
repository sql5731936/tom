



	
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline rounded-0 card-maroon">
	<div class="card-header">
		<h3 class="card-title">قائمة التحصين</h3>
		<div class="card-tools">
		
		</div>
	</div>
	<div class="card-body">
        <div class="container-fluid">
		<table class="table table-hover table-striped table-bordered"  id="payment-histpry-table">
        <colgroup>
            <col width="5%">
            <col width="5%"> <col width="10%">
            <col width="15%"><col width="20%">
            <col width="15%">
            <col width="15%">
            <col width="15%">

        </colgroup>
        <thead>
            <tr class="bg-gradient-primary">
            <th class="text-center">#</th>
                <th class="text-center">#</th>
                <th class="">DateTime Added</th>
                <th class="">Month of</th>
                              <th class="">اسم الجرعة</th>  <th class="">تاريخ الجرعة</th>

                <th class="">اسم الطفل</th>
                <th class="">Action</th>
            </tr>
        </thead>
        <tbody>

        <?php //if(isset($_GET['account_id'])): ?>
        <?php 
					$i = 1;
						$qry = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'-01') as pmonth,d.amount as amount,d.date_updated as date_updated FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id = a.id order by unix_timestamp(date(concat(month_of,'-01'))) asc");
						?>
                        
                        <?php while($row = $qry->fetch_assoc()):
					?>
						<tr>
							
							



                        <td class="text-center"><?= $i++ ?></td>
							<td ><?php echo $row['date_updated'] ?></td>
						
							<td><?= $row['code'] ?></td>
                            <td><?= date("M d, Y h:i A", strtotime($row['date_created'])) ?></td>
                      <td class="text-rigth"><?= format_num($row['amount'], 2) ?></td>	
                      <td><?= date("F, Y", strtotime($row['pmonth'])) ?></td>
                  
                    <td ><?= $row['student'] ?></td>
							
							
                    <td align="center">
								 <button type="button" class="btn btn-flat p-1 btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item view_data" href="./?page=kimi/view_details&id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-print"></span> عرض البيانات</a>
				                
							</td>
							
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
			_conf("Are you sure to delete this account permanently?","delete_account",[$(this).attr('data-id')])
		})
		$('.table').dataTable({
			columnDefs: [
					{ orderable: false, targets: [5] }
			],
			order:[0,'asc']
		});
		$('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
	})
	function delete_account($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_account",
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
