<?php
if (Session::getSession("Loan_requested") == boolval(true)) {
    $LoanTable = new Table("loan", "Application_ID");
    $Loan = $LoanTable->select()->where("Account_number", Session::getSession("Account_number"))->execute_query();
}
?>

<div class="banner">
    <h1>Oo You Applied For Loan?</h1>
</div>
<div class="loan-details">
    <?php if (Session::getSession("Loan_requested") == false || true) { ?>
        <h1 class="section-title">Loan Not Requested</h1>
    <?php } else { ?>
        <h1 class="section-title">Loan Request</h1>
        <div class="loan-details">
            <div class="card">
                <div class="card-title">Loan Application</div>
                <div class="card-data">
                    <div>
                        <strong>Status:</strong><?= $Loan["Decision"] ?>
                    </div>
                    <div>
                        <strong>Application ID:</strong><?= $Loan["Application_ID"] ?>
                    </div>
                    <div>
                        <strong>Account Number:</strong><?= $Loan["Account_number"] ?>
                    </div>
                    <div>
                        <strong>Amount Requested:</strong><?= $Loan["Package_Amount"] ?> /-
                    </div>
                    <div>
                        <strong>Name:</strong><?= $Loan["Name"] ?>
                    </div>
                    <div>
                        <strong>Email:</strong><?= $Loan["Email"] ?>
                    </div>
                    <div>
                        <strong>Contact:</strong><?= $Loan["Contact"] ?>
                    </div>
                    <div>
                        <strong>Package ID:</strong><?= $Loan["Package_ID"] ?>
                    </div>
                    <div>
                        <strong>Package Name:</strong><?= $Loan["Package_Name"] ?>
                    </div>
                </div>
                <?php
                if ($Loan['Decision'] == "Pending") {
                ?>
                    <form action="<?= $URL->getController("WithdrawLoan", "Dashboard") ?>" method="post">
                        <input type="hidden" name="loanApp" value="<?= $Loan['Application_ID'] ?>">
                        <input type="hidden" name="user" value="<?= $Loan["Account_number"] ?>">
                        <button type="submit" class="form-btn alert">Withdraw</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>