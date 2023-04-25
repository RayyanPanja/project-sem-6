<?php
include('../connection.php');

if (isset($_REQUEST['search'])) {
    $val = $_REQUEST['search'];

    $sql = "SELECT * FROM `comment` WHERE `Cid` LIKE '$val%' OR `Status` LIKE '$val%' OR `Email` LIKE '$val%';";
    $result = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_assoc($result)) { ?>
        <div class="mail-wrapper">
            <div class="w-100 flex flex-al-ce flex-ju-sb">
                <h2 class="mail-subject"><?= $data['Subject'] ?></h2>
                <div class="mail-id">id: <span> <?= $data['Cid'] ?> </span></div>
            </div>
            <i class="mail-msg">
                <?= $data['Msg'] ?>
            </i>
            <?php
            if ($data['Status'] === "Pending") {
            ?>
                <div class="reply-form-container">
                    <form action="reply.php" method="post">
                        <div class="row">
                            <div class="col">
                                <label for="Reply">Reply</label>
                                <input type="text" name="reply" class="form-input" placeholder="Reply">
                            </div>
                            <div class="form-btn-set">
                                <button type="reset" class="form-btn secondary-btn">Cancle</button>
                                <button type="submit" class="form-btn primary-btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <div class="w-100 flex flex-col flex-al-end">
                <div class="date">~<?= $data['Time'] ?>||<?= $data['Date'] ?></div>
                <a href="mailto:<?= $data['Email'] ?>" class="mail-from"><?= $data['Email'] ?></a>
            </div>
        </div>
    <?php }
} else {
    $sql = "SELECT * FROM `comment`;";
    $result = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_assoc($result)) { ?>
        <div class="mail-wrapper">
            <div class="w-100 flex flex-al-ce flex-ju-sb">
                <h2 class="mail-subject"><?= $data['Subject'] ?></h2>
                <div class="mail-id">id: <span> <?= $data['Cid'] ?> </span></div>
            </div>
            <i class="mail-msg">
                <?= $data['Msg'] ?>
            </i>
            <?php
            if ($data['Status'] === "Pending" && !is_null($data['Account'])) {
            ?>
                <div class="reply-form-container">
                    <form action="reply.php" method="post">
                        <div class="row">
                            <div class="col">
                                <label for="Reply">Reply</label>
                                <input type="text" name="reply" class="form-input" placeholder="Reply">
                            </div>
                            <div class="form-btn-set">
                                <button type="reset" class="form-btn secondary-btn">Cancle</button>
                                <button type="submit" class="form-btn primary-btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
            <div class="w-100 flex flex-col flex-al-end">
                <div class="date">~ <?= $data['Time'] ?> <?= $data['Date'] ?></div>
                <a href="mailto:<?= $data['Email'] ?>" class="mail-from"><?= $data['Email'] ?></a>
            </div>
        </div>
<?php }
}
?>
<script src="<?= $URL ?>/assets/js/Observer.js"></script>