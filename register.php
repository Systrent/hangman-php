<?php
    $title = 'USER LOGIN';
    require_once 'includes/header.php';
    require_once 'db/connection.php';

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

    <h1 class="text-center m-5">Registration</h1>

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
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" style="border-radius: 0.7rem;">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <button type="submit" id="submit" name="submit" class="btn btn-primary fs-5 w-100" style="height: 4rem; border-radius: 0.7rem;">Submit</button>
    </form>
<?php
    require_once 'includes/footer.php';
?>