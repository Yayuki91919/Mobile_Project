<?php
include_once __DIR__ . '/../vendor/database/database.php';

class Tutorial{
   
    public function getTutorialInfo(){
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2. write sql
        $sql="select tutorials.id as tid,packages.id as pid,tutorials.name as tname,tutorials.details as tdetails, tutorials.posts as tposts,packages.name as type,tutorials.download_link as download_link from tutorials join packages where packages.id=tutorials.packages_id";
        $statement=$con->prepare($sql);
       //3. sql excute
    if($statement->execute())
    {
    //4. result
    //date fetch()==>one row, fetchall()==>multiple row
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $result;
   }
   public function createTutorial($name,$detail,$posts,$download_link,$type){
    //1.db connection
    $con=Database::connect();
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //2. write sql
    $sql="insert into tutorials(name,details,posts,download_link,packages_id)
     values (:name,:details,:posts,:download_link,:packages_id)";
    $statement=$con->prepare($sql);
    $statement->bindParam(':name',$name);
    $statement->bindParam(':details',$detail);
    $statement->bindParam(':posts',$posts);
    $statement->bindParam(':download_link',$download_link);
    $statement->bindParam(':packages_id',$type);

    if($statement->execute())
    {
        return true;
    }
    else
    {
        return false;
    }
   }
   public function getTutorialInfoById($id){
    //1.db connection
    $con=Database::connect();
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //2. write sql
    $sql="select tutorials.id as tid,packages.id as pid,tutorials.name as tname,tutorials.details as tdetails, tutorials.posts as tposts,packages.name as type,tutorials.download_link as download_link from tutorials join packages where packages.id=tutorials.packages_id and tutorials.id=:id";
    $statement=$con->prepare($sql);
    $statement->bindParam(':id',$id);
   //3. sql excute
if($statement->execute())
{
//4. result
//date fetch()==>one row, fetchall()==>multiple row
    $result=$statement->fetch(PDO::FETCH_ASSOC);
}
return $result;
   }
   public function editTutorial($id,$name,$detail,$posts,$download_link,$type){
     //1.db connection
     $con=Database::connect();
     $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     //2. write sql
     $sql='update tutorials set name=:name,details=:details,posts=:posts,download_link=:download_link,packages_id=:packages_id where id=:id';
     $statement=$con->prepare($sql);   
     $statement->bindParam(':id',$id);
     $statement->bindParam(':name',$name);
     $statement->bindParam(':details',$detail);
     $statement->bindParam(':download_link',$download_link);
     $statement->bindParam(':posts',$posts);
     $statement->bindParam(':packages_id',$type);
     if($statement->execute())
     {
       return true;
     }
     else
     {
       return false;
     }
   }
   public function deleteTutorialInfo($id){
    //1.db connection
    $con=Database::connect();
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //2. write sql
    $sql='delete from tutorials where id=:id';
    $statement=$con->prepare($sql);   
    $statement->bindParam(':id',$id);
    try{
       $statement->execute();
    }
    catch(PDOException $e)
    {
       return false;
    }
    if($statement->execute())
    {
     return true;
    }
   }
}
?>