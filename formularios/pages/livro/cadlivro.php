<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '');

$db = mysqli_select_db($connection, 'livraria');

if (isset($_POST['button_gravar'])) {
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $numberOfPages = $_POST['numberOfPages'];
    $edition = $_POST['edition'];
    $language = $_POST['language'];
    $codeditora = $_POST['codeditora'];
    $codautor = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];

    $sql = "insert into livro ()
            values ('$id', '$isbn', '$title', '$year', '$numberOfPages', '$edition', '$language', '$codeditora', '$codautor', '$codcategoria');";

    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
        <script>
            alert('cadastro realizado com sucesso.');
            location.href = "index.html";
        </script>
    <?php
    } else {
        echo "erro no cadastro";
    }
}

if (isset($_POST['button_excluir'])) {
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $numberOfPages = $_POST['numberOfPages'];
    $edition = $_POST['edition'];
    $language = $_POST['language'];
    $codeditora = $_POST['codeditora'];
    $codautor = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];

    $sql = "delete from livro where codlivro='$id';";

    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
        <script>
            alert('registro deletado com sucesso.');
            location.href = "index.html";
        </script>
    <?php
    } else {
        echo "erro no delete";
    }
}

if (isset($_POST['button_alterar'])) {
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $numberOfPages = $_POST['numberOfPages'];
    $edition = $_POST['edition'];
    $language = $_POST['language'];
    $codeditora = $_POST['codeditora'];
    $codautor = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];

    $sql = "update livro set ISBN='$isbn', titulo='$title', ano='$year', nrpaginas='$numberOfPages', edicao='$edition', idioma='$language', codeditora='$codeditora', codautor='$codautor', codcategoria='$codcategoria' where codlivro like '$id';";

    $result = mysqli_query($connection, $sql);

    if ($result == 1) {
        ?>
            <script>
                alert('alteracao efetuada com sucesso.');
                location.href = "index.html";
            </script>
        <?php
    } else {
        echo "erro na alteracao";
    }
}

if (isset($_POST['button_pesquisar'])) {
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $numberOfPages = $_POST['numberOfPages'];
    $edition = $_POST['edition'];
    $language = $_POST['language'];
    $codeditora = $_POST['codeditora'];
    $codautor = $_POST['codautor'];
    $codcategoria = $_POST['codcategoria'];

    $sql = "select * from livro;";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["codlivro"] . '<br>';
            echo "ISBN: " . $row["ISBN"] . "<br>";
            echo "Titulo: " . $row["titulo"] . "<br>";
            echo "Ano: " . $row["ano"] . "<br>";
            echo "Numero de paginas: " . $row["nrpaginas"] . "<br>";
            echo "Edicao: " . $row["edicao"] . "<br>";
            echo "Idioma: " . $row["idioma"] . "<br>";
            echo "Codigo editora: " . $row["codeditora"] . "<br>";
            echo "Codigo autor: " . $row["codautor"] . "<br>";
            echo "Codigo categoria: " . $row["codcategoria"] . "<br><br>";
        }
    } else {
        echo "erro na pesquisa";
    }
}

mysqli_close($connection);
?>