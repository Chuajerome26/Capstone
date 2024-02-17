<!-- Content for the "View Details" modal -->
<div class="container mt-5">
    <form method="post" enctype="multipart/form-data" action="../functions/edit-applicant-info.php">
    <?php 
    $applifiles = $admin->scholarInfo($id);
    
    foreach($applifiles as $a){
        
  ?>
            <div class="form-group">
            <label for="<?= $a['requirement_name'] ?>"><?= $a['requirement_name'] ?></label>
            <?php if (!empty($a['file_name'])) { ?>
                <a href="../Scholar_files/<?= $a['file_name'] ?>" target="_blank"><?= $a['file_name'] ?></a>
            <?php } ?>
            <input class="form-control" type="file" id="<?= $a['requirement_name'] ?>" name="<?= $a['requirement_name'] ?>" accept=".pdf">
        </div>
    <?php } ?>
        <input type="hidden" class="text" name="id" value="<?php echo $a['scholar_id'];?>">
        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>