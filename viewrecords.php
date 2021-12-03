<?php
    $title = 'View Records';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/connection.php';

    //Get all attendees
    $results = $crud->getAttendees();
?>
    <div class="table-responsive-xxl">
        <table class="table table-hover align-middle my-5">
            <thead class="table-dark text-center">
                <tr>
                    <th class="px-0">#</th>
                    <th class="px-0">First Name</th>
                    <th class="px-0">Last Name</th>
                    <th class="px-0">Specialty</th>
                    <th class="px-0">Actions</th>
                </tr>
            </thead>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>
                    <td class="text-center p-1"><?php echo $r['pk_attendee_id'] ?></td>
                    <td class="text-center p-1"><?php echo $r['firstname'] ?></td>
                    <td class="text-center p-1"><?php echo $r['lastname'] ?></td>
                    <td class="text-center p-1"><?php echo $r['name'] ?></td>
                    <td class="text-center p-1">
                        <a href="view.php?id=<?php echo $r['pk_attendee_id'] ?>" class="btn btn-primary" style="border-radius: 0.7rem; line-height: 1.9rem; height: 2.8rem;">View</a>
                        <a href="edit.php?id=<?php echo $r['pk_attendee_id'] ?>" class="btn btn-warning my-1" style="border-radius: 0.7rem; line-height: 1.9rem; height: 2.8rem;">Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $r['pk_attendee_id'] ?>" class="btn btn-danger" style="border-radius: 0.7rem; line-height: 1.9rem; height: 2.8rem;">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php
    require_once 'includes/footer.php';
?>