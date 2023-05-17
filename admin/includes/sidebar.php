<?php
  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index.php" target="_blank">
        <img src="../images/emmapeelogo.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Admin</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "index.php" ? "active bg-gradient-primary":"" ?> " href="./index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($page == "user.php") {echo "active bg-gradient-primary";} else{ echo "";} ?> " href="./user.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">All Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($page == "category.php" || $page == "subcategory.php" || $page == "edit-category.php" || $page == "edit-subcategory.php") {echo "active bg-gradient-primary";} else{ echo "";} ?> " href="./category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">All Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($page == "add-category.php" || $page == "add-subcategory.php") {echo "active bg-gradient-primary";} else{ echo "";} ?> " href="./add-category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
              <span class="nav-link-text ms-1">Add Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($page == "product.php" || $page == "special-offer.php") {echo "active bg-gradient-primary";} else{ echo "";} ?> " href="./product.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">All Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($page == "add-product.php" || $page == "add-special-offer.php") {echo "active bg-gradient-primary";} else{ echo "";} ?> " href="./add-product.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>
            <span class="nav-link-text ms-1">Add Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($page == "order.php" || $page == "order-history.php" || $page == "view-order.php") {echo "active bg-gradient-primary";} else{ echo "";} ?> " href="./order.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($page == "gallery.php" || $page == "add-gallery.php") {echo "active bg-gradient-primary";} else{ echo "";} ?> " href="./gallery.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Gallery</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php if ($page == "settings.php") {echo "active bg-gradient-primary";} else{ echo "";} ?> " href="./settings.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Settings</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-primary mt-4 w-100" onclick="return confirm('Are you sure you want to logout')" href="logout.php" type="button">Logout</a>
      </div>
    </div>
  </aside>