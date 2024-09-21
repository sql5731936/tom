<style>
  aside.main-sidebar{
    background-image:url('<?= validate_image("uploads/default/133.jpg") ?>') !important;
    background-repeat:no-repeat;
    background-size:cover;
    background-position:center center;
  }
</style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-maroon elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>admin" class="brand-link bg-gradient-maroon text-sm text-light">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 1.5rem;height: 1.5rem;max-height: unset">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-1">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
               
                   
                   <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> 
                    <li class="nav-header">البيانات</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=students" class="nav-link nav-students">
                      <?php if($_settings->userdata('type') == 1): ?>
                       
                        <p>
                         ادخال طفل جديد
                        </p> <i class="nav-icon fas fa-users"></i>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=accounts" class="nav-link nav-accounts">
                     
                        <p>
                          تحصين
                        </p>   <i class="nav-icon fas fa-user"></i>
                      </a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=kimi" class="nav-link nav-kimi">
                      
                        <p>
                          عرض التحصين
                        </p>  <i class="nav-icon fas fa-hospital"></i>
                      </a>
                    </li>
                    <li class="nav-header">السجلات</li>
                    <li class="nav-item dropdown">
                    <?php if($_settings->userdata('type') == 1): ?>
                      <a href="<?php echo base_url ?>admin/?page=alis" class="nav-link nav-kimi">

                 
                        <p>
                       مواقع التحصين
                        </p>       <i class="nav-icon far fa-circle"></i>
                      </a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-header">جرع اللقاح</li>
                    <li class="nav-item dropdown">
                    <?php if($_settings->userdata('type') == 1): ?>
                      <a href="<?php echo base_url ?>admin/?page=dorms" class="nav-link nav-dorms">
                  
                        <p>
                         الجرع
                        </p>      <i class="nav-icon fas fa-building"></i>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=rooms" class="nav-link nav-rooms">
                       
                        <p>
                   القاح
                        </p> <i class="nav-icon fas fa-door-closed"></i>
                      </a>
                    </li>
                    <?php endif; ?>
                 
                    <li class="nav-header">الاعدادات</li>
                      <?php if($_settings->userdata('type') == 1): ?>
                         <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                     
                        <p>
                        المستخدم 
                        </p>   <i class="nav-icon fas fa-users-cog"></i>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                     
                        <p>
                        الضبط
                        </p>   <i class="nav-icon fas fa-tools"></i>
                      </a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </nav>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.replace(/\//g,'_');
      console.log(page)

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
      $('.nav-link.active').addClass('bg-gradient-maroon')
    })
  </script>