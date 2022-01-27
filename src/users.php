<section class="usersPage">
    <header>
        <h3>Users</h3>

        <div class="userid"></div>
        <div class="userdetails">
            <p><?=$_SESSION["username"]?></p>
            <a href="?pgname=edituser&userid=<?=$_SESSION["userid"]?>">edit user</a>
            <form action="../includes/logout.php"><button type="submit">logout</button></form>
        </div>
    </header>

    <div class="filterbtns">
        <button class="addUserBtn"><i class="fas fa-plus"></i> Add new user</button>
    </div>

    <div class="content">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="ordersList">
                <tr>
                    <td>codejunior</td>
                    <td class="tr">Michael</td>
                    <td>Essien</td>
                    <td class="tr">essienmichael4@gmail.com</td>
                    <td>test1234</td>
                    <td class="tr">superadmin</td>
                    <td><a href="">Edit</a><a href="">Delete</a></td>
                </tr>
                <tr>
                    <td>codejunior</td>
                    <td class="tr">Michael</td>
                    <td>Essien</td>
                    <td class="tr">essienmichael4@gmail.com</td>
                    <td>test1234</td>
                    <td class="tr">superadmin</td>
                    <td><a href="">Edit</a><a href="">Delete</a></td>
                </tr>
                <tr>
                    <td>codejunior</td>
                    <td class="tr">Michael</td>
                    <td>Essien</td>
                    <td class="tr">essienmichael4@gmail.com</td>
                    <td>test1234jjjjjjjjjjjjjjjjjjjjgggggggghhhhhhd</td>
                    <td class="tr">superadmin</td>
                    <td><a href="">Edit</a><a href="">Delete</a></td>
                </tr>
                        
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
                    <option value="admin">Admin</option>
                    <option value="super">Superadmin</option>
                </select>

                <div class="box">
                    <div class="boxContainer">
                        <label for="">Password</label>
                        <input type="text" name="password" class="password">
                    </div>
                    <div class="boxContainer">
                        <label for="">Password repeat</label>
                        <input type="text" name="passwordRep" class="passwordRep">
                    </div>
                </div>

                <p class="err">Error: Form not submitted</p>
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