<?php
$response = '';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $feedback = htmlspecialchars($_POST['feedback']);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'joaovtolente@gmail.com'; 
        $mail->Password = 'gzwz vgzd npif fhvt'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        
        $mail->setFrom($email, $nome);
        $mail->addAddress('joaovtolente@gmail.com', 'João Vitor');

        $mail->isHTML(true);
        $mail->Subject = 'Feedback de ' . $nome;
        $mail->Body    = "<h1>Feedback de {$nome}</h1><p>{$feedback}</p>";
        $mail->AltBody = "Feedback de {$nome}\n\n{$feedback}";

    
        $mail->send();
        $response = '<p style="color: green;">Formulário enviado com sucesso!</p>';
    } catch (Exception $e) {
        $response = '<p style="color: red;">Erro ao enviar o email: ' . $mail->ErrorInfo . '</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/template.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/scriptGeral.js"></script>
    <link rel="icon" href="/img/icon.png" class="icone-pagina">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quero Pizza</title>
</head>
<body>
<div class="content-wrapper">
    <header class="header-container">
        <div class="header-content">
            <nav>
                <img src="/img/icon.png" alt="Quero Pizza Icone">
                <ul>
                    <a href="index.html" class="texto-branco">Home</a>
                </ul>
                <ul>
                    <a href="#cardapio" class="texto-branco">Cardápio</a>
                </ul>
                <ul>
                     <a href="#casa" class="texto-branco">Nossa Casa</a>
                </ul>
                <ul>
                    <a href="https://www.ifood.com.br/delivery/osasco-sp/quero-pizza-veloso/f206325b-9024-447e-b399-64589dc29d93" class="texto-branco">Delivery</a>
                </ul>
            </nav>
        </div>
    </header>
    <section class="main">
        <div class="main-content">
            <div class="">
                <h2 class="texto-branco">Fale Conosco</h2>
                <hr>
            </div>
            <form action="" method="post" class="texto-branco">
                <label for="nome">Digite seu Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Seu nome..." required>
                <label for="email">Digite seu Email</label>
                <input type="email" name="email" id="email" placeholder="exemplo@gmail.com" required>
                <label for="">Digite seu Feedback</label>
                <textarea id="feedback" name="feedback" rows="5" cols="20" required style="max-width: 100%;"></textarea>
                <div class="container" style="justify-content: space-between; margin-top: 20px; align-items: center;">   
                    <button class="order-div-confirm texto-branco" type="submit">Confirmar</button>
                    <?= $response; ?>
                </div>
            </form>
        </div>
    </section>      

    <footer class="footer-container">
        <div class="footer-content texto-branco">
            <div>
                <p>©2024 Quero Pizza. - Todos os direitos reservados</p>
            </div>
            <div>
                <p>www.queropizza.com.br</p>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
