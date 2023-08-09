<?php
include_once __DIR__.'/../model/tutorial.php';

class TutorialController extends Tutorial{
    public function getTutorial(){
        return $this->getTutorialInfo();
    }
    public function addTutorial($name,$detail,$posts,$download_link,$type){
        return $this->createTutorial($name,$detail,$posts,$download_link,$type);
    }
    public function getTutorialById($id){
        return $this->getTutorialInfoById($id);
    }
    public function updateTutorial($id,$name,$detail,$posts,$download_link,$type){
        return $this->editTutorial($id,$name,$detail,$posts,$download_link,$type);
    }
    public function deleteTutorial($id){
        return $this->deleteTutorialInfo($id);
    }
}
?>