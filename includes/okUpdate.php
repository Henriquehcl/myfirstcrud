<?php

//convertendo a ID que vem como string para inteiro
$num = (int)$_POST['id'];

$n = new \App\Control();
$nome = new \App\Crud();

//Selecionando o ID para alterar o Nome. Update
$n->setId($num);
$n->setFirstName($_POST['firstname']);
$n->setLastName($_POST['lastname']);

$nome->update($n); 

?>

<main>

    <section>
        <a href="index.php"><!--colocar o link do index-->
            <button class="btn btn-info">Voltar</button>
        </a>
    </section>

     <h2 class="mt-3">As informações foram atualizadas com sucesso!</h2>



</main>