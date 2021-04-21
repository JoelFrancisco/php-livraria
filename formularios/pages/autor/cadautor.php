<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'livraria');

if (isset($_POST['button_gravar'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $citizenship = $_POST['citizenship'];
    $job = $_POST['job'];
    $dateOfBirth = $_POST['dateOfBirth'];

    $sql = "insert into autor ()
            values ('$id', '$name', '$citizenship', '$job', '$dateOfBirth');";
    
    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
        <script>
            alert('cadastro realizado com sucesso.');
            location.href="index.html";
        </script>
        <?php
    } else {
        echo "erro no cadastro";
    }
}

if (isset($_POST['button_excluir'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $citizenship = $_POST['citizenship'];
    $job = $_POST['job'];
    $dateOfBirth = $_POST['dateOfBirth'];

    $sql = "delete from autor where codautor='$id';";
    
    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
        <script>
            alert('registro deletado com sucesso.');
            location.href="index.html";
        </script>
        <?php
    } else {
        echo "erro no delete";
    }
}

if (isset($_POST['button_alterar'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $citizenship = $_POST['citizenship'];
    $job = $_POST['job'];
    $dateOfBirth = $_POST['dateOfBirth'];
    
    $sql = "update autor set nome='$name', nacionalidade='$citizenship', ocupacao='$job', datanascimento='$dateOfBirth' where codautor like '$id';";
        
    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
        <script>
            alert('alteracao efetuada com sucesso.');
            location.href="index.html";
        </script>
        <?php
    } else {
        echo "erro na alteracao";
    }
}

if (isset($_POST['button_pesquisar'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $citizenship = $_POST['citizenship'];
    $job = $_POST['job'];
    $dateOfBirth = $_POST['dateOfBirth'];

    $sql = "select * from autor;";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "id: ".$row["codautor"].'<br>';
            echo "Nome: ".$row["nome"]."<br>";
            echo "Nacionalidade: ".$row["nacionalidade"]."<br>";
            echo "Ocupacao: ".$row["ocupacao"]."<br>";
            echo "Data de nascimento: ".$row["datanascimento"]."<br><br>";
        }
    } else {
        echo "erro na pesquisa";
    }
}

mysqli_close($connection);
?>
