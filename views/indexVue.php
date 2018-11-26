<?php
  include("template/header.php")
 ?>
 <section>
  <div class="container">
    <div class="row">
      <form class="col-md-5 mt-5 bg-success d-flex justify-content-center mx-auto p-3 border border-dark" action="index.php" method="post">
          <p>
            Nom : <input type="text" name="name" maxlength="50" />
            <input type="submit" value="Créer ce personnage" name="create" />
          </p>
        </form>
      </div>
        <?php foreach ($getLastWarrior as $warrior) { ?>
          <div class="row">
            <div class="bg-warning col-md-5 mt-2 d-flex justify-content-center mx-auto p-3 border border-dark">
              <h1 class="text-info font-weight-bold"><?php echo $warrior->getNames(); ?></h1>
            </div>
          </div>
        <?php } ?>

        <?php foreach ($warriors_all as $warrior) { ?>
          
          <div class="row">
            <a class="col-md-5 bg-dark mt-1 mx-auto p-3 border border-dark" href="?name=<?php echo $warrior->getNames(); ?>">
              <div>
                <p class="font-weight-bold d-flex justify-content-center">Name : <?php echo $warrior->getNames(); ?></p>
                <p class="d-flex justify-content-center">Damage : <?php echo $warrior->getDamage(); ?></p>
              </div> 
            </a> 
          </div> 
          
        <?php } ?>
    </div>
  </section>
 <?php
   include("template/footer.php")
  ?>
