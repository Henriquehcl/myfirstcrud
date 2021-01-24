<?php


    $n = new \App\Control();
    $nome = new \App\Crud();

    $nome->select();

    $listagem = '';
    foreach($nome->select() as $n){
     
       $listagem.= '<tr>
                      <td>'.$n['id'].'</td>
                      <td>'.$n['firstname'].'</td>
                      <td>'.$n['lastname'].'<br></td>
                      <td>
                        <a href="edit.php?id='.$n['id'].'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="delet.php?id='.$n['id'].'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                      </td>

                    </tr>';
        //echo "ID ".$n['id']." Nome ".$n['firstname']." Sobrenome ".$n['lastname']."<br>";
    }

    ?>

<main>

    <section>
        <a href="cadastrar.php"><!--colocar o link da pagina de cadastro-->
            <button class="btn btn-info">Novo Cadastro</button>
        </a>
    </section>



  <section>

    <table class="table bg-light mt-3 ">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Ações</th>

          </tr>
        </thead>
        <tbody>
            <?=$listagem?>
        </tbody>
    </table>

  </section>

    
</main>