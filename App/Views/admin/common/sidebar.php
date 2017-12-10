  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header"></li>
        <li id="dashboard-link" class="sidebar-link">
          <a href="<?php echo url('/admin'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li id="users-link" class="sidebar-link">
          <a href="<?php echo url('/admin/users'); ?>">
            <i class="fa fa-user"></i>
            <span>Users</span>
          </a>
        </li>
        <li id="users-groups-link" class="sidebar-link">
          <a href="<?php echo url('/admin/users-groups'); ?>">
            <i class="fa fa-users"></i>
            <span>Users Groups</span>
          </a>
        </li>
        <li id="categories-link" class="sidebar-link">
          <a href="<?php echo url('/admin/categories'); ?>">
            <i class="fa fa-book"></i>
            <span>Categories</span>
          </a>
        </li>
        <li id="posts-link" class="sidebar-link">
          <a href="<?php echo url('/admin/posts'); ?>">
            <i class="fa fa-edit"></i>
            <span>Posts</span>
          </a>
        </li>
        <li id="ads-link" class="sidebar-link">
          <a href="<?php echo url('/admin/ads'); ?>">
            <i class="fa fa-flag"></i>
            <span>Ads</span>
          </a>
        </li>
        <li id="settings-link" class="sidebar-link">
          <a href="<?php echo url('/admin/settings'); ?>">
            <i class="fa fa-cogs"></i>
            <span>Settings</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

