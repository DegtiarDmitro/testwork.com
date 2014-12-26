<h3>Пользователи сайта</h3>
    <ul>
        <?php
            $users = getAllUsers();
            foreach($users as $user){
        ?>
            <li><a href="index.php?userid=<?php echo $user['id']?>"><?php echo $user['login']?></a></li>
        <?php
        }
        ?>
    </ul>