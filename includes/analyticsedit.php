<?php
        include_once("./db.inc.php");

        $sql = "SELECT * FROM `deletedproducts` ORDER BY `id` DESC;";

        $result = mysqli_query($conn, $sql);

        $data = "";
            
        $rows = "";

        while($res = mysqli_fetch_assoc($result)){
            $rows .= "<tr>
                        <td>{$res['productId']}</td>
                        <td>+233{$res['productName']}</td>
                        <td>{$res['deletedBy']}</td>
                        <td>{$res['dayDeleted']}</td>
                </tr>"; 
            }

            echo $data = "<table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Deleted By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";