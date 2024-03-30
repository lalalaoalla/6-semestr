<?php
require_once 'config/connect.php';
require_once 'helpers.php';

// делаем проверку на получение конкретной страницы

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 4;
$offset = ($page-1)* $limit;

// limit - количество новостей на стр, offset это отсчитывание какие новости нужно добавлять на следующие страницы
$stmt = $connect->prepare("SELECT * FROM norm_news LIMIT ? OFFSET ?");
$stmt->bind_param("ii", $limit, $offset);
$stmt->execute();

$result=$stmt->get_result();

//require_once 'actions/admin.php';

require_once 'header.php';
?>
    <main class="main w-100 d-flex flex-column justify-content-center align-items-center gap-5 mb-4">
        <div class="row row-cols-1 row-cols-md-3 justify-content-center w-100 card-list gap-5">
            <?php  while($news=mysqli_fetch_assoc($result)): ?>
            <div class="text-dark bg-light mb-3 rounded p-0 overflow-hidden gap-2 card" style="width: 25rem;">
                <img src="<?=$news['image']?>" class="w-100" alt="...">
                <div class="card-body d-flex flex-column justify-content-between gap-2">
                    <h2 class="card-theme fs-5 fw-bold  m-0"> <?=$news['title'];?></h2>
                    <h3 class="fs-5 m-0"> <?//=$news['anonce'];?></h3>
                        <p class="card-text d-inline-block text-truncate lh-sm w-auto" style="height: 120px; white-space: normal;">
                        <?=$news['anonce'];?>
                        </p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <small class="text-body-secondary"><?=$news['date'] ?></small>
                    <a href="main_new.php?id=<?=$news['id']?>"><button button type="button" class="card-btn btn btn-outline-secondary btn-sm">Подробнее</button></a>
                </div>
            </div>
            <?php endwhile;?>
        </div>    
        <div class="row justify-content-center">
            <nav aria-label="..." class="col ">
                <ul class="pagination">

                    <?php for($i=1; $i<4; $i++): ?>
                    <li class="page-item <?php if($page==$i):?> active<?php endif; ?>"><a class="page-link" href="?page=<?=$i?>"><?= $i ?>
                    </a></li>
                    
                    <?php endfor;?>
                    
                    <?php if($result->num_rows == 0): ?>
            <div class="text-center fw-bold">Такой страницы еще нет</div>
            
            <?php exit(); endif; ?>
                </ul>
            </nav>
        </div>
    </main>
    <?php require_once 'footer.php';?>
    </div>
    
</body>

</html>
