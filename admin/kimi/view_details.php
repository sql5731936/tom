



<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'') as pmonth,d.amount as amount,d.date_updated as date_updated, d.date_created as date_created FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id = a.id order by unix_timestamp(date(concat(month_of,''))) asc");
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

    $qry = $conn->query("SELECT a.*, r.name as `room`, d.name as `dorm` from `account_list` a inner join `room_list` r on a.room_id = r.id inner join dorm_list d on r.dorm_id = d.id  where a.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
		if(isset($student_id)){
          
			$students = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'') as pmonth,concat(d.aa) as aa,concat(d.bb) as bb,concat(d.cc) as cc,concat(d.dd) as dd,concat(d.ee) as ee,concat(d.ff) as ff,d.amount as amount,d.date_updated as date_updated FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id =  '{$id}' order by unix_timestamp(date(concat(month_of,''))) asc");
            if($students->num_rows > 0){
				foreach($students->fetch_array() as $k => $v){
					if(!is_numeric($k) && !isset($$k)){
						$$k = $v;
					}
				}
			}
		}
    }
}
?>


<div class="card card-outline rounded-0 card-maroon"  style="min-height: 567.854px;background-image:url('../uploads/15.jpg'); 
     
     background-repeat:no-repeat;
    background-size:cover;
    background-position:center center;
   
  
   
   
   ">
	<div class="mx-0 py-5 px-3 mx-ns-4 bg-gradient-maroon">
	<h3><b>بيانات الطفل</b></h3>
</div>
<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
		<div class="card rounded-0 shadow mb-3">
			<div class="card-header">
				<h5 class="card-title font-weight-bolder">معلومات الطفل </h5>
			</div>


				
			<div class="card-body">
				<div class="container-fluid">
					
					
					<fieldset class="border-bottom">
						<legend>بيانات الطفل </legend>
                        
						<form action="" method="post">
      
								
            <input  class="form-control" type="text" name="bcg"style="  text-align: center; width: 50%;margin:0 0 12px 1px;font-size:18px;color:red;font-weight: bold;" value=" رقم البطاقة :  ',<?php echo isset($student_code) ? $student_code : ''; ?>"> 
             
             
                <input  class="form-control" type="text" name="bcg"style="  text-align: center;" value="  الاسم :  <?php echo isset($name) ? $name : ''; ?>       تاريخ الميلاد  :  <?php echo isset($address) ? $address : ''; ?>           المحافظة : <?php echo isset($emergency_relation) ? $emergency_relation : ''; ?>"> 
             </div>
            </div>
			<div class="card-body">
        <div class="container-fluid">
		
		
        <table  class=" table-hover table-striped table-bordered" id="payment-histpry-table" font-text="center"  border="2" style="width: 100% ;height: 2%;height: 0%; "; dir="rtl" align="center" >

                <tr  align="center"  style="height: 50px;" class="bg-gradient-primary">
                    <th class="" > اللقاح</th>
                    <th  class=""> الجرعة</th>
                    <th  class=""> تاريخ الجرعات</th>
                    <th  class=""> تاريخ العودة</th>
                </tr>
               
       
    <tr  align="center" >

        <th class="bg-gradient-primary">السل</th>
        <th class=" py-1  bg-gradient-maroon" >
        </th>
