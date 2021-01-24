<?php

//convertendo a ID que vem como string para inteiro
$num = (int)$_GET['id'];

$n = new \App\Control();
$nome = new \App\Crud();

$n->setId($num);

//$nome->selectOne($n);

foreach($nome->selectOne($n) as $n){
    //echo "foreach".$n['id'].$n['firstname'].$n['lastname']."<br>";
    $id = $n['id'] ;
    $firstname = $n['firstname'];
    $lastname = $n['lastname'];

}

?>

<main>

    <section>
        <a href="index.php"><!--colocar o link do index-->
            <button class="btn btn-info">Voltar</button>
        </a>
    </section>

     <h2 class="mt-3">Atualizar Cadastro</h2>

      <div class="jumbotron bg-light text-dark center" style="width: 10%" > ID: <?php echo $id; ?></div>
      <form action="update.php" method="POST">
      
      <div class="form-group">

      <Input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
      
        <label>Nome</label>
        <Input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
      
      </div>

      <div class="form-group">
      
      <label>Sobrenome</label>
      <Input type="text" class="form-control" name="lastname" value="<?php echo $lastname ; ?>">
      
    
    </div>
<section>
    <div class="form-group">
      
      <button type="submit" class="btn btn-info mt-3">Atualizar</button>
    
    </div>
</section>
      </form>


</main>