<?php
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/connection_db.php';

    $results = $crud->getSpecialties();
?>
        <!--         
            - First name
            - Last name
            - Date of birth (use DatePicker)
            - Area of Expertise (Database Administrator, Software Developer, Web Administrator)
            - Email address
            - Contact number
        -->

        <h1 class="text-center m-5">Registration for IT Conference</h1>

        <form method="post" action="success.php" enctype="multipart/form-data" class="mx-3">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input required type="text" class="form-control" id="firstName" name="firstName" style="border-radius: 0.7rem;">
            </div>
            <div class="mb-3">
                <label for=lastName" class="form-label">Last Name</label>
                <input required type="text" class="form-control" id="lastName" name="lastName" style="border-radius: 0.7rem;">
            </div>
            <div class="mb-3">
                <label for="dateOfBirth" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" style="border-radius: 0.7rem;">
            </div>
            <div class="mb-3">
                <label for="specialty" class="form-label">Area of Expertise</label>
                <select class="form-select" id="specialty" name="specialty" style="border-radius: 0.7rem;">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value= "<?php echo $r['pk_specialty_id'] ?>"> <?php echo $r['name']?> </option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input required type="email" class="form-control" id="email" name="email" style="border-radius: 0.7rem;">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="phone" name="phone" style="border-radius: 0.7rem;">
                <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Upload Avatar</label>
                <input type="file" accept="image/*" class="form-control" id="avatar" name="avatar" style="border-radius: 0.7rem;">
                <div id="avatarHelp" class="form-text">(Optional)<span style="color: #3da9fc; font-weight: bold;">*</span></div>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary fs-5 w-100" style="height: 4rem; border-radius: 0.7rem;">Submit</button>
        </form>

<?php
    require_once 'includes/footer.php';
?>