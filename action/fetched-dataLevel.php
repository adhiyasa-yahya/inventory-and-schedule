<?php  
 include 'db_conn.php';

    $id = $_POST['rowid']; 
    $result = mysqli_query($conn,"SELECT * FROM level where id = $id");

    $no=0;
    while ($data = mysqli_fetch_array($result)) {
        $id     = $data['id'];
        $nama     = $data['name'];
        $status    = $data['permission']; 
        // $dirs = explode(',', $status);
        $dirs = unserialize($status);

        ?>
        <form action="action/addLevel" method="post" >
            <div class="form-group"> 
            <div class="form-group">
                <label>Name Level</label>
                <input type="text" class="form-control" name="level" placeholder="type level.." value="<?php echo $nama ?>">
            </div>
            <div class="form-group">
                <label>Permission Page User</label> 
                <div class="row">
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="checkbox" class="custom-control-input" id="customCheck21" name="permission[]" value="createUser" <?php if($dirs){if (in_array("createUser", $dirs)){ echo "checked"; }}?>>
                          <label class="custom-control-label" for="customCheck21">Create</label>
                      </div> 
                    </div>  
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="customCheck22" name="permission[]" value="updateUser" <?php if($dirs){if (in_array("updateUser", $dirs)){ echo "checked"; }}?>>
                            <label class="custom-control-label" for="customCheck22">
                                Update
                            </label>
                        </div>
                    </div>  
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="customCheck23" name="permission[]" value="viewUser" <?php if($dirs){if (in_array("viewUser", $dirs)){ echo "checked"; }}?>>
                            <label class="custom-control-label" for="customCheck23">
                                View
                            </label>
                        </div>
                    </div>  
                    <div class="col-6">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="customCheck24" name="permission[]" value="deleteUser" <?php if($dirs){if (in_array("deleteUser", $dirs)){ echo "checked";}}?>>
                            <label class="custom-control-label" for="customCheck24">
                                Delete
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="form-group">
                    <label>Permission Page Level User</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="createLevel" id="customCheck25" <?php if($dirs){if (in_array("createLevel", $dirs)){echo "checked"; }}?>>
                                <label class="custom-control-label" for="customCheck25">
                                    Create
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="updateLevel" id="customCheck26" <?php if($dirs){if (in_array("updateLevel", $dirs)){ echo "checked"; }}?>>
                                <label class="custom-control-label" for="customCheck26">
                                    Update
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="viewLevel" id="customCheck27" <?php if($dirs){if (in_array("viewLevel", $dirs)){ echo "checked"; }}?>>
                                <label class="custom-control-label" for="customCheck27">
                                    View
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="deleteLevel" id="customCheck28" <?php if($dirs){if (in_array("deleteLevel", $dirs)){ echo "checked"; }}?>>
                                <label class="custom-control-label" for="customCheck28">
                                    Delete
                                </label>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="form-group">
                    <label>Permission Page Schedule</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="createSchedule" id="customCheck29" <?php if($dirs){if (in_array("createSchedule", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck29">
                                    Create
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="updateSchedule" id="customCheck210" <?php if($dirs){if (in_array("updateSchedule", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck210">
                                    Update
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="viewSchedule" id="customCheck211" <?php if($dirs){if (in_array("viewSchedule", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck211">
                                    View
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="deleteSchedule" id="customCheck212" <?php if($dirs){if (in_array("deleteSchedule", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck212">
                                    Delete
                                </label>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="form-group">
                    <label>Permission Page Inventory</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="createInventory" id="customCheck213" <?php if($dirs){if (in_array("createInventory", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck213">
                                    Create
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="updateInventory" id="customCheck214" <?php if($dirs){if (in_array("updateInventory", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck214">
                                    Update
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="viewInventory" id="customCheck215" <?php if($dirs){if (in_array("viewInventory", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck215">
                                    View
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" value="deleteInventory" id="customCheck216" <?php if($dirs){if (in_array("deleteInventory", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck216">
                                    Delete
                                </label>
                            </div>
                        </div> 
                    </div>
                </div> 
                <div class="form-group">
                    <label>Permission Page Setting</label>
                    <div class="row">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck217" value="createSetting" <?php if($dirs){if (in_array("createSetting", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck217">
                                    Create
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck218" value="updateSetting" <?php if($dirs){if (in_array("updateSetting", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck218">
                                    Update
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck219" value="viewSetting" <?php if($dirs){if (in_array("viewSetting", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck219">
                                    View
                                </label>
                            </div>
                        </div>  
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="permission[]" id="customCheck200" value="deleteSetting" <?php if($dirs){if (in_array("deleteSetting", $dirs)){ echo "checked";}}?>>
                                <label class="custom-control-label" for="customCheck200">
                                    Delete
                                </label>
                            </div>
                        </div> 
                    </div>
                </div> 
            </div> 
            <div class="form-group">
                <button type="submit" name="edit" class="btn btn-danger btn-block">Update</button>
            </div>
        </form>
<?php } ?>