<section class="crm-panel">
    <div class="task-list">
        <?php
            foreach ($task_list as $task) :
        ?>
                <a class="task" href="<?= base_url("task/") . $task["id"] ?>">
                    <div class="task-top-block">
                        <div class="task-title"><?= $task["name"] ?></div>
                        <div class="task-status"><?= $task["status_id"] ?></div>
                        <div class="task-date"><?= $task["date"] ?></div>
                    </div>
                    <div class="task-bottom-block">
                        <?= $task["description"] ?>
                    </div>
                </a>
        <?php
            endforeach;
        ?>
    </div>
    <div class="sub-task-list">
        <?php
            if (isset($sub_task_list)) :
                foreach ($sub_task_list as $sub_task) :
        ?>
                    <div class="sub-task">
                        <div class="sub-task-top">
                            <div class="sub-task-name"><?= $sub_task["name"] ?></div>
                            <div class="sub-task-status"><?= $sub_task["status_id"] ?></div>
                            <div class="sub-task-price"><?= $sub_task["price"] ?></div>
                        </div>
                        <div class="sub-task-midle">
                            <?= $sub_task["description"] ?>
                        </div>
                        <div class="sub-task-bottom">
                            <div class="sub-task-date"><?= $sub_task["date"] ?></div>
                            <div class="sub-task-deadline"><?= $sub_task["date"] ?></div>
                        </div>
                    </div>
        <?php
                endforeach;
            else :  
        ?>
            Немає задач.
        <?php
            endif;
        ?>
    </div>
</section>