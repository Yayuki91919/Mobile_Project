<?php
include_once __DIR__.'/../layouts/admin_sidebar.php';
include_once __DIR__.'/../controller/tutorialController.php';
include_once __DIR__.'/../controller/PackageController.php';

// convert illegal input value to ligal value formate
function text_input($value) {
	$value = trim($value);
	return $value;
  }
  $id=$_GET['id'];
$package_controller=new PackageController();
$tuto_controller=new TutorialController();
$packages=$package_controller->getPackage();
$tuto=$tuto_controller->getTutorialById($id);
$name=$detail=$posts=$type=$nameErr=$detailErr=$postsErr=$typeErr=$linkErr=$download_link="";

//input fields are Validated with regular expression
$validName="/^[a-zA-Z\/ ]*$/";
if(isset($_POST['submit']))
{
	if(!preg_match($validName,$_POST['name'])){
		$nameErr="Name aren't allowed digits.";

	}else{
		$name=text_input($_POST['name']);
	}
    if(empty($_POST['details'])){
		$detailErr="Details is required!";
	}else{
		$detail=text_input($_POST['details']);
	}
    if(empty($_POST['posts'])){
		$postsErr="Posts is required!";
	}else{
		$posts=text_input($_POST['posts']);
	}
    if(empty($_POST['type'])){
		$typeErr="Package type is required!";
	}else{
		$type=text_input($_POST['type']);
	}
    if(empty($_POST['download_link'])){
		$linkErr="Download link is required!";
	}else{
		$download_link=text_input($_POST['download_link']);
	}
    if(empty($nameErr) && empty($detailErr) && empty($detailErr) && empty($linkErr)){
        $status=$tuto_controller->updateTutorial($id,$name,$detail,$posts,$download_link,$type);
        if($status){
            echo "<script>location.href='app_tutorial.php'</script>";
        }
    }
}	
    
?>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title my-3">Create New Tutorial</h4>
                <form class="forms-sample" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName1">Tutorial Name</label>
                        <input type="text" name="name" value="<?php echo $tuto['tname']; ?>" class="form-control" id="exampleInputName1" required>
                        <span class="text-danger"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="form-group">
                    <label for="">Tutorial Details</label>
                    <textarea name="details" id="summernote" cols="30" rows="10" class="form-control mb-3"><?php echo $tuto['tdetails']; ?></textarea>
                    <span class="text-danger fs-5"><?php echo $detailErr; ?></span>
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <label for="exampleInputName1">Tutorial Posts</label>
                        <input type="text" name="posts" value="<?php echo $tuto['tposts']; ?>" class="form-control" id="exampleInputName1" placeholder="Tutorial Posts" required>
                        <span class="text-danger"><?php echo $postsErr; ?></span>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName1">Download_link</label>
                        <input type="text" name="download_link" value="<?php echo $tuto['download_link']; ?>" class="form-control" id="exampleInputName1" required>
                        <span class="text-danger"><?php echo $linkErr; ?></span>
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputName1">Package Type</label>
                        <select name="type" class="form-control" id="">
                            <option value="<?php echo $tuto['pid']; ?>"><?php echo $tuto['type']; ?></option>
                            <?php foreach($packages as $package){ ?>
                                <option value="<?php echo $package['id'] ?>" class="form-control"><?php echo $package['name'] ?></option>
                           <?php } ?>
                            
                        </select>
                    </div> 

                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="cancel" class="btn btn-dark">Cancel</button>
                </form>
            </div>
        </div>
    </div>
<?php
include_once __DIR__.'/../layouts/admin_footer.php';
?>
