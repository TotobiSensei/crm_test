<section class="task-create">
    <form action="<?=base_url()?>create-task/create" method="post">
        <label for="task_name">Назва проекту:</label>
        <input type="text" name="task_name" id="">
        <label for="task_description">Опис проекту:</label>
        <textarea name="task_description" id="" cols="30" rows="10"></textarea>
        <span>Задачі:</span>
        <div class="sub-task-block">
            <div class="sub-task-input">
                <label for="sub_task_name">Назва:</label>
                <input type="text" name="sub_task_name[]" id="">
                <label for="sub_task_description">Опис:</label>
                <textarea name="sub_task_description[]" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="sub-task-block">
            <div class="sub-task-input">
                <label for="sub_task_name">Назва:</label>
                <input type="text" name="sub_task_name[]" id="">
                <label for="sub_task_description">Опис:</label>
                <textarea name="sub_task_description[]" id="" cols="30" rows="10"></textarea>
            </div>
        </div>
        <?php echo validation_errors(); ?>
        <input type="submit" name="create" value="Створити">
    </form>
</section>