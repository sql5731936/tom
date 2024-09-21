
  <?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php $month = isset($_GET['month']) ? $_GET['month'] : date("Y-m"); ?>
<div class="card card-outline rounded-0 card-maroon">
	<div class="card-header">
		<h3 class="card-title">Monthly Report</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid mb-3">
            <fieldset class="px-2 py-1 border">
                <legend class="w-auto px-3">Filter</legend>
                <div class="container-fluid">
                    <form action="" id="filter-form">
                        <div class="row align-items-end">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="month" class="control-label">Choose Date</label>
                                    <input type="month" class="form-control form-control-sm rounded-0" name="month" id="month" value="<?= $month ?>" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm bg-gradient-maroon rounded-0"><i class="fa fa-filter"></i> Filter</button>
                                    <button class="btn btn-light btn-sm bg-gradient-light rounded-0 border" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
		</div>
        <div class="container-fluid" id="printout">
		<?php

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'') as pmonth,concat(d.aa) as aa,concat(d.bb) as bb,concat(d.cc) as cc,concat(d.dd) as dd,concat(d.ee) as ee,concat(d.ff) as ff,d.amount as amount,d.date_updated as date_updated , d.date_created as date_created FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id = a.id order by unix_timestamp(date(concat(month_of,''))) asc");
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


<div class="card card-outline rounded-0 card-maroon" >
	<div class="card-body">
        <div class="container-fluid">
        <div class="card-body" width="100%" >
				<div class="container-fluid">
					
					
					<fieldset class="border-bottom">
						
                        
						<form action="" method="post">
      
								
            <input   width="100%" class="form-control" type="text" name="bcg"style="  text-align: center; width: 50%;margin:0 0 12px 1px;font-size:18px;color:red;font-weight: bold;" value=" رقم البطاقة :  ',<?php echo isset($student_code) ? $student_code : ''; ?>"> 
             
             
                <input  class="form-control" type="text" name="bcg"style="  text-align: center;" value="  الاسم :  <?php echo isset($name) ? $name : ''; ?>       تاريخ الميلاد  :  <?php echo isset($address) ? $address : ''; ?>           المحافظة : <?php echo isset($emergency_relation) ? $emergency_relation : ''; ?>"> 
             </div>
            </div>
</fieldset>
       
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
        <td>	   </td>
    </tr>

    <tr  align="center" > 
        <th rowspan="3" class="bg-gradient-primary">
             الخماسي
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            الاولى
        </th>
        <td><?php echo isset($aa) ? $aa : ''; ?></td>
	
        <td>	   </td>
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon"> الثانية</th>
        <td><?php echo isset($bb) ? $bb : ''; ?></td>
        <td>	   </td>
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثالثة</th>
        <td><?php echo isset($cc) ? $cc : ''; ?></td>
        <td>	   </td>
    </tr>


    <tr  align="center" >
        <th rowspan="3" class="bg-gradient-primary">
             المكورات الرئوية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            الاولى
        </th>
	    <td><?php echo isset($aa) ? $aa : ''; ?></td>
	
        <td>	   </td>
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثانية</th>
		<td><?php echo isset($bb) ? $bb : ''; ?></td>
        <td>	   </td>
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثالثة</th>
        <td><?php echo isset($cc) ? $cc : ''; ?></td>
        <td>	   </td>
    </tr>

    <tr  align="center" >
        <th rowspan="2" class="bg-gradient-primary">
              الروتا
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            الاولى
        </th>
        <td><?php echo isset($aa) ? $aa : ''; ?></td>
        <td>	   </td>
    </tr>
    <tr  align="center" >
        <th class=" py-1  bg-gradient-maroon" > الثانية</th>
        <td><?php echo isset($bb) ? $bb : ''; ?></td>
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
        <td>	سنة ونص  </td>
    </tr>
    <tr  align="center" >
        <th class="bg-gradient-primary">
              لقاح الشلل تنشيطية
        </th>
        <th class=" py-1  bg-gradient-maroon">
            رابعة فموي
        </th>
		<td><?php echo isset($dd) ? $dd : ''; ?></td>
        <td>    </td>
    </tr>
    <tr  align="center" >
        <th class="bg-gradient-primary">
                فيتامين (أ) 100 الف وحدة دولية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            
        </th>
        <td><?php echo isset($الخامسة) ? $الخامسة : ''; ?></td>
   
    </tr>
    <tr  align="center">
        <th class="bg-gradient-primary">
              لقاح الشلل تنشيطية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            خامسة فموي
        </th>
        <td><?php echo isset($الخامسة) ? $الخامسة : ''; ?></td>
   
    </tr>
    <tr  align="center">
        <th class="bg-gradient-primary">
                فيتامين (أ) 200 الف وحدة دولية
        </th>
        <th class=" py-1  bg-gradient-maroon" >
            
        </th>
        <td><?php echo isset($الخامسة) ? $الخامسة : ''; ?></td>
        <td>	عند دخولة المدرسة   </td>
    </tr>
    
    
    
 
     


					
				   </table>
		</div>
	</div>
   
		</div>
</div>

						</div>
	</div>
</div>
					
			
    
<noscript id="print-header">
    <div>
    <div class="d-flex w-100">
        <div class="col-2 text-center">
            <img style="height:.8in;width:.8in!important;object-fit:cover;object-position:center center" src="<?= validate_image($_settings->info('logo')) ?>" alt="" class="w-100 img-thumbnail rounded-circle">
        </div>
        <div class="col-8 text-center">
            <div style="line-height:1em">
                <h4 class="text-center mb-0"><?= $_settings->info('name') ?></h4>
                <h3 class="text-center mb-0"><b>تحصين الاطفال</b></h3>
                <div class="text-center">لعام</div>
                <h4 class="text-center mb-0"><b><?= date("F, Y", strtotime($month."")) ?></b></h4>
            </div>
        </div>
    </div>
    <hr>
    </div>
</noscript>
<div class="card-footer py-1 text-center">
				<a class="btn btn-light btn-sm bg-gradient-light border rounded-0" href="./?page=kimi"><i class="fa fa-angle-left"></i> Cancel</a>
			</div>
<script>
	$(document).ready(function(){
		$('#filter-form').submit(function(e){
            e.preventDefault()
            location.href = "./?page=students/pop&"+$(this).serialize()
        })
        $('#print').click(function(){
            var h = $('head').clone()
            var ph = $($('noscript#print-header').html()).clone()
            var p = $('#printout').clone()
            h.find('title').text('الجمهورية اليمنية')
            h.append("<style>html, body{ min-height:unset !important }</style>")
            start_loader()
            var nw = window.open("", "_blank", "width="+($(window).width() * .8)+", height="+($(window).height() * .8)+", left="+($(window).width() * .1)+", top="+($(window).height() * .1))
                     nw.document.querySelector('head').innerHTML = h.html()
                     nw.document.querySelector('body').innerHTML = ph.html()
                     nw.document.querySelector('body').innerHTML += p[0].outerHTML
                     nw.document.close()
                     setTimeout(() => {
                         nw.print()
                         setTimeout(() => {
                             nw.close()
                             end_loader()
                         }, 300);
                     }, 300);
        })
	})
	
</script>
































