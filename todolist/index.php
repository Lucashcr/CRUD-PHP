<?php
require_once "src/dbconn.php";
$conn = new DBConn();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="./css/base.css">
</head>

<body>
    <?php require_once "html/base/header.html" ?>
    <main>
        <h1>Lista de tarefas</h1>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Prioridade</th>
                    <th>Prazo</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tasks-tbody">
            </tbody>
        </table>
        <? require "html/forms/create_form.html" ?>
        <? require "html/forms/delete_form.html" ?>
        <? require "html/forms/update_form.html" ?>
        <div class="btn-container">
            <button onclick="toggleTaskForm('create')">Nova tarefa</button>
        </div>
    </main>
    <?php require_once "html/base/footer.html" ?>


    <script src="js/crudTaskFormActions.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/submitEvents.js"></script>

    <script>
        $.ajax({
            url: window.location.origin + "/src/get_all_tasks.php",
            method: "GET",
            dataType: "json"
        }).done(function (response) {
            tasksTBody.innerHTML = response.join("\n");
        });
    </script>
</body>
</html>