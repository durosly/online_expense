<?php 
    require_once "includes/Database.php";
    require_once "includes/User.php";
    // $db = new Database();
    // $user = new User($db->get_conn());
    // $user->id = $_SESSION['userId'];
    // $firstname = $user->getFirstname();
?>
<header class="header">
    <div class="header__left">
        <img src="assets/images/caurix-logo.png" alt="caurix-logo" class="header__logo" />
        <span class="header__greet">Hello<?php echo ", " . "John Doe"; ?></span>
    </div>
    <div class="header__right">
        <i class="fas fa-bars"></i>
        <ul class="header__nav">
            <li class="header__nav-item">
                <a href="dashboard" class="header__nav-link">Dashboard</a>
            </li>
            <li class="header__nav-item">
                <a href="records" class="header__nav-link">Records</a>
            </li>
            <li class="header__nav-item">
                <a href="logout" class="header__nav-link">Logout</a>
            </li>
        </ul>
    </div>
</header>