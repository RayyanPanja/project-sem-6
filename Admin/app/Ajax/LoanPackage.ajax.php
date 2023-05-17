<?php
require "../Classes/autoload.php";
$request = new Request;
$LoanPackageTable = new Table("loan_packages", "Package_ID");
$LoanPackageData = $LoanPackageTable->select()->get_Table();

Helper::pa($request->all());
if ($request->Exists("search")) {
    $LoanPackageData = $LoanPackageTable->select()->like("Package_ID", $request->get('search'))->get_Table();
}
?>

<!-- PRINTER........................... -->
<?php
if (!is_null($LoanPackageData) && is_array($LoanPackageData)) {
    for ($i = 0; $i < count($LoanPackageData); $i++) {
?>
        <div class="user-details-wrapper">
            <div class="top-segment">
                <div class="top-items"><?= $LoanPackageData[$i]["Package_ID"] ?></div>
                <div class="top-items"> <?= $LoanPackageData[$i]["Package_Name"] ?></div>
                <div class="top-items"><?= $LoanPackageData[$i]["Sponsor"] ?></div>
            </div>
            <div class="middle-segment">
                <div class="middle-items badge primary"><?= $LoanPackageData[$i]['Package_Amount'] ?>/-</div>
                <form action="<?= Route::getController("getDetails", "ManageLoanPackagesControllers") ?>" method="post">
                    <input type="hidden" name="PackageID" value="<?= $LoanPackageData[$i]['Package_ID']; ?>">
                    <button type="submit" class="form-btn primary-btn success">More Details</button>
                </form>
            </div>
            <div class="bottom-segment-grid">
                <div class="bottom-items"><?= $LoanPackageData[$i]["Date_Added"] ?></div>
                <div class="bottom-items"><?= $LoanPackageData[$i]["Status"] ?></div>
                <div class="bottom-items"><?= $LoanPackageData[$i]["Users_Using"] ?>/<?= $LoanPackageData[$i]["Max_Users"] ?></div>
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