<?php
    session_start();
    include "header.php";
    include "connect.php";

    $id = $_SESSION['User_id'];
    $Info_user = mysqli_fetch_all(mysqli_query($con,"SELECT * from Users where User_id = $id"));
    $Info_orders = mysqli_fetch_all(mysqli_query($con,"SELECT * from Orders where User_id = $id"));

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-header.css">
    <link rel="stylesheet" href="style-personal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Личный кабинет</title>
</head>
<body>
    <main>
        <div class="container1">
        
            <div class="info_user">
            <h2 class="text-personal-account">Личный кабинет</h2>
                <div class="img-user">
                <img src="../images\free-icon-boy-4537069.png" class="img-user" alt="">
                </div>
                <form action="" method="post" class="form-user-info">
                    <?php foreach ($Info_user as $Info_user) {
                        ?>
                        <input type="text"  value="<?=$Info_user[1]?>" placeholder="Ваше Имя">
                    <input type="text" value="<?=$Info_user[2]?>" placeholder="email">
                    <p>Бонусы: <?=$Info_user[3]?></p>
                    <?php }
                    ?>
                    <button name="edit" class="edit">Сохранить изменения</button>
                </form>
                </div>
                <div class="history-zacaz">
                    <div class="order-history">
                        <h3 class="order">Мои заказы</h3>
                        <table>
                            <thead>
                                <tr>    
                                    <th>Заказ</th>
                                    <th>Дата</th>
                                    <th>Состав заказа</th>
                                    <th>Сумма</th>
                                    <th>Статус</th>
                                    <th>Отзыв</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <?php
                                    foreach ($Info_orders as $orders) {
                                    $info_product = mysqli_fetch_all(mysqli_query($con, "SELECT * FROM Order_Product 
                                    INNER JOIN Orders ON Order_Product.Id_order = Orders.Id_order
                                    INNER JOIN Product ON Order_Product.Id_product = Product.Id_product
                                    WHERE Orders.Id_order = $orders[0] and Orders.User_id = $id"));
                                    $total_sum = 0; // Инициализация переменной для подсчета общей суммы заказа
                                    foreach ($info_product as $product1) {
                                        $total_sum += $product1[3] * $product1[16]; // Накапливаем общую сумму заказа
                                    }
                                ?>
                            <tr>
                                <td>№ <?=$orders[0]?></td>
                                <td><?=$orders[2]?></td>
                                <td>
                                    <?php foreach ($info_product as $product) {
                                    echo "<p>$product[13] ($product[3] шт)<br></p>";
                                     } ?>
                                </td>
                                <td><?=$total_sum?></td>
                                <td><?=$orders[3]?></td>
                                <td><a href="" data-bs-toggle="modal" data-bs-target="#feedback" >Оставить отзыв</a></td>
                            </tr>
                                <?php } ?>
                                <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Оставьте отзыв</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                          </div>
                                          <div class="modal-body">
                                          <form action="/New_comments.php" method = "POST">
                                              <div class="mb-3">
                                                <input type="hidden" name="ID" value="<?=$orders[0]?>" >
                                                <label for="message-text" class="col-form-label">Сообщение:</label>
                                                <textarea class="form-control" name="text" id="message-text"></textarea>
                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Оставить отзыв</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </main>
        <!-- подвал -->
<footer id="footer">
    <div class="container">
        <div class="connection">
            <div class="connect">
            <p>Связь с нами</p> 
            <div class="images-connection">
                <img src="images/free-icon-odnoklassniki-2504930.png" alt=""class="icon-whatsapp">
                <img src="images\icons8-vk-com-48.png" alt="" srcset="">
                <img src="images\iconfinder-social-media-applications-23whatsapp-4102606_113811.png" class="icon-whatsapp">
            </div>
            </div>
            <div class="clock-work">
                    <p>Часы  работы:</p>
                    <p>10:00 - 23:00</p>
                </div>
            </div>
        <hr> 
        <p class="copirater">© 2023 Копирование запрещено. Все права защищены.</p> 
    </div>
</footer>
</body>
</html>

<!-- модальное окно для отзыва -->


<div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Оставьте отзыв</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Сообщение:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Оставить отзыв</button>
      </div>
    </div>
  </div>
</div>