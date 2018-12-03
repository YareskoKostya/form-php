<?php

namespace App\Models;

use App\Core\Model;

class ModelList extends Model
{
    /**
     * ModelList constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function addDataForm1() {
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $query = "INSERT INTO form_db.tbl_1 VALUES (NULL, :firstname, :lastname, :birthdate, :subject, :country, :phone, :email)";
        $member = $this->pdo->prepare($query);
        $member->execute(['firstname' => $firstname, 'lastname' => $lastname, 'birthdate' => $birthdate, 'subject' => $subject,
            'country' => $country, 'phone' => $phone, 'email' => $email]);
        $_SESSION['id'] = $this->pdo->lastInsertId();
    }

    /**
     *
     */
    public function addDataForm2() {
        $company = filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING);
        $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_STRING);
        $about = filter_input(INPUT_POST, 'about', FILTER_SANITIZE_STRING);

        if (!empty($_FILES['photo']['name'])) {
            if ($_FILES['photo']['error'] == 0) {
                if (substr($_FILES['photo']['type'], 0, 5) == 'image') {
                    $photo = time() . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['photo']['tmp_name'],'images/' . $photo);
                }
            }
        } else {
            $photo = null;
        }

        $query = "INSERT INTO form_db.tbl_2 VALUES (NULL, :member_id, :company, :position, :about, :photo)";
        $member = $this->pdo->prepare($query);
        $member->execute(['member_id' => $_SESSION['id'], 'company' => $company, 'position' => $position, 'about' => $about, 'photo' => $photo]);
    }

    /**
     * @return bool|\PDOStatement
     */
    public function getData() {

        $number = 3;
// Извлекаем из URL текущую страницу
        $page = explode('/', $_SERVER['REQUEST_URI'])[3];

        $_SESSION['page'] = $page;
// Определяем общее число сообщений в базе данных
        $queryRes = "SELECT COUNT(t1.id) FROM form_db.tbl_1 t1";

        $result =$this->pdo->query($queryRes);

        $posts = $result->fetchColumn();

        $_SESSION['total'] = ceil($posts / $number );


        $start = $page * $number - $number;
        $num = $number * $page;

        $_SESSION['start'] = $start;
// Находим общее число страниц
        //$total = intval(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
        //$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
        //if(empty($page) or $page < 0) $page = 1;
        //if($page > $total) $page = $total;
// Вычисляем начиная к какого номера
// следует выводить сообщения
        //$start = $page * $num - $num + 1;
// Выбираем $num сообщений начиная с номера $start

        $query = "SELECT t1.firstname, t1.lastname, t1.subject, t1.email, t2.photo FROM form_db.tbl_1 t1 LEFT JOIN form_db.tbl_2 t2 ON t1.id=t2.member_id GROUP BY t1.email ORDER BY t1.id LIMIT :start, :num";
        $members = $this->pdo->prepare($query);
        $members->bindParam(":start",$start, \PDO::PARAM_INT);
        $members->bindParam(":num",$num, \PDO::PARAM_INT);
        $members->execute();
        //$members->execute(['start' => $start, 'num' => $num]);
        return $members;
    }
}
