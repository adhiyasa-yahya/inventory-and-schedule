<?php  
 include 'db_conn.php';

    $id = $_POST['rowid']; 
    $result = mysqli_query($conn,"SELECT * FROM schedule where id = $id");

    $no=0;
    while ($data = mysqli_fetch_array($result)) {
        $nama     = $data['dates'];
        $id     = $data['id'];
        $status    = $data['description']; 
        ?>
        <form action="action/addScedule" method="post" >
            <div class="form-group">
                <label>Pilih Hari</label>
                <input type="date" class="form-control" name="dates" value="<?php echo $nama ?>" required>
                <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
            </div>
            <div class="form-group">
                <label>Keterangan Jadwal</label>
                <textarea class="form-control" rows="3" name="desc" required><?php echo $status ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="edit" class="btn btn-danger btn-block">Update</button>
            </div>
        </form>
<?php } ?>