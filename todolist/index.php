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

    <link rel="stylesheet" href="./css/base.css">

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
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
                </tr>
            </thead>
            <tbody>
                <?
                $tasks = $conn->get_all_tasks();
                foreach ($tasks as $task) {
                    echo $task->toHTML();
                }
                ?>
            </tbody>
        </table>        
    </main>
    <?php require_once "html/base/footer.html" ?>
</body>

</html>