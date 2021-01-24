<?php

//convertendo a ID que vem como string para inteiro
$num = (int)$_GET['id'];

//$n = new \App\Control();
$nome = new \App\Crud();

$nome->delete($num);

?>

<main>

    <section>
        <a href="index.php"><!--colocar o link do index-->
            <button class="btn btn-info">Voltar</button>
        </a>
    </section>

     <h2 class="mt-3">As informações foram excluídas com sucesso!</h2>



</main>