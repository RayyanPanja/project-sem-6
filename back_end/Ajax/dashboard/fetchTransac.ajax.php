<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
$OrderBy = array("column" => "DateTime", "value" => 'DESC');
$TransacTable = new Table("transaction", "Receipt_No", 10, $OrderBy);

if (isset($_REQUEST['search'])) {
    $UsersTransacData = $TransacTable->fetchWhereLike("Receipt_No", $_REQUEST['search']);
    if (!is_bool($UsersTransacData) && is_array($UsersTransacData)) {
        for ($i = 0; $i < count($UsersTransacData); $i++) { ?>
            <div class="transaction-card">
                <h1 class="id"><?= $UsersTransacData[$i]['Receipt_No'] ?></h1>
                <div class="amount-note">
                    <div class="amount">
                        <?= $UsersTransacData[$i]['Amount'] ?>
                    </div>
                    <div class="note">
                        <?= $UsersTransacData[$i]['Note'] ?>
                    </div>
                </div>
                <div class="tra-date"><?= $UsersTransacData[$i]['DateTime'] ?></div>
                <div class="usernames">
                    <div class="sender">
                        <?= $UsersTransacData[$i]['Sender'] ?>
                    </div>
                    <div class="receiver">
                        <?= $UsersTransacData[$i]['Receiver'] ?>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="transaction-card">
            <h1>No Transactions</h1>
        </div>
        <?php }
} else {
    $UsersTransacData = $TransacTable->fetchWhereOrderBy("From_Acc", Session::getSession('Account_number'), "DateTime", "DESC");
    if (!is_bool($UsersTransacData) && is_array($UsersTransacData)) {
        for ($i = 0; $i < count($UsersTransacData); $i++) { ?>
            <div class="transaction-card">
                <h1 class="id"><?= $UsersTransacData[$i]['Receipt_No'] ?></h1>
                <div class="amount-note">
                    <div class="amount">
                        <?= $UsersTransacData[$i]['Amount'] ?>
                    </div>
                    <div class="note">
                        <?= $UsersTransacData[$i]['Note'] ?>
                    </div>
                </div>
                <div class="tra-date"><?= $UsersTransacData[$i]['DateTime'] ?></div>
                <div class="usernames">
                    <div class="sender">
                        <?= $UsersTransacData[$i]['Sender'] ?>
                    </div>
                    <div class="receiver">
                        <?= $UsersTransacData[$i]['Receiver'] ?>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="transaction-card">
            <h1>No Transactions</h1>
        </div>
<?php }
} ?>