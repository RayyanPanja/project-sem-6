<?php
require "../Classes/autoload.php";
$request = new Request;
$UserTable = new Table("main", "Account_number");
$UsersData = $UserTable->select()->get_Table();

// Helper::pa($request->all());
if ($request->Exists("search")) {
    $UsersData = $UserTable->select()->like("Account_number", $request->get('search'))->get_Table();
}
?>

<!-- PRINTER........................... -->
<?php
if (!is_null($UsersData) && is_array($UsersData)) {
    for ($i = 0; $i < count($UsersData); $i++) {
?>
        <div class="user-details-wrapper">
            <div class="top-segment">
                <div class="top-items"><?= $UsersData[$i]["Account_number"] ?></div>
                <div class="top-items"> <?= $UsersData[$i]["Sirname"] ?> <?= $UsersData[$i]["Firstname"] ?> <?= $UsersData[$i]["Fathername"] ?></div>
                <div class="top-items"><?= $UsersData[$i]["Username"] ?></div>
            </div>
            <div class="middle-segment">
                <div class="middle-items badge <?= ($UsersData[$i]["Blocked"]) ? "alert" : "success"  ?> "><?= $UsersData[$i]['Amount'] ?>/-</div>
                <form action="<?= Route::getController("FullDetails", "ManageUserControllers") ?>" method="post">
                    <input type="hidden" name="account" value="<?= $UsersData[$i]["Account_number"] ?>">
                    <div class="form-btn-set">
                        <button class="form-btn primary-btn">Full Details</button>
                    </div>
                </form>
            </div>
            <div class="bottom-segment">
                <div class="bottom-items"><?= $UsersData[$i]["Email"] ?></div>
                <div class="bottom-items"><?= $UsersData[$i]["Contact"] ?></div>
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