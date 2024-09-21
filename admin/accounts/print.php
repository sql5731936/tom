











































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
        <table class="table table-hover table-striped table-bordered" id="list"  border="2" align="l"  valign="middle" aling="center" style="font-size:0.7cqb;">
		<table  class=" table-hover table-striped table-bordered" id="payment-histpry-table" font-text="center"  border="2" style="width: 100% ;height: 2%;height: 0%; "; dir="ltr" align="center" >

		
		<colgroup >
					
					
                    
				</colgroup>
				<thead>

				
			
			<tr class="bg-gradient-primary">
	<th colspan="24"  style="text-align: center;">البيانات الشخصيةللأطفال دون العام</th></tr>
	<tr class="bg-gradient-primary">	<th colspan="1"  style="text-align: center;"> الشلل</th>
	<th colspan="1"  style="text-align: center;"> فيتامين</th>

	
	<th rowspan="2"  style="text-align: center;"> الحصبة الالمانية</th>
	
	<th colspan="2"  style="text-align: center;"> الروتا</th>
	
		<th colspan="3"  style="text-align: center;"> المكورات الرئوية</th>
		<th colspan="3"  style="text-align: center;"> الخماسي</th>
		
		<th colspan="5"  style="text-align: center;"> الشلل</th>
		
		
     
		<th rowspan="3"  style="text-align: center;"> السل</th>

<th rowspan="3"  style="text-align: center;">  الاسم الرباعي</th>
<th rowspan="3"  style="text-align: center;"> الكود</th>

	

			
			<tr class="bg-gradient-primary">
			
		

		

		<th rowspan="" >رابعة</th>
		<th rowspan="" >أ</th>
		<th rowspan="2" >الثانية</th>
		<th rowspan="2" >الأولى</th>
<th rowspan="2"  style="text-align: center;">الثالثة</th>

		<th rowspan="2"  style="text-align: center;">الثانية</th>
			<th rowspan="2"  style="text-align: center;">الأولى</th>
			<th rowspan="2"  style="text-align: center;">الثالثة</th>

<th rowspan="2"  style="text-align: center;">الثانية</th>
	<th rowspan="2"  style="text-align: center;">الأولى</th>
		<th rowspan="2"  style="text-align: center;"> شلل حقن</th>
		<th rowspan=""  style="text-align: center;">فموي</th>

<th rowspan=""  style="text-align: center;">فموي</th>
	<th rowspan=""  style="text-align: center;">فموي</th>
	<th rowspan=""  style="text-align: center;">فموي</th>



<tr class="bg-gradient-primary">
		



		
	
			<th rowspan=""  style="text-align: center;">فموي</th>
		
		

				<th rowspan=""  style="text-align: center;">الف وحدة100</th>
				<th rowspan=""  style="text-align: center;">الأولى</th>
				<th rowspan=""  style="text-align: center;">الثالثة</th>
				<th rowspan=""  style="text-align: center;">الثانية</th>
					<th rowspan=""  style="text-align: center;">الأولى</th>
					<th rowspan=""  style="text-align: center;">تمهيدي</th></tr>

			
		
			
					
			

</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'-01') as pmonth,concat(d.aa) as aa,concat(d.bb) as bb,concat(d.cc) as cc,concat(d.dd) as dd,concat(d.ee) as ee,concat(d.ff) as ff,d.amount as amount,d.date_updated as date_updated, d.date_created as date_created FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id = a.id order by unix_timestamp(date(concat(month_of,'-01'))) asc");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
						<td class="text-center"><?= $row['ff'] ?></td>
							<td class="text-center"><?= $row['ee'] ?></td>
							<td class="text-center"><?= $row['dd'] ?></td>
							<td class="text-center"><?= $row['bb'] ?></td>
							<td class="text-center"><?= $row['aa'] ?></td>
							
						
							<td class="text-center"><?= $row['cc'] ?></td>


							<td class="text-center"><?= $row['bb'] ?></td>
							<td class="text-center"><?= $row['aa'] ?></td>
							<td class="text-center"><?= $row['cc'] ?></td>
							<td class="text-center"><?= $row['bb'] ?></td>
							<td class="text-center"><?= $row['aa'] ?></td>
						
							<td class="text-center"><?= $row['cc'] ?></td>


							<td class="text-center"><?= $row['cc'] ?></td>
							<td class="text-center"><?= $row['bb'] ?></td>
							<td class="text-center"><?= $row['aa'] ?></td>
							<td class="text-center"><?= $row['pmonth'] ?></td>
							<td class="text-center"><?= $row['pmonth'] ?></td>
						

							<td>
								<div style="line-height:1em">
									<div><?= $row['student'] ?></div>
									
								</div>
							</td>
							<td><?php echo $row['student_code'] ?></td>
						
						</tr></tr>
					<?php endwhile; ?>
				</tbody>
			</table>


		
			<table class="table table-hover table-striped table-bordered" id="list"  border="2" align="l"  valign="middle" aling="center" style="font-size:0.7cqb;">
		<table  class=" table-hover table-striped table-bordered" id="payment-histpry-table" font-text="center"  border="2" style="width: 100% ;height: 2%;height: 0%; "; dir="ltr" align="center" >		<colgroup>
					
					
                    
				</colgroup>
				<thead>

			
			
			<tr class="bg-gradient-primary">
	<th colspan="24"  style="text-align: center;">البيانات الشخصيةللأطفال فوق العام </th></tr>
		<tr class="bg-gradient-primary">	<th colspan="2"  style="text-align: center;"> الشلل</th>
	<th colspan="1"  style="text-align: center;"> فيتامين</th>

	
	<th rowspan="2" colspan="2"   style="text-align: center;"> الحصبة الالمانية</th>
	
	<th colspan="2"  style="text-align: center;"> جرعةتنشيطية</th>
	
		<th colspan="3"  style="text-align: center;"> المكورات الرئوية</th>
		<th colspan="3"  style="text-align: center;"> الخماسي</th>
		
		<th colspan="4"  style="text-align: center;"> الشلل</th>
		
		
     
