<div class="banner">
    <h1>Welcome <?= Session::getSession("Firstname"); ?></h1>
    <form action="<?= $URL->getController("DeleteAllNotifications", "notify") ?>" method="post" class="del-all-form del-form top-lv-element">
        <button class="small-del-btn">Delete All Notifications</button>
    </form>

</div>
<div class="notification-wrapper none" id="notfication-set">
    <?php
    $NotifyTable = new Table("notifications");
    $UsersNotify = $NotifyTable->fetchWhereOrderBy("Notification_For", Session::getSession("Account_number"), "Time", "DESC");
    if (!is_bool($UsersNotify) && is_array($UsersNotify)) {
        for ($i = 0; $i < count($UsersNotify); $i++) {
    ?>
            <div class="notification">
                <div class="msg"><?= $UsersNotify[$i]['Notification'] ?></div>
                <div class="date"><?= $UsersNotify[$i]['Time'] ?></div>
                <form action="<?= $URL->getController("DeleteNotification", "notify") ?>" method="post" class="del-form">
                    <input type="hidden" name="id" value="<?= $UsersNotify[$i]['id'] ?>">
                    <button class="small-del-btn">Del</button>
                </form>
            </div>
        <?php }
    } else { ?>
        <div class="notification">
            <div class="msg">
                No New Notifications
            </div>
        </div>
    <?php } ?>
</div>
<div class="notification-section block">
    <h1 class="white-text text-center">notifications</h1>
</div>

<button class="toggleNotification" id="toggleNotify">Notification</button>
<script src="<?= $URL->getJs("Notification") ?>"></script>