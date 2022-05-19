<section class="usersPage">
    <header>
        <h3>Users</h3>

        <div class="userid"></div>
        <div class="userdetails">
            <p><?=$_SESSION["username"]?></p>
            <a href="?pgname=edituser&userid=<?=$_SESSION["uid"]?>">edit user</a>
            <form action="../includes/logout.php"><button type="submit">logout</button></form>
        </div>
    </header>

    <div class="filterbtns">
        <button class="addUserBtn"><i class="fas fa-plus"></i> Add new user</button>
    </div>

    <?php
        include_once("../includes/db.inc.php");
        $sql = "";

        if($_SESSION["usertype"] =="user"){
            $sql = "SELECT * FROM `admin` WHERE `usertype` = '{$_SESSION["usertype"]}';";
        }else if($_SESSION["usertype"] =="admin"){
            $sql = "SELECT * FROM `admin` WHERE `usertype` = 'user' OR `usertype` = '{$_SESSION["usertype"]}';";
        }else{
            $sql = "SELECT * FROM `admin`";
        }

        $result = mysqli_query($conn, $sql);

    ?>
        

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>User type</th>
                    <?php
                        if($_SESSION["usertype"] == "superadmin" || $_SESSION["usertype"] == "admin"){
                    ?>
                    <th>Actions</th>
                    <?php
                        }
                    ?>
                </tr>
            </thead>
            <tbody class="ordersList">
                <?php
                    while($row = mysqli_fetch_assoc($result)){

                ?>
                <tr>
                    <td><?=$row["username"]?></td>
                    <td class="tr"><?=$row["firstname"]?></td>
                    <td><?=$row["lastname"]?></td>
                    <td class="tr"><?=$row["email"]?></td>
                    
                    <td class="tr"><?=$row["usertype"]?></td>
                    <?php
                        if($_SESSION["usertype"] == "superadmin" || $_SESSION["usertype"] == "admin"){
                    ?>
                    <td><a href="?pgname=edituser&userid=<?=$row["id"]?>">Edit</a></td>
                    <?php
                        }
                    ?>
                </tr>

                <?php
                    }
                ?>
                        
            </tbody>
        </table>
    </div>

    <div class="addUser">
        <div class="userContainer">
            <div class="header">
                <h2>Add User</h2>
                <i class="fas fa-times remove"></i>
            </div>

            <div class="body">
                <h4>Personal Information</h4>
                <div class="box">
                    <div class="boxContainer">
                        <label for="">First name</label>
                        <input type="text" name="firstname" class="firstname" placeholder="Example">
                    </div>
                    <div class="boxContainer">
                        <label for="">Last name</label>
                        <input type="text" name="lastname" class="lastname" placeholder="Example">
                    </div>
                </div>
                
                <label for="">Username</label>
                <input type="text" name="username" class="username" placeholder="example">
                <label for="">Email</label>
                <input type="emial" name="email" class="email" placeholder="example@gmail.com">

                <label for="">User type</label>
                <select name="usertype" id="usertype">
                    <option value="user">User</option>
                    <?php
                        if($_SESSION["usertype"]=="admin" || $_SESSION["usertype"]=="superadmin"){
                            echo '<option value="admin">Admin</option>';
                        }
                        if($_SESSION["usertype"]=="superadmin"){
                            echo '<option value="super">Superadmin</option>';
                        }
                    ?>
                </select>

                <div class="box">
                    <div class="boxContainer">
                        <label for="">Password</label>
                        <input type="password" name="password" class="password">
                    </div>
                    <div class="boxContainer">
                        <label for="">Password repeat</label>
                        <input type="password" name="passwordRep" class="passwordRep">
                    </div>
                </div>

                <p class="err"></p>
            </div>

            <div class="footer">
                <button class="cancel">cancel</button>
                <button type="submit" class="addusersumbit">add user</button>
            </div>
        </div>
    </div>
</section>
</main>

<script src="../js/userUtilities.js"></script>