<?php /*
           <td><?= date("m/d", strtotime($row['pmonth'])) ?></td>
        <td><?php echo isset(date("",strtotime($pmonth))? $pmonth:'';) ?></td>*/?>
       <td><?php echo isset($pmonth) ? $pmonth : ''; ?></td>
	   <td><?php echo isset($pmonth) ? $pmonth : ''; ?></td>
            
    </tr>
    
    <tr  align="center" >
        
        <th rowspan="4" class="bg-gradient-primary">
            الشلل الفموي
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            التمهيدية
        </th>
		<td><?php echo isset($pmonth) ? $pmonth : ''; ?></td>
	    <td>	بعد الولادة مباشرة   </td>
    </tr>
    <tr  align="center" >
        
        <th class=" py-1  bg-gradient-maroon"> الاولى</th>
        <td><?php echo isset($aa) ? $aa : ''; ?></td>
	
        <td>	في عمر شهر ونص    </td>
    </tr>
    <tr  align="center" >
        
        <th class=" py-1  bg-gradient-maroon" > الثانية</th>
		<td><?php echo isset($bb) ? $bb : ''; ?></td>
        <td>	في عمر شهرين ونص    </td>
    </tr>
    <tr  align="center" >
        
        <th class=" py-1  bg-gradient-maroon" > الثالثة</th>
        <td><?php echo isset($cc) ? $cc : ''; ?></td>
        <td>	في عمر ثلاثةاشهر ونص    </td>
    </tr>
    <tr  align="center" >
        
        <th class="bg-gradient-primary">
             الشلل الحقن
        </th>
        <th class=" py-1  bg-gradient-maroon">
           
        </th>
        <td><?php echo isset($cc) ? $cc : ''; ?></td>
        <td>	  </td>
    </tr>

    <tr  align="center" > 
        <th rowspan="3" class="bg-gradient-primary">
             الخماسي
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            الاولى
        </th>
        <td><?php echo isset($aa) ? $aa : ''; ?></td>
    
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon"> الثانية</th>
        <td><?php echo isset($bb) ? $bb : ''; ?></td>
        <td>	  </td>
   
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثالثة</th>
        <td><?php echo isset($cc) ? $cc : ''; ?></td>
        <td>	  </td>
      
    </tr>


    <tr  align="center" >
        <th rowspan="3" class="bg-gradient-primary">
             المكورات الرئوية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            الاولى
        </th>
	    <td><?php echo isset($aa) ? $aa : ''; ?></td>
        <td>	  </td>
	
      
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثانية</th>
		<td><?php echo isset($bb) ? $bb : ''; ?></td>
        <td>	  </td>
     
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثالثة</th>
        <td><?php echo isset($cc) ? $cc : ''; ?></td>
        <td>	  </td>
       
    </tr>

    <tr  align="center" >
        <th rowspan="2" class="bg-gradient-primary">
              الروتا
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            الاولى
        </th>
        <td><?php echo isset($aa) ? $aa : ''; ?></td>
        <td>	  </td>
    
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثانية</th>
        <td><?php echo isset($bb) ? $bb : ''; ?></td>
        <td>	  </td>
      
    </tr>

    <tr  align="center" >
        <th rowspan="2" class="bg-gradient-primary">
              الحصبة والحصبة الالمانية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            الاولى
        </th>
        <td><?php echo isset($dd) ? $dd : ''; ?></td>
        <td>	في عمر  تسعة اشهر شهر     </td>
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثانية</th>
        <td><?php echo isset($ee) ? $ee : ''; ?></td>
        <td>	في عمر سنة ونص    </td>
    </tr>
    <tr  align="center" >
        <th class="bg-gradient-primary">
              لقاح الشلل تنشيطية
        </th>
        <th class=" py-1  bg-gradient-maroon">
            رابعة فموي
        </th>
		<td><?php echo isset($dd) ? $dd : ''; ?></td>
        <td>	  </td>
   
    </tr>
    <tr  align="center" >
        <th class="bg-gradient-primary">
                فيتامين (أ) 100 الف وحدة دولية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            
        </th>
        <td><?php echo isset($ee) ? $ee : ''; ?></td>
        <td>	  </td>
      
    </tr>
    <tr  align="center" >
        <th class="bg-gradient-primary">
              لقاح الشلل تنشيطية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            خامسة فموي
        </th>
        <td><?php echo isset($ee) ? $ee : ''; ?></td>
        <td>	  </td>
 
    </tr>
    <tr  align="center" >
        <th class="bg-gradient-primary">
                فيتامين (أ) 200 الف وحدة دولية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            
        </th>
        <td><?php echo isset($ee) ? $ee : ''; ?></td>
        <td>	عند دخولة المدرسة   </td>
    </tr>
    
    
    
 
     


						<tr  align="center" >
							  <div class="dropdown-menu" role="menu">
				                     <div class="dropdown-divider"></div>
                    <td  colspan="5"	class="bg-gradient-primary">
								
								 
				                
				                    <a class="dropdown-item edit_data" href="./?page=kimi/print&id=<?php echo isset($id) ? $id : ''; ?>"><span class="fa fa-print text-primary"></span> print</a>
				                    
                               
							</td>
							 </div>
						</tr>

                        <tr  align="center" >
							  <div class="dropdown-menu" role="menu">
				                     <div class="dropdown-divider"></div>
                    <td  colspan="5"	class="bg-gradient-primary">
								
                 
                    <a class="btn btn-light btn-sm  bg-gradient-maroon border rounded-0" href="./?page=kimi"><i class="fa fa-angle-left"></i> Cancel</a>
			       
                               
							</td>
							 </div>
						</tr>
				   </table>
                 
    </form>
    </div>
    </div>

				
				</tbody>
			</table>
		</div>
	</div>
  
		</div>
</div>




























