<div class="banner">
    <h1>Your Messages Review Status</h1>
</div>
<div class="message-container">
    <?php
    $CommentTable = new Table("comment", "Cid");
    $Data = $CommentTable->fetchWhereOrderBy("Account", Session::getSession("Account_number"),"Time","DESC");
    if (is_array($Data)) {
        for ($i = 0; $i < count($Data); $i++) {
    ?>
            <div class="message-wrapper">
                <form action="<?= $URL->getController("DeleteMessage", "deleteMessage") ?>" class="msg-del-form">
                    <input type="hidden" name="comment_id" value="<?= $Data[$i]['Cid'] ?>">
                    <button type="submit" class="small-del-btn">Delete</button>
                </form>

                <h1 class="subject"><?= $Data[$i]['Subject']; ?></h1>
                <div class="msg-top-sec">
                    <div class="status">ID: <?= $Data[$i]['Cid'] ?></div>
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
                <div class="comment-form">
                    <form action="<?= $URL->getController("Contact", "contact") ?>" method="post">
                        <div class="row">
                            <div class="set">
                                <label for="FollowUp_Message">Add A Follow Up Question.</label>
                                <textarea name="message" id="FollowUp_Message" cols="30" rows="3" class="form-input" placeholder="Follow up by a Message or Question."></textarea>
                            </div>
                            <input type="hidden" name="email" value="<?= Session::getSession("Email") ?>">
                            <input type="hidden" name="subject" value="Follow up Question-<?= $Data[$i]['Cid'] ?>">
                        </div>
                        <div class="form-btn-set">
                            <button type="submit" class="form-btn primary-btn">Send</button>
                        </div>
                    </form>
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