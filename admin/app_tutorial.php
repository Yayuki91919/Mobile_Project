<?php
include_once __DIR__ . '/../layouts/admin_sidebar.php';
include_once __DIR__ . '/../controller/tutorialController.php';


$tuto_controller = new TutorialController();
$tutorials=$tuto_controller->getTutorial();

?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title my-2">List of Tutorials</h4>

                <a class="btn btn-outline-success my-3" href="add_tutorial.php">Add New Tutorial  +</a>
                
                <div class="table-responsive">
                    <table class="table table-dark" id="mytable">
                        <thead>
                        <tr>
                            <th> No</th>
                            <th> Name</th>
                            <th> Details</th>
                            <th> Posts</th>
                            <th> Download_link</th>
                            <th> Package Type</th>
                            <th >Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $count = 1;
                        foreach ($tutorials as $tutorial) {
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $tutorial['tname']; ?></td>
                                <td><?php echo $tutorial['tdetails']; ?></td>
                                <td><?php echo $tutorial['tposts']; ?></td>
                                <td><?php echo $tutorial['download_link']; ?></td>
                                <td><?php echo $tutorial['type'] ?></td>
                                <td id='<?php echo $tutorial['tid']; ?>'><a class="btn btn-outline-primary mx-3" href="edit_tutorial.php?id=<?php echo $tutorial['tid']; ?>"><i class="ri-pencil-line"></i>Edit</a>
                                <a class="delete_tutorial btn btn-outline-danger "><i class="ri-delete-bin-2-line"></i>Delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
include_once __DIR__ . '/../layouts/admin_footer.php';
?>