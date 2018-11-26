<?php
  include("template/header.php")
 ?>
  <form action="index.php" method="post">
      <p>
        Nom : <input type="text" name="name" maxlength="50" />
        <input type="submit" value="Créer ce personnage" name="create" />
      </p>
    </form>

    <?php foreach ($getLastWarrior as $warrior) { ?>
      <p class="text-success"><?php echo $warrior->getNames(); ?></p>
    <?php } ?>

    <?php foreach ($warriors_all as $warrior) { ?>   
      <p><a href="?name=<?php echo $warrior->getNames(); ?>">Name : <?php echo $warrior->getNames(); ?></a></p>
      <p>Damage : <?php echo $warrior->getDamage(); ?></p>
    <?php } ?>

 <?php
   include("template/footer.php")
  ?>
