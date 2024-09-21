<?php
////////////كودالعرض للبيانات في الاكشن view////////////////////kimi//////////////

require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `kimi` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
	<dl>  <dt class="text-muted">image</dt>
        <dd class="pl-4">
    <?php
        echo "<img src='data:image/jpeg;base64," . base64_encode($image) . "' alt='$name'  width='100' height='100'>";?></dd>
        <dt class="text-muted">Name</dt>
        <dd class="pl-4"><?= isset($name) ? $name : "" ?></dd>
        <dt class="text-muted">age</dt>
        <dd class="pl-4"><?= isset($age) ? $age : "" ?></dd>
     
      
        <dt class="text-muted">Status</dt>
        <dd class="pl-4">
            <?php //if($status == 1): ?>
                <span class="badge badge-maroon bg-gradient-maroon px-3 rounded-pill">Active</span>
            <?php //else: ?>
                <span class="badge badge-light bg-gradient-light border text-dark px-3 rounded-pill">Inactive</span>
            <?php //endif; ?>
        </dd>
    </dl>
    <div class="clear-fix my-3"></div>
    <div class="text-right">
        <button class="btn btn-sm btn-dark bg-gradient-dark btn-flat" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>