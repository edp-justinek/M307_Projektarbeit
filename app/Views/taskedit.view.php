<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <!--<link rel="stylesheet" href="public/css/app.css">-->
    <base href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/">
</head>
<body>
<h1>Task bearbeiten</h1>
<table>
    <th>ID</th>
    <th>Title</th>
    <th>Completed</th>
    <?php
    foreach ($result as $task){?>
    <?php }?>
</table>

<form action="tasklist/update" method="post">
    <label for="title">Titel</label>
    <input name="id" id="id" type="hidden" value="<?=$result['id']?>"><br>
    <input name="title" id="title" type="text" value="<?=$result['title']?>"><br>
    <label for="completed">Completed?</label>
    <input type="checkbox"name="completed" id="completed" value="1" <?= $result['completed']==1? 'checked' :''?>><br>
    <input type="submit" value="Speichern">
</form>

<script src="public/js/app.js"></script>
</body>
</html>
