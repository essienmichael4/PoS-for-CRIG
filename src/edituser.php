<section class="editUser">
    <header>
        <h2>Edit User</h2>
        <div class="userid"></div>
        <div class="userdetails">
            <p><?=$_SESSION["username"]?></p>
            <a href="?pgname=edituser&userid=<?=$_SESSION["uid"]?>">edit user</a>
            <form action="../includes/logout.php"><button type="submit">logout</button></form>
        </div>

    </header>
    <?php
        $id = $_GET["userid"];
        include_once("../includes/db.inc.php");

        $sql = "SELECT * FROM `admin` WHERE `id` = {$id}";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
    ?>

    <div class="editUserContainer">
        <div class="profile">
            <h4>Profile Details</h4>
            <div class="profilePic">
            </div>
        </div>
        <div class="profileDetails">
            <div class="left">
                <div class="box">
                    <div class="boxContainer">
                        <label for="">First name</label>
                        <input type="text" name="firstname" class="firstname" value="<?=$user["firstname"]?>">
                    </div>
                    <div class="boxContainer">
                        <label for="">Last name</label>
                        <input type="text" name="lastname" class="lastname" value="<?=$user["lastname"]?>">
                    </div>
                </div>
                
                <label for="">Username</label>
                <input type="text" name="username" class="username" value="<?=$user["username"]?>">
                <input type="text" name="uid" class="uid" value="<?=$user["id"]?>" hidden>
                <label for="">Email</label>
                <input type="emial" name="email" class="email" value="<?=$user["email"]?>">

                <label for="" class="utype">User type: <span class="usertype"><?=$user["usertype"]?></span> </label>

                <?php
                    if($_SESSION["usertype"]=="superadmin"){
                ?>
                <label for="">Change user type</label>
                <select name="usertype" id="usertype">
                    <option>None</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="super">Superadmin</option>
                </select>
                <?php
                    }
                ?> 

                <p class="err">Error input</p>

                <div class="box1">
                    <a href="?pgname=users">Leave</a>
                    <button class="changeUserInfo">Save Changes</button>
                </div>
                
            </div>
        
            <div class="right">
                <?php
                    if($user["id"] == $_SESSION["uid"]){
                ?>
                <label for="">Old Password</label>
                <input type="text" name="oldpassword" class="oldPassword">

                <label for="">New Password</label>
                <input type="text" name="newpassword" class="newPassword">
                        
                <label for="">Confirm New Password</label>
                <input type="text" name="npasswordRep" class="newPasswordRep">
                <button class="changePassword">Change Password</button>
                <?php
                    }else{
                ?>
                <label for="">New Password</label>
                <input type="text" name="newpassword" class="newPassword">

                <label for="">Confirm New Password</label>
                <input type="text" name="npasswordRep" class="newPasswordRep">
                <button class="changePassword1">Change Password</button>
                <?php
                    }
                ?>

                <button class="deleteAccount">Delete User Account</button>
            </div>
                
        </div>
    </div>

    <div class="deleteUser">
        <form class="delContainer" action="../includes/deleteUserAccount.php" method="POST">
            
            <input type="text" name="sid" class="sid" value="<?=$_SESSION["uid"]?>" hidden>
            <input type="text" name="uid" class="uid" value="<?=$user["id"]?>" hidden>

            <h3>Do you want to continue with this operation? This operation can't be reversed.</h3>
            <label for="">Enter Password to Confirm</label>
                <input type="text" name="password" class="oldPassword">
            <div class="box">
                <a class="cancelbtn">Cancel</a>
                <button type="submit" class="deletebtn">Delete This User Account</button>
            </div>
            
        </form>
    </div>
</section>
</main>

<script src="../js/editUser.js"></script>
<script src="../js/editutilities.js"></script>