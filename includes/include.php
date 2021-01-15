<main>

    <section>
        <a href="index.php"><!--colocar o link do index-->
            <button class="btn btn-info">Voltar</button>
        </a>
    </section>

     <h2 class="mt-3">Cadastro de Nome</h2>

      <form action="" method="POST">
      
      <div class="form-group">
      
        <label>Nome</label>
        <Input type="text" class="form-control" name="firstname">
      
      </div>

      <div class="form-group">
      
      <label>Sobrenome</label>
      <Input type="text" class="form-control" name="lastname">
      
    
    </div>
<section>
    <div class="form-group">
      
      <button type="submit" class="btn btn-info mt-3">Cadastrar</button>
    
    </div>
</section>
      </form>


</main>
<?php
$lastname = $_POST['firstname'];
echo "teste";
$firstname = "ksjdf";

$n = new \App\Control();
$nome = new \App\Crud();
$n->setFirstName($firstname);
$n->setLastName($lastname);
$nome->insert($n);
?>
