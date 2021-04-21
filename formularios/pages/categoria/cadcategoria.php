<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'livraria');

if (isset($_POST['button_gravar'])) { 
    $id = $_POST['id'];
    $description = $_POST['description'];
    $fk = $_POST['fk'];

    $sql = "insert into categoria (codcategoria, descricao, codprateleira)
            values ('$id', '$description', '$fk');";
    
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
    $fk = $_POST['fk'];

    $sql = "delete from categoria where codcategoria='$id';";
    
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
    $fk = $_POST['fk'];

    $sql = "update categoria set descricao='$description', codprateleira='$fk' where codcategoria like '$id';";
        
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
    $fk = $_POST['fk'];

    $sql = "select codcategoria, descricao, codprateleira from categoria where codcategoria like '$id';";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: ".$row["codcategoria"].'<br>'."Descricao: ".$row["descricao"]."<br>"."Código prateleira: ".$row["codprateleira"]."<br>";
        }
    }
    else {
        echo "erro na pesquisa"; 
    }
}

mysqli_close($connection);
?>
