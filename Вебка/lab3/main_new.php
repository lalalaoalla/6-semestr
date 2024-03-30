<?php
require_once ('config/connect.php');

//получаем id новости
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
$stmt = $connect->prepare("SELECT * FROM norm_news WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$post = mysqli_fetch_assoc($result);

// дальше уже элементы этого массива post раскидываем по файлу

require_once ('header.php');
//require_once 'actions/admin.php';
?>


        <?php
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1):
            ?>
            <div class="col-12 d-flex">
                <a href="update.php?id=<?= $id ?>"><button type="button"
                        class="btn btn-light border border-info border-3 text-info me-2">Редактировать</button></a>
                <a href="actions/delete.php?id=<?= $id ?>"><button type="button"
                        class="btn btn-danger border border-danger border-3 text-light me-2">Удалить</button></a>
            </div>
        <?php endif; ?>

        <main class="main w-100 d-flex flex-column gap-3">
            <?php if($result->num_rows == 0): ?>
            <div class="text-center fw-bold">Такой страницы не существует</div>
            
            <?php exit(); endif; ?>
            <h2 class="theme text-start fs-3 fw-bold">
                <?php if (isset($post['title']))
                    echo $post['title']; ?>
            </h2>
            <h3 class="title text-start fs-4"></h3>
            <img class="img rounded mx-auto d-block" src="<?= $post['image'] ?>">
            <span class="date text-end">
                <?= $post['date'] ?>
            </span>
            <p class="text">
                <?= $post['full_text'] ?>
        </main>
        <?php require_once ('footer.php'); ?>


    </div>
</body>

</html>