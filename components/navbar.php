 <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom px-5">
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
         <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
             <li class="nav-item">
                 <a href="index.php?page=home" class="nav-link <?php if (isset($_GET['page'])) echo ($_GET['page'] == 'home') ? 'active' : ''; ?>">Home</a>
             </li>
             <li class="nav-item">
                 <a href="index.php?page=products" class="nav-link <?php if (isset($_GET['page'])) echo ($_GET['page'] == 'products') ? 'active' : ''; ?>">Products</a>
             </li>
             <?php if (isset($_SESSION['user_id'])) { // Display Logout
                ?>
                 <li class="nav-item">
                     <a href="../logout.php" class="nav-link">Logout</a>
                 </li>
         </ul>
     <?php } else { // Display Login and Register when not logged in 
        ?>
         <li class="nav-item">
             <a href="index.php?page=login" class="nav-link <?php if (isset($_GET['page'])) echo ($_GET['page'] == 'login') ? 'active' : ''; ?>">Login</a>
         </li>
         <li class="nav-item">
             <a href="index.php?page=register" class="nav-link <?php if (isset($_GET['page'])) echo ($_GET['page'] == 'register') ? 'active' : ''; ?>">Register</a>
         </li>
     <?php } ?>
     </ul>
     </div>
     <?php if (isset($_SESSION['user_id'])) { // user information when logged in 
        ?>
         <span class="navbar-user">Welcome, <?php if (isset($_GET['page'])) echo $_SESSION['user_name'] . ' (' . $_SESSION['user_level'] . ')'; ?></span>
     <?php } ?>
 </nav>