<?php
include "../connection.php";

if (isset($_REQUEST['account'], $_REQUEST['amount'], $_REQUEST['confirmamount'])) {
    $Account = $_REQUEST['account'];
    $Amount = $_REQUEST['amount'];
    $ConfirmAmount = $_REQUEST['confirmamount'];

    if ($Amount === $ConfirmAmount) {
        $OriginalAmount;

        $fetch = "SELECT * FROM main WHERE `Account_number` = $Account";
        $Res = mysqli_query($con, $fetch);
        if (mysqli_num_rows($Res) > 0) {
            while ($data = mysqli_fetch_assoc($Res)) {
                $OriginalAmount = $data['Amount'];
            }
            $OriginalAmount += $Amount;
            $sql = "UPDATE main SET `Amount` = $OriginalAmount WHERE `Account_number` = $Account ";
            $Res = mysqli_query($con, $sql);
            if ($Res) {
?>
                <script>
                    alert("Amount Deposited")
                    window.location.assign('ui.php');
                </script>
<?php
            }
        }
    }
}
