<?php
require "../Classes/autoload.php";
$request = new Request;
$LoanTable = new Table("loan", "Application_ID");
$LoanData = $LoanTable->select()->order_by("Date_Created","ASC")->execute_query();
if ($request->Exists("search")) {
    $LoanData = $LoanTable->select()->like("Application_ID", $request->get('search'))->get_Table();
}
?>

<!-- PRINTER........................... -->
<?php
if (!is_null($LoanData) && is_array($LoanData)) {
    for ($i = 0; $i < count($LoanData); $i++) {
?>
        <dialog class="doc-dlg" id="doc-<?= $LoanData[$i]['Application_ID'] ?>">
            <div class="doc-top-bar">
                <button class="x-btn" id="close-dlg-<?= $LoanData[$i]['Application_ID'] ?>">X</button>
            </div>
            <div class="doc-grid">
                <div class="doc-img-holder">
                    <h1>AdharCard</h1>
                    <img src="<?= Route::$URL ?>storage/Docs/<?= $LoanData[$i]["Doc_Folder"] ?>/<?= $LoanData[$i]['AdharCard'] ?>" alt="AdharCard">
                </div>
                <div class="doc-img-holder">
                    <h1>ChequeBook</h1>
                    <img src="<?= Route::$URL ?>storage/Docs/<?= $LoanData[$i]["Doc_Folder"] ?>/<?= $LoanData[$i]['ChequeBook'] ?>" alt="ChequeBook">
                </div>
                <div class="doc-img-holder">
                    <h1>PassBook</h1>
                    <img src="<?= Route::$URL ?>storage/Docs/<?= $LoanData[$i]["Doc_Folder"] ?>/<?= $LoanData[$i]['Passbook'] ?>" alt="Passbook">
                </div>
                <div class="doc-img-holder">
                    <h1>Passport Size Photo</h1>
                    <img src="<?= Route::$URL ?>storage/Docs/<?= $LoanData[$i]["Doc_Folder"] ?>/<?= $LoanData[$i]['Photo'] ?>" alt="Photo">
                </div>
            </div>
        </dialog>
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
                                <button type="button" class="form-btn primary-btn warn" id="open-dlg-<?= $LoanData[$i]['Application_ID'] ?>">See Documents</button>
                                <button type="submit" class="form-btn primary-btn success">Submit</button>
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
        <?= Route::getJS("Dialog") ?>
        <?php
        if (!is_null($LoanData) && is_array($LoanData)) {
            for ($i = 0; $i < count($LoanData); $i++) {
        ?>
                <script>
                    DialogHandle("open-dlg-<?= $LoanData[$i]['Application_ID'] ?>", "close-dlg-<?= $LoanData[$i]['Application_ID'] ?>", "doc-<?= $LoanData[$i]['Application_ID'] ?>", true)
                </script>
        <?php }
        } ?>

    <?php }
} else { ?>
    <div class="user-details-wrapper">
        <div class="middle-segment">
            <h1 class="segment-title">User with This Account Does Not Exist</h1>
        </div>
    </div>
<?php } ?>
<!-- PRINTER........................... -->