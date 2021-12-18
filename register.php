<?php
    $title = 'REGISTER';
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

    <h1 class="register-title-admin text-center">REGISTER</h1>

    <div class="sub-card-admin">
        <div class="card-admin p-5">
            <form method="post" action="success.php" enctype="multipart/form-data" class="mx-2">
                <div class="mb-3">
                    <label for="username" class="user-reg-label-admin form-label">USERNAME</label>
                    <input required type="text" class="user-reg-input-admin form-control" id="username" name="username">
                </div>
                                <div class="mb-3">
                    <label for=password" class="pass-reg-label-admin form-label">PASSWORD</label>
                    <div class="block-reg-pass-admin">
                        <input required type="password" class="form-control pass-reg-input-admin" id="password" name="password">
                        <button type="button" onclick="showPassword()" class="eyepass-admin"><span id="iconeye" class="fas fa-eye"></span></button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="email-reg-label-admin form-label">EM@IL ADDRESS</label>
                    <input required type="email" class="email-reg-input-admin form-control" id="email" name="email">
                    <div id="emailHelp" class="email-reg-info-label-admin">We'll never share your email with anyone else.</div>
                </div>
                <br>
                <button type="submit" id="submit" name="submit" class="submit-reg-admin">Submit</button>
            </form>
        </div>
    </div>
<?php
    require_once 'includes/footer.php';
?>