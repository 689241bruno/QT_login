<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="entrar.css">
    <link rel="stylesheet" href="entrar.css?v=<?php echo time(); ?>">
    <title>Entrar</title>
</head>
<body>
    <div class="" id="box-msg"><img src="#" alt="" id="imgBox" height="25px"> <span id="textBox"></span></div>
    <div class="boxForm">
        <h1>Entrar</h1>
        <form action="entrar.php" method="POST">
            <section>
                <p>Email</p>
                <input type="text" name="email" required>
                <p>Senha</p>
                <input type="text" name="senha" required>
                <a href="cadastro.php">Não tenho uma conta</a>
            </section>
            <input type="submit" value="Entrar" id="btnEntrar">
        </form>
        
    </div>
    <?php 
    
    require "Contato.class.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'] ?? 'desconhecido';
        $senha = $_POST['senha'] ?? 'desconhecido';

        $contato = new Contato();
        $nome = $contato->getNomeUser($email);

        if ($contato->verificarLogin($email, $senha)) {
            echo "<script>
                        var boxmsg = document.getElementById('box-msg');
                        var img = document.getElementById('imgBox');
                        var text = document.getElementById('textBox');
                        boxmsg.classList.add('boxMsg');
                        img.src = 'site/QuestionThink/img/certo.png';
                        text.innerText = 'Seja bem vindo $nome!';
                        setTimeout(function() {
                            window.location.href ='site/QuestionThink/pagina-inicial/pagina-inicial.html';
                        }, 3200);
                    </script>";
        } else {
            echo "<script>
                        var boxmsg = document.getElementById('box-msg');
                        var img = document.getElementById('imgBox');
                        var text = document.getElementById('textBox');
                        boxmsg.classList.add('boxMsg');
                        img.src = 'site/QuestionThink/img/errado.png';
                        text.innerText = 'Erro ao entrar!';
                        setTimeout(function() {
                            window.location.href ='entrar.php';
                        }, 3200);
                </script>";
        }
    }
    
    ?>
</body>
</html>