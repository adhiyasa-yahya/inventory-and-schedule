<?php  
 include 'db_conn.php';

    $id = $_POST['rowid']; 
    $result = mysqli_query($conn,"SELECT * FROM users where id = '$id'");

    while ($data = mysqli_fetch_array($result)) {
        $nama     = $data['username'];
        $id     = $data['id'];
        $level  = $data['level'];
        $email  = $data['email'];
        ?>

        <form action="action/addUser" method="post" >
            <div class="form-group">
                <label>User Level</label>
                <select class="form-control" name="level">
                    <option disabled>pilih...</option>
                    <?php 
                    $result = mysqli_query($conn,"SELECT * FROM level WHERE id NOT IN (SELECT MIN(id) from level)");
                    $no = 1;
                    while ($data = mysqli_fetch_array($result)) { 
                        $ids = $data['id'];
                        $name = $data['name']; 
                    ?>
                    <option value="<?php echo $ids ?>" <?php echo( "$ids" == "$level"? 'selected' : '')  ?>><?php echo $name; ?></option> 
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="username" required >
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $nama; ?>" placeholder="username" required >
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
                <label>Ganti Password</label>
                <input type="password" class="form-control" name="password" placeholder="password" disabled >
            </div> 
            <div class="form-group">
                <input type="password" class="form-control" name="newpassword"  placeholder="password" disabled >
            </div> 
            <div class="form-group">
                <button type="submit" name="edit" class="btn btn-danger btn-block">Update</button>
            </div>
        </form>
<?php } ?>