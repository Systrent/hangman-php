<?php
    $title = 'Edit Record';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/connection_db.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        include 'includes/error_message.php';
        header('Location: viewrecords.php');
    }
    else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
?>
        <h1 class="text-center m-5">Edit Record</h1>

        <form method="post" action="editpost.php" class="mx-3">
            <input type="hidden" value="<?php echo $attendee['pk_attendee_id'] ?>" name="id">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>" id="firstName" name="firstName" style="border-radius: 0.7rem;">
            </div>
            <div class="mb-3">
                <label for=lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" value="<?php echo $attendee['lastname']?>" id="lastName" name="lastName" style="border-radius: 0.7rem;">
            </div>
            <div class="mb-3">
                <label for="dateOfBirth" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']?>" id="dateOfBirth" name="dateOfBirth" style="border-radius: 0.7rem;">
            </div>
            <div class="mb-3">
                <label for="specialty" class="form-label">Area of Expertise</label>
                <select class="form-select" id="specialty" name="specialty" style="border-radius: 0.7rem;">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value= "<?php echo $r['pk_specialty_id'] ?>"<?php if($r['pk_specialty_id'] == $attendee['pk_specialty_id']) echo 'selected' ?>>
                        <?php echo $r['name']?>
                    </option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" value="<?php echo $attendee['emailaddress']?>" id="email" name="email" style="border-radius: 0.7rem;">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="text" class="form-control" value="<?php echo $attendee['contactnumber']?>" id="phone" name="phone" style="border-radius: 0.7rem;">
                <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-success fs-5 w-100" style="height: 4rem; border-radius: 0.7rem;">Save Changes</button>
            <a href="viewrecords.php" class="btn btn-dark w-100 mt-3" style="border-radius: 0.7rem; line-height: 1.9rem; height: 2.8rem;">Back to List</a>
        </form>
<?php } ?>
<?php
    require_once 'includes/footer.php';
?>