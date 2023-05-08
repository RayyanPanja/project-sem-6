<div class="banner">
    <h1>Oo You Applied For Loan?</h1>
</div>
<div class="loan-details">
    <?php
    if (!Session::Exist("Loan_Request") || Session::getSession("Loan_Requested") === boolval(false)) { ?>
        <h1 class="section-title">Loan Not Requested</h1>
    <?php } ?>
</div>