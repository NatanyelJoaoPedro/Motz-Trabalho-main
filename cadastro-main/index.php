<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motz2";

$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se o formulário foi enviado


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se as variáveis do formulário estão definidas
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        // Recupera os dados do formulário
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Instrução preparada para evitar SQL injection
        $sql = $conexao->prepare("INSERT INTO login (email, senha) VALUES (?, ?)");
        $sql->bind_param("ss",$email, $senha);

        if ($sql->execute()) {
            header('location: ../index.php');
            
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }

        $sql->close();
    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Motz</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="menu">
            <a href="index.html"><img src="../img/logo-motz (1).png" class="logo-motz"></a>
            <a href="./cadastro-main/index.php"><img src="../img/user-tie.png" class="user"></a>
        </div>
        <div class="hero">
            <div class="hero-content">
                <h1>Login</h1>
            </div>
        </div>
    </header>
    <main>
       <!-- Register Section -->
    <div class="container register__form">
        <div class="row  align-self-center">
            <div class="col-12 col-lg-6 col-xl-6 px-5">
                <div class="row vh-100">
                    <div class="col align-self-center p-5 w-100">
                        <!-- form register section -->
                        <form action="index.php" method="POST">
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="senha" class="form-control text-indent shadow-sm bg-grey-light border-0 rounded-pill fw-lighter fs-7 p-3" placeholder="Senha" required>
                            </div>

                            <!-- Botão de cadastro -->
                            <div class="col text-center mt-4">
                                <button type="submit" class="enviar-btn rounded text-light w-100 d-flex align-items-center">
                                <i class="fa-solid fa-arrow-right-to-bracket" style="color: #ffffff; margin-right: 5px;"></i>
                                    <span style="flex: 1; text-transform: uppercase;">Login</span>
                                </button>
                            </div>
                        </form>
                        <p class="mt-5 text-center text-light">OU</p>
                        <div class="row text-center">
                            <div class="col my-3">
                                <a href="" class="btn bg-light w-50"><i class="bi bi-google fs-5"></i></a>
                            </div>
                            <div class="col mt-3">
                                <a href="" class="btn bg-light w-50"><i class="bi bi-facebook fs-5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>
</html>