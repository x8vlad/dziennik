<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        // session_statr();
        class UnsetUser{
            // Поля
            //constuctor

            // methods which will be unset like:
            private function unsetUser($login){
                session_unset();
            }
            
        }
    ?>

    <form action="" method="post">
        <!-- <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="pwd" placeholder="Password" required> -->
                <select name="userOption" class="form-select form-select-sm shadow-sm mb-3 w-75" aria-label="Message filter">
                    <option value="1">All users</option>
                    <option value="2">Students</option>
                    <option value="3">Teachers</option>
                </select>
        <button type="submit" name="btn">Send</button>
    </form>

  <?php
    if (isset($_POST['btn'])) {

        // Подключение к базе данных
        function connect() {
            try {
                $conn = new PDO("mysql:host=localhost;dbname=dziennik", "root", "");
                return $conn;
            } catch (PDOException $error) {
                echo "Oops, error: " . $error->getMessage();
                die();
            }
        }

        echo $_POST['userOption'];
        // echo value nice!

        // Функция для выбора пользователя
        function selectUser($login, $pwd) {
            $conn = connect();  // Подключение к базе данных
            $query_select = 'SELECT login, pass FROM `users` WHERE login=?';
            $stmt = $conn->prepare($query_select);
            $stmt->execute([$login]);

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $hash_pwd_from_DB = $row['pass'];

                // Проверка пароля
                if (password_verify($pwd, $hash_pwd_from_DB)) {
                    echo 'Пароль правильный!';
                } else {
                    echo 'Пароль неправильный.';
                }
            } else {
                echo 'Пользователь не найден.';
            }
        }

        // Вызов функции с переданными данными
        $login = $_POST['login'];
        $pwd = $_POST['pwd'];
        // selectUser($login, $pwd);
    }
  ?>

</body>
</html>
