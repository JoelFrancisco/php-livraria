<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'livraria');

if (isset($_POST['button_gravar'])) { 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];

    $sql = "insert into editora ()
            values ('$id', '$name', '$address', '$city', '$state','$phone');";
    
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
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];

    $sql = "delete from editora where codeditora='$id';";
    
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
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];

    $sql = "update editora set nome='$name', endereco='$address', cidade='$city', estado='$state', telefone='$phone' where codeditora like '$id';";
        
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
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $phone = $_POST['phone'];

    $sql = "select * from editora;";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: ".$row["codeditora"].'<br>';
            echo "Nome: ".$row["nome"]."<br>";
            echo "Endereço: ".$row["endereco"]."<br>";
            echo "Cidade: ".$row["cidade"]."<br>";
            echo "Estado: ".$row["estado"]."<br>";
            echo "Telefone: ".$row["telefone"]."<br><br>";
        }
    }
    else {
        echo "erro na pesquisa"; 
    }
}

mysqli_close($connection);
?>
