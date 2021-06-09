<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <!--<link rel="stylesheet" href="public/css/app.css">-->
    <base href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/">
</head>
<body>
<h1>Taskliste</h1>

<form action="tasklist/new" method="post">
    <label for="title">Titel</label>
    <input name="title" id="title" type="text">
    <input type="submit">
</form>
<hr>

<table>
    <th>ID</th>
    <th>Title</th>
    <th>Completed</th>
    <?php
    foreach ($result as $task){?>
        <tr>
            <td><?=$task['id']?></td>
            <td><?=e($task['title'])?></td>
            <td><?=$task['completed']?></td>
            <td><a href="tasklist/edit?id=<?=$task['id']?>">bearbeiten</td>
            <td><a class="deleteButton" href="tasklist/delete?id=<?=$task['id']?>">Löschen</td>

        </tr>
    <?php }?>
</table>


<script src="public/js/app.js"></script>

<script>
    Array.from(document.getElementsByClassName('deleteButton'))
        .forEach(element => element
            .addEventListener('click', (e) => {
                    if (!confirm('Are you sure you want to delete the task?')) {
                        e.preventDefault();
                    }
                }
            ));
</script>

</body>
</html>
