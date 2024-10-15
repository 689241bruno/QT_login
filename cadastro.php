<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css?v=<?php echo time(); ?>">
    <title>Cadastro</title>
</head>
<body>
    <div class="boxForm">
        <h1>Cadastro</h1>
        <form action="" method="POST">
            <section>
                <p>Nome</p>
                <input type="text" name="nome" required>
                <p>Email</p>
                <input type="text" name="email" required>
                <p>Senha</p>
                <input type="password" name="senha" required>
                <a href="entrar.php">Já tenho uma conta</a> 
            </section>
            <input type="submit" value="Cadastrar" id="btnCadastrar">
        </form>
                          
    </div>
        
            <?php

            require 'Contato.class.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Verificar se as chaves existem e atribuir valores padrão caso não existam
                $email = $_POST['email'] ?? '';
                $senha = $_POST['senha'] ?? '';
                $nome = $_POST['nome'] ?? '';

                // Criar uma instância da classe Contato e chamar o método insertUser
                $contato = new Contato();

                if ($contato->verificarEmailExiste($email)) {
                    echo "<script>
                    alert('Email já está em uso!');
                    </script>";
                } else {
                    $contato->insertUser($nome, $email, $senha);
                    echo "<script>
                    alert('Usuário inserido com sucesso!');
                    window.location.href = 'entrar.php';
                    </script>";
                }
            }

            ?>
        
    
</body>
</html>