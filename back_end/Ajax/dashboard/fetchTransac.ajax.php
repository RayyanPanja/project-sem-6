<?php
require "../../Classes/All.class.php";
require "../../include/include.php";
$TransacTable = new Table("transaction", "Receipt_No");

if (isset($_REQUEST['search'])) {
    $UsersTransacData = $TransacTable->select()->like("Receipt_No",$_REQUEST['search'])->order_by("DateTime")->execute_query();
    if (!is_bool($UsersTransacData) && is_array($UsersTransacData) && count($UsersTransacData) != 0) {
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
    $UsersTransacData = $TransacTable->select()->where("From_Acc", Session::getSession('Account_number'))->order_by("DateTime")->execute_query();
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