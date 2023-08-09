<?php 
include_once __DIR__.'/../controller/tutorialController.php';
$id=$_POST['id'];

$tuto_con=new TutorialController();
$result=$tuto_con->deleteTutorial($id);
if($result)
{
    echo "success";
}
else{
    echo "You can't delete as it has related child data.";
    //cascade
    //restrict

}


?>