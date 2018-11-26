<?php
require '../models/data.php';
require '../entities/Warrior.php';

/**
 * instance of class personnageManager in data.php
 */
$manager = new personnageManager($db);

/**
 * Condition and if is verified, add warior in db, save method in variable for display
 */
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

/**
 * Condition if link is clicked, go attack
 */
if (isset($_GET['name'])){
    $warrior = $manager->getWarrior($_GET['name']);
    $warrior->hit();
    $manager->update($warrior);
    header('Location: index.php');
    /**
     * condition if damage egal or superieur at 100, deleting warrior to db
     */
    if($warrior->getDamage() >= 100){
        $manager->delete($warrior);
    }
}

/**
 * Display warriors and user warrior
 */
$warriors_all = $manager->getWarriors();
$getLastWarrior = $manager->getLastWarrior();
include "../views/indexVue.php";
 ?>
