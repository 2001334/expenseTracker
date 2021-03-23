<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Welcome, <?= $_SESSION['fname']?></div>
                <a class="nav-link" href="udashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">expenses menu</div>
                <a class="nav-link collapsed" href="manageexpenses" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Manage Expenses
                    <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                </a>
            </div>    
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: <?= $_SESSION['fname'] .',' .' ' .$_SESSION['lname']?></div>
        </div>
    </nav>
</div>