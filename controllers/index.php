<?php
require '../models/data.php';
require '../entities/Warrior.php';


$manager = new personnageManager($db);
// $manager->getWarrior($warrior_1);
// $manager->exist($warrior_3);
// $manager->getWarrior($warrior_2);
if(isset($_POST['create'])){
    if (!empty($_POST['name'])){
        if($manager->exist($_POST['name']) == 0)
        {
            $manager->add($_POST['name']);
            $warriors_all = $manager->getWarriors();
            $getLastWarrior = $manager->getLastWarrior();
            
            
            
            
        }else{
            echo 'Ce nom de guerrier est déja utilisé';
        }
    }
}

if (isset($_GET['name'])){
    $warrior = $manager->getWarrior($_GET['name']);
    $warrior->hit();
    $manager->update($warrior);
    header('Location: index.php');
    if($warrior->getDamage() >= 100){
        $manager->delete($warrior);
    }

   
    
    
}



$warriors_all = $manager->getWarriors();
$getLastWarrior = $manager->getLastWarrior();
include "../views/indexVue.php";
 ?>
