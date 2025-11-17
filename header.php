<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    
    <!-- Sidenav Toggle Button -->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle">
        <i data-feather="menu"></i>
    </button>

<a class="navbar-brand pe-3 ps-4 ps-lg-3" href="dashboard.php">
    <span class="d-inline-flex align-items-center">
        <span class="fastfi-brand-text" style="font-size:22px; font-weight:700; color:#0056D6;">fast-FI</span>
    </span>
</a>




    <!-- Navbar Items -->
    <ul class="navbar-nav align-items-center ms-auto">

        <!-- Broadband Alerts -->
        <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="#" role="button" data-bs-toggle="dropdown">
                <i data-feather="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                <?php
                $sql="SELECT * from tblbookbplan where Status is null";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $totnew1=$query->rowCount();
                ?>
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="me-2" data-feather="bell"></i>
                    Broadband Notification (<?php echo $totnew1;?>)
                </h6>
                <?php foreach($results as $row){ ?>
                <a class="dropdown-item dropdown-notifications-item" href="new-request.php">
                    <div class="dropdown-notifications-item-icon bg-warning">
                        <i data-feather="activity"></i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details"><?php echo $row->BookingDate;?></div>
                        <div class="dropdown-notifications-item-content-text"><?php echo $row->BookingNumber;?>.</div>
                    </div>
                </a>
                <?php } ?>
                <a class="dropdown-item dropdown-notifications-footer" href="all-request.php">View All Notification</a>
            </div>
        </li>

        <!-- DTH Alerts -->
        <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <i data-feather="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up">
                <?php
                $sql2="SELECT * from tblbookdthplan where Status is null";
                $query2 = $dbh->prepare($sql2);
                $query2->execute();
                $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                $totnew2=$query2->rowCount();
                ?>
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="me-2" data-feather="bell"></i>
                    DTH Notification (<?php echo $totnew2;?>)
                </h6>
                <?php foreach($results2 as $row2){ ?>
                <a class="dropdown-item dropdown-notifications-item" href="new-dthrequest.php">
                    <div class="dropdown-notifications-item-icon bg-warning">
                        <i data-feather="activity"></i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details"><?php echo $row2->BookingDate;?></div>
                        <div class="dropdown-notifications-item-content-text"><?php echo $row2->BookingNumber;?>.</div>
                    </div>
                </a>
                <?php } ?>
                <a class="dropdown-item dropdown-notifications-footer" href="all-request.php">View All Notification</a>
            </div>
        </li>

        <!-- Messages -->
        <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <i data-feather="mail"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up">
                <?php
                $sql1="SELECT * from tblcontact where IsRead is null";
                $query1 = $dbh->prepare($sql1);
                $query1->execute();
                $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                $newmsg=$query1->rowCount();
                ?>
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="me-2" data-feather="mail"></i>
                    Reported Issues (<?php echo $newmsg;?>)
                </h6>
                <?php foreach($results1 as $row1){ ?>
                <a class="dropdown-item dropdown-notifications-item" href="request.php">
                    <img class="dropdown-notifications-item-img" src="assets/img/illustrations/profiles/profile-2.png" />
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-text"><?php echo $row1->Message;?>.</div>
                        <div class="dropdown-notifications-item-content-details"><?php echo $row1->Name;?> (<?php echo $row1->Enquirydate;?>)</div>
                    </div>
                </a>
                <?php } ?>
                <a class="dropdown-item dropdown-notifications-footer" href="#!">Read All Messages</a>
            </div>
        </li>

        <!-- User Profile -->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" href="#" data-bs-toggle="dropdown">
                <img class="img-fluid" src="assets/img/illustrations/profiles/profile-1.png" />
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png" />
                    <div class="dropdown-user-details">
                        <?php
                        $aid=$_SESSION['ispmsaid'];
                        $sql="SELECT AdminName,Email from tbladmin where ID=:aid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        if($query->rowCount() > 0){
                        foreach($results as $row){
                        ?>
                        <div class="dropdown-user-details-name"><?php echo $row->AdminName;?></div>
                        <div class="dropdown-user-details-email"><?php echo $row->Email;?></div>
                        <?php }} ?>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="profile.php">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div> Profile
                </a>
                <a class="dropdown-item" href="change-password.php">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div> Change Password
                </a>
                <a class="dropdown-item" href="logout.php">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div> Logout
                </a>
            </div>
        </li>

    </ul>
</nav>
