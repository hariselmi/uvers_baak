<header class="main-header">
    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <?php if(!empty(setting('fevicon_path'))): ?>
        <img src="<?php echo e(asset(\Storage::url(setting('fevicon_path')))); ?>" alt="" height="40px" width="40px">
        <?php else: ?>
        
        <?php endif; ?>

      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
          <?php if(!empty(setting('logo_path'))): ?>
        <img src="<?php echo e(asset(\Storage::url(setting('logo_path')))); ?>" alt="" height="40px">
        <?php else: ?>
        <img src="<?php echo e(asset('images/logo_uvers.png')); ?>" alt="" height="40px">
        <?php endif; ?>        
        </span>

    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <?php if(Auth::guest()): ?>
			<li><a href="<?php echo e(url('/login')); ?>"><?php echo e(__('Login')); ?></a></li>
    <?php else: ?>
        <?php if(auth()->user()->checkSpPermission('sales.create')): ?>
          <li class="<?php echo e((Request::is('sales/create')) ? 'active' : ''); ?>">
              <a href="<?php echo e(url('sales/create')); ?>"><strong><i class="fa fa-file-text-o"></i> <?php echo e(__('POS/Create Sale/Invoice')); ?></strong></a>
          </li>
        <?php endif; ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo e(asset('dist/img/avatar.png')); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo e(asset('dist/img/avatar.png')); ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo e(Auth::user()->name); ?>

                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a data-replace='#editEmployee' href="#editEmployeeModal" data-ajax-url="<?php echo e(route('employees.edit', Auth::user()->id)); ?>" data-toggle="modal" class="btn btn-info"><?php echo e(__('Profile')); ?></a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-warning"><?php echo e(trans('menu.logout')); ?></a>
                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo e(csrf_field()); ?>

                  </form>
                </div>
              </li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </header>
  <div class="modal fade sub-modal" id="editEmployeeModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="editEmployee"></div>
    </div>
  </div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/partials/navbar.blade.php ENDPATH**/ ?>