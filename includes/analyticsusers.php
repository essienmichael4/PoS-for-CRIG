<?php
        include_once("./db.inc.php");

        $sql = "SELECT * FROM `deletedusers` ORDER BY `id` DESC;";

        $result = mysqli_query($conn, $sql);

        $data = "";
            
        $rows = "";

        while($res = mysqli_fetch_assoc($result)){
            $rows .= "<tr>
                        <td>{$res['name']}</td>
                        <td>+233{$res['username']}</td>
                        <td>{$res['deletedby']}</td>
                        <td>{$res['daydeleted']}</td>
                </tr>"; 
            }

            echo $data = "<table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Deleted By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";