<th rowspan="3"  style="text-align: center;"> الاسم</th>
<th rowspan="3"  style="text-align: center;"> الكود</th>

	

			
			<tr class="bg-gradient-primary">
			
		

			<th rowspan="" >فموي</th>
		<th rowspan="" >فموي</th>
		
		<th rowspan="" >أ</th>
		<th rowspan="" >tr</th>
		<th rowspan="" >td</th>
<th rowspan="2"  style="text-align: center;">الثالثة</th>

		<th rowspan="2"  style="text-align: center;">الثانية</th>
			<th rowspan="2"  style="text-align: center;">الأولى</th>
			<th rowspan="2"  style="text-align: center;">الثالثة</th>

<th rowspan="2"  style="text-align: center;">الثانية</th>
	<th rowspan="2"  style="text-align: center;">الأولى</th>
		<th rowspan="2"  style="text-align: center;"> شلل حقن</th>
	

<th rowspan=""  style="text-align: center;">فموي</th>
	<th rowspan=""  style="text-align: center;">فموي</th>
	<th rowspan=""  style="text-align: center;">فموي</th>



<tr class="bg-gradient-primary">
		



		
	
			<th rowspan=""  style="text-align: center;">خامسة</th>
		
			<th rowspan=""  style="text-align: center;">رابعة</th>

				<th rowspan=""  style="text-align: center;">الف وحدة100</th>
				<th rowspan=""  style="text-align: center;">الثانية</th>
				<th rowspan=""  style="text-align: center;">الأولى</th>
				<th rowspan=""  style="text-align: center;">فوق السنة</th>
				<th rowspan=""  style="text-align: center;">فوق الخمس</th>
				<th rowspan=""  style="text-align: center;">الثالثة</th>
				<th rowspan=""  style="text-align: center;">الثانية</th>
					<th rowspan=""  style="text-align: center;">الأولى</th>
					</tr>

			
		
			
					
			

</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					$qry = $conn->query("SELECT a.*, s.code as student_code, concat(s.firstname, ' ', coalesce(concat(s.middlename,' '), ''), s.lastname) as `student`,concat(d.month_of,'-01') as pmonth,concat(d.aa) as aa,concat(d.bb) as bb,concat(d.cc) as cc,concat(d.dd) as dd,concat(d.ee) as ee,concat(d.ff) as ff,d.amount as amount,d.date_updated as date_updated, d.date_created as date_created FROM `account_list` a inner join student_list s on a.student_id = s.id  inner join `payment_list` d on d.account_id = a.id where d.account_id = a.id order by unix_timestamp(date(concat(month_of,'-01'))) asc");
					while($row = $qry->fetch_assoc()):
					?>
						<tr>
						<td class="text-center"><?= $row['ff'] ?></td>
							<td class="text-center"><?= $row['ee'] ?></td>
							<td class="text-center"><?= $row['dd'] ?></td>
							<td class="text-center"><?= $row['bb'] ?></td>
							<td class="text-center"><?= $row['aa'] ?></td>
							
						
							<td class="text-center"><?= $row['cc'] ?></td>


							<td class="text-center"><?= $row['bb'] ?></td>
							<td class="text-center"><?= $row['aa'] ?></td>
							<td class="text-center"><?= $row['cc'] ?></td>
							<td class="text-center"><?= $row['bb'] ?></td>
							<td class="text-center"><?= $row['aa'] ?></td>
						
							<td class="text-center"><?= $row['cc'] ?></td>


							<td class="text-center"><?= $row['cc'] ?></td>
							<td class="text-center"><?= $row['bb'] ?></td>
							<td class="text-center"><?= $row['aa'] ?></td>
							<td class="text-center"><?= $row['pmonth'] ?></td>
							<td class="text-center"><?= $row['pmonth'] ?></td>
						

							<td>
								<div style="line-height:1em">
									<div><?= $row['student'] ?></div>
									
								</div>
							</td>
							<td><?php echo $row['student_code'] ?></td>
							
						</tr></tr>
					<?php endwhile; ?>
				</tbody>
			</table>






			
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
                <h4 class="text-center mb-0"><b><?= date("F, Y", strtotime($month."-01")) ?></b></h4>
            </div>
        </div>
    </div>
    <hr>
    </div>
</noscript>
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
































