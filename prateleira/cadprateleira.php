<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'livraria');

if (isset($_POST['button_gravar'])) { 
    $id = $_POST['id'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];

    $sql = "insert into prateleira (codprateleira, descricao, capacidade)
            values ('$id', '$description', '$capacity');";
    
    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
        <script>
            alert('cadastro realizado com sucesso.');
            location.href="index.html";
        </script>
        <?php
    }
    else {
        echo "erro no cadastro"; 
    }
}

if (isset($_POST['button_excluir'])) { 
    $id = $_POST['id'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];

    $sql = "delete from prateleira where codprateleira='$id';";
    
    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
        <script>
            alert('registro deletado com sucesso.');
            location.href="index.html";
        </script>
        <?php
    }
    else {
        echo "erro no delete";
    }
}

if (isset($_POST['button_alterar'])) { 
    $id = $_POST['id'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];

    $sql = "update prateleira set descricao='$description', capacidade='$capacity' where codprateleira like '$id';";
        
    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
        <script>
            alert('alteracao efetuada com sucesso.');
            location.href="index.html";
        </script>
        <?php
    }
    else {
        echo "erro na alteracao"; 
    }
}

if (isset($_POST['button_pesquisar'])) { 
    $id = $_POST['id'];
    $description = $_POST['description'];
    $capacity = $_POST['capacity'];

    $sql = "select codprateleira, capacidade, descricao from prateleira where codprateleira like '$id';";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: ".$row["codprateleira"].'<br>'."Descricao: ".$row["descricao"]."<br>"."Capacidade: ".$row["capacidade"]."<br>";
        }
    }
    else {
        echo "erro na pesquisa"; 
    }
}

mysqli_close($connection);
?>
