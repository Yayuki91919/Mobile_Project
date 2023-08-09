<?php 
include_once __DIR__.'/../controller/packageController.php';
$id=$_POST['id'];

$package_con=new PackageController();
$result=$package_con->deletePackage($id);
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