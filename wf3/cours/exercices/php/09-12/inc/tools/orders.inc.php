<?php

// Selectionne un ou les produits
function view_orders($order_id = false)
{
    $orders = get_orders($order_id);

    if($orders)
    {
?>
    <table class="orders">
        <thead>
            <th>N° de commande</th>
            <th>Date</th>
            <th>Client</th>
            <th>Produits</th>
            <th>Montant H.T.</th>
            <th>Montant T.T.C.</th>
            <?php if( is_admin() ): ?>
            <th>Actions</th>
            <?php endif; ?>
        </thead>
        <tbody>
        <?php
        foreach($orders as $order_id => $order)
        {

            echo '<tr>';
            echo    "<td>{$order['order_id']}</td>";
            echo    "<td>{$order['order_date']}</td>";
            echo    "<td>{$order['user_fullname']}</td>";
            echo    "<td>{$order['products']}</td>";
            echo    "<td>{$order['amount_ex_tax']}</td>";
            echo    "<td>{$order['amount_inc_tax']}</td>";
            if( is_admin() ) {
                echo '<td>' .
                    '<a href="index.php?p=orders&a=edit&id=' . $order_id . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' .
                    ' <a href="' . SITE_URL . 'libs/services-orders.php?a=delete&id=' . $order_id . '" class="delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' .
                    '</td>';
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
<?php
    }

    return true;
}

function list_products_to_order() {
    $products = get_products();

    if($products)
    {
        ?>
        <form action="/so/add/" method="post"></form>
        <table class="orders">
            <thead>
                <th>Image</th>
                <th>Référence</th>
                <th>Libellé</th>
                <th>Description</th>
                <th>Prix HT</th>
                <th>Stock</th>
                <th>Qté</th>
                <th>Total</th>
            </thead>
            <tbody>
            <?php
            foreach($products as $product_id => $product)
            {

                echo '<tr>';
                if( ! is_null($product['product_illustration'] ) )
                {
                    $reload_cache = time(); // Force à reload le cache
                    echo    "<td><img src=\"/assets/img/produits/th/{$product['product_illustration']}?t={$reload_cache}\" alt=\"Produits ref {$product['product_ref']}\" /></td>";
                } else {
                    echo    "<td></td>";
                }
                echo    "<td>{$product['product_ref']}</td>";
                echo    "<td>{$product['product_label']}</td>";
                echo    "<td>{$product['product_description']}</td>";
                echo    "<td><input type=\"number\" name=\"quantity\" placeholder=\"0\" value=\"{$product['product_price']}\" disabled /></td>";
                echo    "<td>{$product['product_stock']}</td>";
                echo    "<td><input type=\"number\" name=\"quantity\" placeholder=\"0\" /></td>";
                echo    "<td><input type=\"number\" name=\"total\" placeholder=\"0\" disabled /></td>";
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        $message['type'] = "danger";
        $message['message'] = "Il n'y aucun produit dans la base de données";
    }

    echo '<div class="text-center"><input type="submit" class="btn btn-info" value="Commander"></div>';

    "SELECT * FROM products WHERE product_status = 'VALID'";
}

    // Retour un ou plusieurs produits
    function get_orders($order_id = false)
    {
        global $sql_conn;

        $where = ( $order_id ) ? ' WHERE order_id = ' . $order_id : '';
        $sql = "
SELECT
  DATE_FORMAT(o.order_date,'%d/%m/%Y %h:%i') order_date,
  GROUP_CONCAT(concat(p.product_label,' (',op.product_quantity,')') SEPARATOR ',' ) products,
  o.order_id,
  u.user_id,
  CONCAT(user_firstname, ' ', user_lastname) user_fullname,
  o.amount_ex_tax,
  o.amount_inc_tax
FROM orders o
left JOIN orders_products op ON o.order_id = op.order_id
left JOIN products p ON p.product_id = op.product_id
left JOIN users u ON o.user_id = u.user_id
group by op.order_id" . $where;

        $q = mysqli_query($sql_conn, $sql);

        $orders = false;

        if( mysqli_num_rows($q) > 0 )
        {
            while ($resp = mysqli_fetch_assoc($q))
            {
                $orders[$resp['order_id']]['order_id'] = $resp['order_id'];
                $orders[$resp['order_id']]['user_id'] = $resp['user_id'];
                $orders[$resp['order_id']]['order_date'] = $resp['order_date'];
                $orders[$resp['order_id']]['user_fullname'] = $resp['user_fullname'];
                $orders[$resp['order_id']]['amount_ex_tax'] = $resp['amount_ex_tax'];
                $orders[$resp['order_id']]['amount_inc_tax'] = $resp['amount_inc_tax'];
                $orders[$resp['order_id']]['products'] = $resp['products'];
            }
        }

        return $orders;
    }


    // Ajoute un produit
    function order_add($ref, $label, $price, $description, $stock)
    {
        global $sql_conn;

        $sql = "INSERT INTO orders (order_ref, order_label, order_description, order_price, order_stock) VALUES( '{$ref}', '{$label}', '{$description}', '{$price}', '{$stock}' )";

        $q = mysqli_query($sql_conn, $sql) or die(mysqli_error($sql_conn));

        return mysqli_insert_id($sql_conn);
    }

    // Editer un produit
    function order_edit($id, $ref, $label, $price, $description, $stock)
    {
        global $sql_conn;

        $sql = "UPDATE orders SET order_ref = '{$ref}', order_label = '{$label}', order_description = '{$description}', order_price = '{$price}', order_stock = '{$stock}' WHERE order_id = '{$id}'";

        $q = mysqli_query($sql_conn, $sql) or die(mysqli_error($sql_conn));

        return true;
    }

    // Supprimer un produit
    function order_delete($id)
    {
        global $sql_conn;

        $sql = "DELETE FROM orders WHERE order_id = '{$id}'";

        $q = mysqli_query($sql_conn, $sql) or die(mysqli_error($sql_conn));

        return true;
    }
