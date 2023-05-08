<div class="banner">
    <h1>Inventory</h1>
</div>
<div class="reward-card-grid">
    <?php
    $OrderBy = array("column" => 'expires', "value" => "DESC");
    $RewardsTable = new Table("rewards", "Reward_ID", null, $OrderBy);
    $UsersReward = $RewardsTable->fetchWhere("For_Account", Session::getSession('Account_number'));

    if (!is_bool($UsersReward) && is_array($UsersReward)) {
        for ($i = 0; $i < count($UsersReward); $i++) { ?>
            <div class="reward-card">
                <h1 class="reward-key"><?= $UsersReward[$i]['Code'] ?></h1>
                <h2 class="reward-key">CashBack: <?= $UsersReward[$i]['CashBack'] ?>/-</h2>
                <div class="reward-date">
                    Valid till: <?= $UsersReward[$i]['expires'] ?>
                </div>
                <a href="<?= $URL->getView("Transfer", "Transfer") ?>" onclick="<?php Session::setSession("dashKey", $UsersReward[$i]['Code']) ?>" class="form-btn primary-btn">Use</a>
            </div>
        <?php }
    } else { ?>
        <div class="reward-card">
            <h1 class="reward-key">No Rewards</h1>
        </div>
    <?php } ?>
</div>