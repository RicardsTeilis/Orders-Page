<?php

class Orders extends DbConnect
{
    
    public function selectOrders()
    {
        $sql = "SELECT
		orders.order_id AS orderId,
        orders.customerId,
        orders.priority,
        orders.orderdate AS orderDate,
        orders.ordertype AS orderType,
        orders.salesman AS salesman,
        orders.currency,
        orders.orderlines AS orderLines,
        orders.order_sum AS orderSum
    FROM orders";
        
        $result = $this->connect()->query($sql);
        
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $data[] = $row;
            }
            return $data;
		}
		
    }
    
    public function selectOrderDetails()
    {
        $sql = "SELECT
        order_lines.order_id AS orderId,
		order_lines.item AS item,
		order_lines.qnty,
		order_lines.price AS price,
		order_lines.amount_ordered AS amountOrdered,
        order_lines.price * order_lines.amount_ordered AS totalPrice,
		order_lines.amountdel AS amountDelivered
    FROM order_lines";
        
        $resultDetails = $this->connect()->query($sql);
        
        if ($resultDetails->rowCount() > 0) {
            while ($rowDetails = $resultDetails->fetch()) {
                $dataDetails[] = $rowDetails;
            }
            return $dataDetails;
		}
		
    }
    
}