    <div class="header p-r-0 bg-complete">
      <div class="header-inner header-md-height">
        <a href="#" class="btn-link toggle-sidebar d-lg-none text-white sm-p-l-0 btn-icon-link" data-toggle="horizontal-menu">
          <i class="pg-icon">menu</i>
        </a>
        <div class="">
          <div class="brand inline no-border d-sm-inline-block">
             <img src="<?=base_url()?>assets/images/logo-1.png" alt="logo" data-src="<?=base_url()?>assets/images/logo-1.png" data-src-retina="<?=base_url()?>assets/images/logo-1.png" width="78" height="22">  <<!-- img src="<?=base_url()?>assets/images/logo.png" alt="logo" data-src="<?=base_url()?>assets/images/logo.png" data-src-retina="<?=base_url()?>assets/images/logo.png" style="height: 50px; width: 150px;"> -->
          </div>
        </div>
        <div class="d-flex align-items-center">
          <!-- START User Info-->
          <div class="pull-left p-r-10 fs-14 d-lg-inline-block d-none text-white">
            <span class="semi-bold">My</span> <span class="">Account</span>
          </div>
          <div class="dropdown pull-right d-lg-block">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
              <span class="thumbnail-wrapper d32 circular inline">
						<img src="<?= base_url()?>assets/img/profiles/avatar.jpg" alt="" data-src="<?= base_url()?>assets/img/profiles/avatar.jpg"
							data-src-retina="<?= base_url()?>assets/img/profiles/avatar_small2x.jpg" width="32" height="32">
					</span>
            </button>

            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
              <a href="#" class="dropdown-item"><span>Signed in as <br /><b><?= $_SESSION['employee']->fullname;?></b></span></a>
              <div class="dropdown-divider"></div>
              <a href="<?= URL;?>employee/profile" class="dropdown-item">Your Profile</a>
              <a href="<?= URL;?>employee/change_password" class="dropdown-item">Change Password</a>
              <a href="<?= URL;?>change-car" class="dropdown-item">Change Favorite Car</a>
              <a href="<?= URL?>login/logout" class="dropdown-item">Logout</a>
            </div>
          </div>
          <!-- END User Info-->
        </div>
      </div>
      <div class="bg-white">
        <div class="container">
          <div class="menu-bar header-sm-height" data-pages-init='horizontal-menu' data-hide-extra-li="4">
            <a href="#" class="btn-link header-icon toggle-sidebar d-lg-none" data-toggle="horizontal-menu">
              <i class="pg-icon">close</i>
            </a>
            <?php if($_SESSION['is_admin']):?>
              <ul>
                <li>
                  <a href="<?= URL?>employee/dashboard" class="<?= (isset($dashboard_active)) ? $dashboard_active : '';?>">Dashboard</a>
                </li>
                <li>
                  <a href="<?= URL?>employee/add" class="<?= (isset($add_emp_active)) ? $add_emp_active : '';?>"><span class="title">Add Employee</span></a>
                </li>
                <li>
                  <a href="<?= URL?>employee" class="<?= (isset($employee_active)) ? $employee_active : '';?>" ><span class="title">Employees</span></a>
                </li>
                <li>
                  <a href="<?= URL?>payroll/add" class="<?= (isset($add_payroll_active)) ? $add_payroll_active : '';?>"><span class="title">Add Pays</span></a>
                </li>
                <li>
                  <a href="<?= URL?>payroll" class="<?= (isset($payroll_active)) ? $payroll_active : '';?>" ><span class="title">Payroll Management</span></a>
                </li>
                <li>
                  <a href="<?= URL?>payroll/payroll_month" class="<?= (isset($payroll_month_active)) ? $payroll_month_active : '';?>"><span class="title">Pay month</span></a>
                </li>
                <li>
                  <a href="<?= URL?>contactus" class="<?= (isset($contactus_active)) ? $contactus_active : '';?>"><span class="title">Contact Us</span></a>
                </li>
              </ul>
            <?php else:?>
              <ul>
                <li>
                  <a href="<?= URL?>employee/dashboard" class="<?= (isset($dashboard_active)) ? $dashboard_active : '';?>">Dashboard</a>
                </li>
                <li>
                  <a href="<?= URL?>payroll" class="<?= (isset($payroll_active)) ? $payroll_active : '';?>" ><span class="title">My Pay</span></a>
                </li>
                <li>
                  <a href="<?= URL?>contactus/add" class="<?= (isset($contactus_active)) ? $contactus_active : '';?>"><span class="title">Contact Us</span></a>
                </li>
                <li>
                  <a href="<?= URL?>hr-documents" class="<?= (isset($hr_doc_active)) ? $hr_doc_active : '';?>"><span class="title">HR Document</span></a>
                </li>
              </ul>
            <?php endif;?>
            <!-- <a href="#" class="search-link d-flex justify-content-between align-items-center d-lg-none" data-toggle="search">Tap here to search <i class="pg-search float-right"></i></a> -->
          </div>
        </div>
      </div>
    </div>