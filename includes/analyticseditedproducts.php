<?php
        include_once("./db.inc.php");

        $sql = "SELECT * FROM `productedits` ORDER BY `id` DESC;";

        $result = mysqli_query($conn, $sql);

        $data = "";
            
        $rows = "";

        while($res = mysqli_fetch_assoc($result)){
            $rows .= "<tr>
                        <td>{$res['productName']}</td>
                        <td>{$res['productPrice']}</td>
                        <td>{$res['instock']}</td>
                        <td>{$res['addedstock']}</td>
                        <td>{$res['totalstock']}</td>
                        <td>{$res['action']}</td>
                        <td>{$res['dayEdited']}</td>
                        <td>{$res['user']}</td>
                </tr>"; 
            }

            echo $data = "<table>
                <thead>
                    <tr>
                    <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Previous Stock</th>
                        <th>Added Stock</th>
                        <th>Total Stock</th>
                        <th>Action</th>
                        <th>Date Edited</th>
                        <th>Edited By</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";