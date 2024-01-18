<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <img src="/assets/img/logo-white.png" class="w-100" alt="Lab Management">    
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/patients">
                    <i class="fas fa-procedures"></i>
                    <span>Patients</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/doctors">
                    <i class="fas fa-user-md"></i>
                    <span>Doctors</span></a>
            </li>

              <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/tests">
                    <i class="fas fa-vial"></i>
                    <span>Tests</span></a>
            </li>

            <?php if($_SESSION['role'] === 'admin'):?>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="/users">
                    <i class="fas fa-user"></i>
                    <span>Users</span></a>
            </li>
            <?php endif; ?>
            <hr class="sidebar-divider">
            
                <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        

        </ul>
        <!-- End of Sidebar -->