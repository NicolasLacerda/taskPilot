<?php

session_start();

if (!empty($_SESSION['mail'])) {
    $url = "../../views/pages/accountPage.php";
} else {
    $url = "../../views/pages/loginPage.php";
}
?>

<link rel="stylesheet" href="../public/assets/css/navbar.css">

<div class="navbar px-4 sticky-top bg-white .navbar-expand-lg">
    <button class="navbar-toggler border-0">
        <span class="bi bi-list">
        </span>
    </button>

    <a class="navbar-brand" href="../public/index.php">
        <svg id="logo" viewBox="0 0 198.685 198.685" xml:space="preserve">
            <g>
                <path d="M196.785,75.856L141.647,20.78c-2.521-2.524-6.619-2.524-9.146,0L99.31,53.966L66.142,20.78
		c-2.515-2.524-6.619-2.524-9.14,0L1.895,75.856c-2.527,2.521-2.527,6.604,0,9.143l37.107,37.123
		c0.177,0.25,0.377,0.486,0.597,0.706l55.107,55.076c0.975,0.95,2.156,1.547,3.374,1.767c0.414,0.078,0.865,0.127,1.26,0.127
		c1.65,0,3.301-0.633,4.567-1.894l92.878-92.905c1.199-1.211,1.899-2.868,1.899-4.573C198.685,78.706,197.984,77.071,196.785,75.856
		z M99.31,164.253l-49.907-49.877c-0.195-0.256-0.384-0.486-0.603-0.712L15.602,80.426L61.563,34.48L90.2,63.087L70.715,82.536
		c-2.521,2.524-2.521,6.622,0,9.146c2.515,2.521,6.625,2.521,9.146,0l57.213-57.202l46.01,45.946L99.31,164.253z M135.82,45.895
		l32.321,32.251c0.639,0.597,0.938,1.434,0.938,2.287c0,0.855-0.316,1.671-0.938,2.289l-27.365,27.368
		c-0.646,0.64-1.449,0.943-2.277,0.943c-0.815,0-1.632-0.316-2.259-0.943c-1.267-1.261-1.267-3.312,0-4.562l25.075-25.09
		l-30.014-29.965c-1.267-1.267-1.267-3.312,0-4.57C132.538,44.638,134.548,44.638,135.82,45.895z" />
            </g>
        </svg>
    </a>

    <div class="right-items">
        <a href="#"><i class="bi bi-info-circle"></i></a>
        <a href="#"><i class="bi bi-bell"></i></a>
        <a href="#"><i class="bi bi-plus-circle"></i></a>
        <a id="profile" href="<?php echo $url; ?>">
            <img src="../public/imgs/profile.jpeg" alt="">
            <div class="status"></div>
        </a>
        <a id="exit" href="../src/Models/Logout.php"><i class="bi bi-power"></i></a>
    </div>
</div>