<?php
include('../connection.php');
include('../../Fetched.php');

if (isset($_REQUEST['his_Acc'])) {
    $val =  $_REQUEST['his_Acc'];
    $TransactionTable = fetchWithDualWhere($con, "transaction", "OR", "From_Acc", $_SESSION['Account_number'], "To_Acc", $val);
    // Write($TransactionTable);
    foreach ($TransactionTable as $key => $value) { ?>
        <tr>
            <td><?= $data['Receipt_No']; ?></td>
            <td><?= $data['From_Acc']; ?></td>
            <td><?= $data['To_Acc']; ?></td>
            <td><?= $data['Sender']; ?></td>
            <td><?= $data['Receiver']; ?></td>
            <td><?= $data['Amount']; ?></td>
            <td><?= $data['Note']; ?></td>
            <td><?= $data['DateTime']; ?></td>
        </tr>
    <?php }
} else {
    $TransactionTable = fetchAllFrom($con, "transaction");
    $Data = searchData($TransactionTable, "To_Acc", $_SESSION['Account_number']);
    // Write($Data['data']);
    foreach ($TransactionTable as $key => $value) { ?>
        <tr>
            <td><?= $data['Receipt_No']; ?></td>
            <td><?= $data['From_Acc']; ?></td>
            <td><?= $data['To_Acc']; ?></td>
            <td><?= $data['Sender']; ?></td>
            <td><?= $data['Receiver']; ?></td>
            <td><?= $data['Amount']; ?></td>
            <td><?= $data['Note']; ?></td>
            <td><?= $data['DateTime']; ?></td>
        </tr>
<?php }
}

// $Data = searchData($TransactionTable,"Recipt_No",);
