<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'-01') as pmonth,d.amount as amount,d.date_updated as date_updated FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id = a.id order by unix_timestamp(date(concat(month_of,'-01'))) asc");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
		if(isset($student_id)){
			$students = $conn->query("SELECT *,code as student_code, concat(firstname, ' ', coalesce(concat(middlename, ' '), ''), lastname) as `name` from `student_list` where id = '{$student_id}' ");
			if($students->num_rows > 0){
				foreach($students->fetch_array() as $k => $v){
					if(!is_numeric($k) && !isset($$k)){
						$$k = $v;
					}
				}
			}}
		}
		
	
}
?>


<div class="card card-outline rounded-0 card-maroon">
	<div class="card-header">
		<h3 class="card-title">عرض التحصين</h3>
		<div class="card-tools">

       
        <a class="dropdown-item view_data" href="./?page=accounts/print&id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                   
			<a href="./?page=accounts/manage_account" id="create_new" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
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
                <th class="">تاريخ الجرعة</th>
                <th class="">اسم الجرعة</th>
                <th class="">اسم الطفل</th>
                <th class="">Action</th>
            </tr>
        </thead>
        <tbody>

        <?php if(isset($_GET['id'])): ?>
        <?php 
					$i = 1;
						$qry = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'-01') as pmonth,d.amount as amount,d.date_updated as date_updated FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id =  '{$_GET['id']}' order by unix_timestamp(date(concat(month_of,'-01'))) asc");
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
				                    <a class="dropdown-item view_data" href="./?page=accounts/view_details&id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item edit_data" href="./?page=accounts/manage_account&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
							
						</tr>
					<?php endwhile; ?>

					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
    <div class="card-footer py-1 text-center">
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="./?page=accounts"><i class="fa fa-angle-left"></i> Cancel</a>
			</div>
		</div>
</div>
