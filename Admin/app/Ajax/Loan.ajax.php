<?php
require "../Classes/autoload.php";
$request = new Request;
$LoanTable = new Table("loan", "Application_ID");
$LoanData = $LoanTable->select()->get_Table();

Helper::pa($request->all());
if ($request->Exists("search")) {
    $LoanData = $LoanTable->select()->like("Application_ID", $request->get('search'))->get_Table();
}
?>

<!-- PRINTER........................... -->
<?php
if (!is_null($LoanData) && is_array($LoanData)) {
    for ($i = 0; $i < count($LoanData); $i++) {
?>
        <div class="user-details-wrapper">
            <div class="top-segment">
                <div class="top-items"><?= $LoanData[$i]["Application_ID"] ?></div>
                <div class="top-items"> <?= $LoanData[$i]["Account_number"] ?></div>
                <div class="top-items"><?= $LoanData[$i]["Name"] ?></div>
            </div>
            <div class="middle-segment">
                <div class="middle-items badge primary"><?= $LoanData[$i]['Package_Amount'] ?>/-</div>
                <form action="<?= Route::getController("FullDetails", "ManageUserControllers") ?>" method="post">
                    <input type="hidden" name="account" value="<?= $LoanData[$i]["Application_ID"] ?>">
                    <div class="form-btn-set">
                        <div class="form-segment">
                            <div class="row">
                                <select name="decision" id="decision" class="form-input">
                                    <option value="Approve">Approve</option>
                                    <option value="Reject">Reject</option>
                                </select>
                            </div>
                            <div class="row">
                                <button class="form-btn primary-btn success">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bottom-segment">
                <div class="bottom-items"><?= $LoanData[$i]["Email"] ?></div>
                <div class="bottom-items"><?= $LoanData[$i]["Contact"] ?></div>
            </div>
        </div>
    <?php }
} else { ?>
    <div class="user-details-wrapper">
        <div class="middle-segment">
            <h1 class="segment-title">User with This Account Does Not Exist</h1>
        </div>
    </div>
<?php } ?>
<!-- PRINTER........................... -->