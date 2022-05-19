<section class="usersPage">
    <header>
        <h3>Analytics</h3>

        <div class="userid"></div>
        <div class="userdetails">
            <p><?=$_SESSION["username"]?></p>
            <a href="?pgname=edituser&userid=<?=$_SESSION["uid"]?>">edit user</a>
            <form action="../includes/logout.php"><button type="submit">logout</button></form>
        </div>
    </header>

    <div class="filterbtns">
        <button class="editedproducts">Edited Products</button>
        <button class="deletedproducts">Deleted Products</button>
        <button class="deletedusers"> Deleted Users</button>
    </div>
    
    <div class="content">
        
    </div>
    </section>
</main>

<script src="../js/analytics.js"></script>