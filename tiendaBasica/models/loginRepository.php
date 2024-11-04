    <?php
    class loginRepository {
        public static function login($username, $password) {
            $db = Connection::connect();
            $q = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = $db->query($q);
            
            if ($row = $result->fetch_assoc()) {
                return new User($row['id_user'], $row['username'], $row['rol']);
            }
            return false;
        }
    }
    ?>
