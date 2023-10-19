<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>application/assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>
            <ul>
                <li><a href="<?=base_url("create-task")?>">Создать проект</a></li>
                <?php if ($this->moderation->isWorker(2)) :
                ?>
                <li><a href="<?=base_url("my-tasks")?>">Мои задачи</a></li>
                <?php endif; ?>
            </ul>
        </header>
    