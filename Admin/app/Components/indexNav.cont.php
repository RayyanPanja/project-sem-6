<!-- Navbar -->
<?= Route::getCSS("Navbar") ?>
<nav class="navbar">
    <div class="link-set" id="link-set">
        <a href="<?= Route::getHomePage() ?>#" class="link">Home</a>
        <a href="<?= Route::getView("Users", "Users") ?>" class="link">Manage User</a>
        <a href="<?= Route::getView("LoanApp", "LoanApp") ?>" class="link">Manage Loan Applications</a>
        <a href="<?= Route::getView("LoanPackage", "LoanPackage") ?>" class="link">Manage Loan Packages</a>
        <a href="<?= Route::getView("Reactivate", "Reactivate") ?>" class="link">Reactivate User Account</a>
    </div>
</nav>
<!-- Navbar Ends -->