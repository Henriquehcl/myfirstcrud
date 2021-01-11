<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<pre>
    <?php
    
    require_once "vendor/autoload.php";

    $n = new \App\Control();
    $n ->setFirstName('Luiz');
    $n->setLastName('Silva');

    //Selecionando o ID para alterar o Nome
    $n->setId(2);
    $n->setFirstName('Henrique');
    $n->setLastName('Correa');
    

    $nome = new \App\Crud();
    
    $nome->delete(4);

    $nome->update($n);

    $nome->select();
    foreach($nome->select() as $n){
        echo $n['id'].$n['firstname'].$n['lastname']."<br>";
    }

    print_r($n);
    print_r($nome);


    ?>
</pre>

    
      
</body>
</html>