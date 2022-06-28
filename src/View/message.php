<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>mensagem de sistema</title>
    <style></style>
</head>
<body>
    <main class="container flex justify-center h-screen">
        <?php
        session_start();
        if(empty($_SESSION)){
            header('location:../../index.html');
            exit;
        }
        if(!empty($_SESSION['msg_success'])) :
        ?>
            <article class="w-2/4 text-white bg-green-700 rounded p-9"> 
                <p class="text_center">
                    <?= $_SESSION['msg_success'] ?>
                </p>
                <a class="underLine" href="#" onclick="window.history.back()">Voltar</a>
            </article>
        <?php
        endif;
        unset($_SESSION['msg_success']);
        ?>

        <?php
        if(!empty($_SESSION["msg_warning"])):
        ?>
            <article class="w-2/4 text-white bg-yellow-700 rounded p-9"> 
                <ul>
                    <?= $_SESSION['msg_warning'] ?>
                </ul>
                <a class="underLine" href="#" onclick="window.history.back()">Voltar</a>
            </article>
        <?php
        endif;
        unset($_SESSION['msg_warning']);
        ?>

        <?php
        if(!empty($_SESSION["msg_error"])):
        ?>
            <article class="w-2/4 text-white bg-red-700 rounded p-9"> 
                <p class="text_center">
                    <?= $_SESSION['msg_error'] ?>
                </p>
                <a class="underLine" href="#" onclick="window.history.back()">Voltar</a>
            </article>
        <?php
        endif;
        unset($_SESSION['msg_error']);
        ?>
    </main>
</body>
</html>
