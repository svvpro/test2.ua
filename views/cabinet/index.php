<?php include ROOT . '/../views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h2>Привет, <?php echo $user['name']?> !</h2>
            <h1>Кабинет пользователя</h1>

            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <li><a href="/cabinet/history">Список покупок</a></li>
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/../views/layouts/footer.php'; ?>