<div class="banner">
    <h1>Your Messages Review Status</h1>
</div>
<div class="message-container">
    <?php
    $CommentTable = new Table("comment", "Cid");
    $Data = $CommentTable->fetchWhere("Account", Session::getSession("Account_number"));
    if (is_array($Data)) {
        for ($i = 0; $i < count($Data); $i++) {
    ?>
            <div class="message-wrapper">
                <div class="status"><?= $Data[$i]['Status'] ?></div>
                <h1 class="subject"><?= $Data[$i]['Subject']; ?></h1>
                <p class="message">"<?= $Data[$i]['Msg'] ?>"</p>
                <?php if ($Data[$i]["Status"] !== "Pending") { ?>
                    <div class="response-group">
                        <p class="message response"><?= $Data[$i]['Response'] ?></p>
                        <strong>Responded By: </strong>
                    </div>
                <?php } ?>
                <div><?= $Data[$i]["Time"] . " " . $Data[$i]["Date"] ?></div>
            </div>
        <?php }
    } else { ?>
        <div class="message-container">
            <div class="message-wrapper">
                <h1 class="subject">No Message Sent</h1>
                <a href="<?= $URL->getView("contact", "contact") ?>" class="form-btn primary-btn">Try Writing a Review??</a>
            </div>
        </div>
    <?php } ?>
</div>
