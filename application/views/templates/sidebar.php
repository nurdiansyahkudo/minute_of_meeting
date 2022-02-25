 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <!-- <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-tools"></i>
  </div> -->
  <div class="sidebar-brand-text mx-3">Minutes<sup>of</sup>Meetings</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->

<?php if($title == 'Dashboard' ): ?>
    <li class="nav-item active">
  <?php else : ?>
    <li class="nav-item">
<?php endif; ?>

  <a class="nav-link" href="<?= base_url('MoM/dashboard'); ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Heading -->
<div class="sidebar-heading">
  Menu :
</div>


<!-- Nav Item - MoM -->
<?php if($title == 'MoM'): ?>
  <li class="nav-item active">
    <?php else: ?>
  <li class="nav-item">
<?php endif; ?>
  <a class="nav-link" href="<?= base_url('MoM');?>">
  <i class="far fa-newspaper"></i>
    <span>MoM</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
  <i class="fas fa-sign-out-alt"></i>
    <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

