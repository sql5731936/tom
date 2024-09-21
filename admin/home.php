<h1> <?php echo $_settings->userdata('username') ?>مرحبــــــاٌ بــ    </h1>
<hr>
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-red elevation-1"><i class="fas fa-book"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">سجل الاطفال الذي يتم تحصينهم </span>
          <span class="info-box-number text-right">
            <?php 
              $dorm = $conn->query("SELECT * FROM payment_list where `delete_flag` = 0 and `status` = 1")->num_rows;
              echo format_num($dorm);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>


    <!-- /.col -->










   








    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">  الاطفال  في سجل التحصين </span>
          <span class="info-box-number text-right">
            <?php 
              $room = $conn->query("SELECT * FROM account_list where `delete_flag` = 0 and `status` = 1")->num_rows;
              echo format_num($room);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-red elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">عدد الاطفال الموالد</span>
          <span class="info-box-number text-right">
            <?php 
              $students = $conn->query("SELECT * FROM student_list where `delete_flag` = 0 ")->num_rows;
              echo format_num($students);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
     










    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-file"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"> سجل الاطفال الذي تم تطعيمهم</span>
          <span class="info-box-number text-right">
            <?php 
              $account = $conn->query("SELECT id FROM account_list where `delete_flag` = 0 and `status` = 1 ")->fetch_array()[0];
              echo format_num($account);
            ?>
            <?php ?>
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-child"></i></span>
        <div class="info-box-content">
       <a href="http://localhost/dms/admin/?page=alis" class="nav-link nav-rooms">
 
          <span class="info-box-number text-right">
          <span class="info-box-text"> موقع التحصين</span>
        
           





  <p>
القاح
  </p> 
</a>
</li>

          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
