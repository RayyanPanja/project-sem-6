<!-- Navbar -->
<?= Route::getCSS("Navbar") ?>
<nav class="navbar">
    <div class="link-set" id="link-set">
        <a href="<?= Route::getHomePage() ?>#" class="link">Home</a>
        <a href="<?= Route::getView("Users", "Users") ?>" class="link">Manage User</a>
        <a href="<?= Route::getView("Loan", "LoanApp") ?>" class="link">Manage Loan Applications</a>
        <a href="<?= Route::getView("LoanPackage", "LoanPackage") ?>" class="link">Add Loan Packages</a>
        <a href="<?= Route::getView("ManageLoan", "ManageLoanPackages") ?>" class="link">Manage Loan Packages</a>
        <?php if (Session::getSession("AdminLoggedin") && Session::getSession("Designation") === "Manager") { ?>
            <a href="<?= Route::getView("Bank", "ManageBank") ?>" class="link">Manage Bank</a>
        <?php } ?>
    </div>
</nav>
<!-- Navbar Ends -->