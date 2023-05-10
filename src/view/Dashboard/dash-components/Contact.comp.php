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
                <form action="<?= $URL->getController("DeleteMessage", "deleteMessage") ?>" class="msg-del-form">
                    <input type="hidden" name="comment_id" value="<?= $Data[$i]['Cid'] ?>">
                    <button type="submit" class="small-del-btn">Delete</button>
                </form>

                <div class="msg-top-sec">
                    <h1 class="subject"><?= $Data[$i]['Subject']; ?></h1>
                    <div class="status"><?= $Data[$i]['Status'] ?></div>
                </div>
                <div class="msg-middle-sec">
                    <p class="message">"<?= $Data[$i]['Msg'] ?>"</p>
                    <?php if ($Data[$i]["Status"] !== "Pending") { ?>
                        <div class="response-group">
                            <p class="message-response">"<?= $Data[$i]['Response'] ?>"</p>
                            <strong>Responded By: <?= $Data[$i]['Response_By'] ?> </strong>
                        </div>
                    <?php } ?>
                </div>
                <div class="msg-bottom-sec">
                    <div><?= $Data[$i]["Time"] . " " . $Data[$i]["Date"] ?></div>
                </div>
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