<?php
	require_once "classes/dbconn.php";
	require_once "classes/orders.php";
?>

    <!DOCTYPE html>
    <html lang="LV">

    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css?id=5" media="screen" />

    </head>

    <body>
        <div class="container-fluid span12">
            <h2>SIA "Testa kompānija" pasūtījumi</h2>

            <?php
                $order = new Orders();
                $rows = $order->selectOrders();
                $rowsDetails = $order->selectOrderDetails();

                    foreach ($rows as $row) {
                        $orderId = $row['orderId'];
                        $priority = $row['priority'];
                        $priorityColor = $priority == "high" ? "danger" : ($priority == "mid" ? "warning" : "success");
                        $orderDate = $row['orderDate'];
                        $orderType = $row['orderType'];
                        $salesman = $row['salesman'];
                        $currency = $row['currency'];
                        $orderLines = $row['orderLines'];
                        $orderSum = $row['orderSum'];
            ?>

            <table class="table table-bordered order">
                <thead>
                    <th>Pasūtījuma numurs:</th>
                    <th>Prioritāte:</th>
                    <th>Datums:</th>
                    <th>Pasūtījuma tips:</th>
                    <th>Pārdevējs:</th>
                    <th>Valūta:</th>
                    <th>Rindas pasūtījumā:</th>
                    <th>Summa kopā:</th>
                </thead>
                <tr>
                    <td><?php echo $orderId; ?></td>
                    <td><span class="badge badge-<?php echo $priorityColor ?>"><?php echo $priority; ?></span></td>
                    <td><?php echo $orderDate; ?></td>
                    <td><?php echo $orderType; ?></td>
                    <td><?php echo $salesman; ?></td>
                    <td><?php echo $currency; ?></td>
                    <td><?php echo $orderLines; ?></td>
                    <td><?php echo $orderSum; ?></td>

                </tr>
            </table>

            <table class="table table-bordered orderDetails">
                <thead class="thead-light">
                    <th>Preces nosaukums</th>
                    <th>Daudzums noliktavā</th>
                    <th>Cena</th>
                    <th>Pasūtītais daudzums</th>
                    <th>Summa</th>
                    <th>Piegādātais daudzums</th>
                    <th>Piegādāts %</th>
                </thead>

                    <?php

                        foreach ($rowsDetails as $rowDetails) {
                            if ($row['orderId'] == $rowDetails['orderId']) {

                                $orderId = $rowDetails['orderId'];
                                $item = $rowDetails['item'];
                                $qnty = $rowDetails['qnty'];
                                $price = $rowDetails['price'];
                                $amountOrdered = $rowDetails['amountOrdered'];
                                $totalPrice = $rowDetails['totalPrice'];
                                $amountDelivered = $rowDetails['amountDelivered'];
                                $percentDelivered = $amountDelivered / $amountOrdered * 100;
                                $badgeColor = $percentDelivered == 100 ? "success" : (($percentDelivered > 0 && $percentDelivered < 100) ? "warning" : "danger");
                    ?>

                <tr>
                    <td><?php echo $item; ?></td>
                    <td><?php echo $qnty; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $amountOrdered; ?></td>
                    <td><?php echo $totalPrice; ?></td>
                    <td><?php echo $amountDelivered; ?></td>
                    <td><span class="badge badge-<?php echo $badgeColor ?>"><?php echo round($percentDelivered); ?></span></td>

                </tr>

                    <?php
                            }
                        }
                    ?>

                <?php
                    }
                ?>
            </table>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

    </html>