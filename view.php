<?php
    $title = 'View Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/connection.php';

    //Get attendee by id
    if(!isset($_GET['id'])){
        include 'includes/error_message.php';
    }
    else{
        $id = $_GET['id'];
        $result = $crud->getAttendeeDetails($id);
?>
    <div class="d-flex justify-content-center">
        <div class="card mx-3 mt-5 mb-4 p-0 border border-1 border-primary shadow" style="max-width: 22.7rem; border-radius: 0.7rem;">
            <img src="<?php echo empty($result['avatar_path']) ? 'uploads/blank.png' : $result['avatar_path']; ?>" class="card-img-top" alt="Avatar Image" style="border-radius: 0.7rem; object-fit: cover; width: 100%; height: 30vh;">
            <div class="card-body">
                <h5 class="card-title mx-2">
                    <?php echo $result['firstname'] . ' ' . $result['lastname']; ?>
                </h5>
                <h6 class="card-subtitle mb-3 mx-2 text-muted">
                    <?php echo $result['name']; ?>
                </h6>
                <p class="card-text mx-2">
                    Date Of Birth: <?php echo $result['dateofbirth']; ?>
                </p>
                <p class="card-text mx-2">
                    Email Address: <?php echo $result['emailaddress']; ?>
                </p>
                <p class="card-text mx-2">
                    Contact Number: <?php echo $result['contactnumber']; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center gap-2">
        <a href="viewrecords.php" class="btn btn-dark" style="border-radius: 0.7rem; line-height: 1.9rem; height: 2.8rem;">Back to List</a>
        <a href="edit.php?id=<?php echo $result['pk_attendee_id'] ?>" class="btn btn-warning" style="border-radius: 0.7rem; line-height: 1.9rem; height: 2.8rem;">Edit</a>
        <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['pk_attendee_id'] ?>" class="btn btn-danger" style="border-radius: 0.7rem; line-height: 1.9rem; height: 2.8rem;">Delete</a>
    </div>
<?php } ?>
<?php
    require_once 'includes/footer.php';
?>