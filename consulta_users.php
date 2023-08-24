<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>


<?php
/*
 * Método de conexão sem padrões
*/

$username = "cedup";
$password = "cedup";


try {
    $conn = new PDO('mysql:host=localhost;dbname=cedup', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = $conn->query('SELECT * FROM usuarios');
    echo '<div class="container">';
    echo '<div class="container">';
    echo '<table id="tabela01" class="table">';
    echo ' <thead>';
    echo '<tr><th>Id</th><th>Nome</th><th>Usuario</th><th>Senha</th><th>Acoes</th></tr>';
    echo ' <thead>';
    
    foreach($data as $row) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["nome"] . '</td>';
        echo '<td>' . $row["login"] . '</td>';
        echo '<td>' . $row["senha"] . '</td>';
        echo '<td><a href="#"><img onclick="excluir('.$row["id"].')" src="./img/bloquear.png"></a><a href="#"><img onclick="editar('.$row["id"].')" style="width:30px; heigth:30px;" src="./img/editar.gif"></a></td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
    echo '</div>';
    
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
 ?>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function excluir(userId) {
        // Aqui você pode usar o ID do usuário para a lógica que deseja implementar
         
        // Exemplo: faça uma requisição AJAX para excluir o usuário no servidor
     
      // Dados que você quer enviar
        const datas = {
          'id': userId
         
        };
        var dados = JSON.stringify(datas);

        // Opções da requisição
         $.ajax({
            url: 'excluir.php',
            type: 'POST',
            data: {data: dados},
            success: function(result){
              // Retorno se tudo ocorreu normalmente
              alert("Excluido");
            },
            error: function(jqXHR, textStatus, errorThrown) {
              // Retorno caso algum erro ocorra
              alert("Erro ao excluir");
            }
          });
         // Recarrega a página
        window.location.reload();
       
}
    function editar(userId) {
        // Aqui você pode usar o ID do usuário para a lógica que deseja implementar
        console.log( userId);
        // Exemplo: faça uma requisição AJAX para editar o usuário no servidor
        
    }

</script>

</html>

