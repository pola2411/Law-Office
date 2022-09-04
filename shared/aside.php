<?php


?>

<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="/layer_company/">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <?php if($_SESSION['role']==0||$_SESSION['role']==1){ ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>LAWYERS</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/layer_company/lawyers/add.php">
            <i class="bi bi-circle"></i><span>ADD LAWYERS</span>
          </a>
        </li>
        <li>
          <a href="/layer_company/lawyers/list.php">
            <i class="bi bi-circle"></i><span>LIST LAWYERS</span>
          </a>
        </li>


      </ul>
    </li><!-- End Forms Nav -->
    <?php }?>
    <?php if($_SESSION['role']==0){ ?>
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-admin" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>ADMINS</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/layer_company/admin/add.php">
            <i class="bi bi-circle"></i><span>ADD admin</span>
          </a>
        </li>
        <li>
          <a href="/layer_company/admin/list.php">
            <i class="bi bi-circle"></i><span>LIST admin</span>
          </a>
        </li>


      </ul>
    </li><!-- End Forms Nav -->
<?php }?>
<?php if($_SESSION['role']==0||$_SESSION['role']==2){ ?>
    
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>ARTICALES</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/layer_company/articales/add.php">
            <i class="bi bi-circle"></i><span>ADD ARTICALES</span>
          </a>
        </li>
        <li>
          <a href="/layer_company/articales/list.php">
            <i class="bi bi-circle"></i><span>LIST ARTICALES</span>
          </a>
        </li>

      </ul>
    </li><!-- End Charts Nav -->

<?php }?>
<?php if($_SESSION['role']==0||$_SESSION['role']==1){ ?>
    
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-c" data-bs-toggle="collapse" href="#">
        <i class="bi bi-bar-chart"></i><span>CASES</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-c" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/layer_company/cases/view.php">
            <i class="bi bi-circle"></i><span>view messages</span>
          </a>
        </li>
       

      </ul>
    </li><!-- End Charts Nav -->

<?php }?>

    <li class="nav-heading">Pages</li>








    <li class="nav-item">
      <a class="nav-link collapsed" href="/layer_company/login.php/">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Login</span>
      </a>
    </li><!-- End Login Page Nav -->


  </ul>

</aside><!-- End Sidebar-->