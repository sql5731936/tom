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

		<?php /*<table  class=" table-hover table-striped table-bordered" id="payment-histpry-table" font-text="center"  border="2" style="width: 100% ;height: 2%;height: 0%; "; dir="rtl" align="center" >
*/?>
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
				<tr  style="height: 50px;" class="bg-gradient-primary"><th colspan="9"  style="text-align: center;">البيانات الشخصيةللأطفال دون العام</th></tr>
					<tr  style="height: 50px;" class="bg-gradient-primary"><th colspan="4"  style="text-align: center;"> العنوان</th>
					<th rowspan="2">رقم التسلسل</th>
					<th rowspan="2">تاريخ الانشاء</th>
					<th rowspan="2">تاريخ الميلاد</th>
					<th rowspan="2">الاسم الثلاثي</th>
				
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
						
						<td class="text-center"><?php echo $i++; ?></td>
						
					</tr>
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
                <h4 class="text-center mb-0"><b><?= date("F-Y-d", strtotime($month."-01")) ?></b></h4>
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





























