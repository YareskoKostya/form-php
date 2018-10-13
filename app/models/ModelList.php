<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 23.09.2018
 * Time: 16:48
 */

namespace App\Models;

use App\Core\Model;

class ModelList extends Model
{
    public function __construct(array $settings)
    {
        parent::__construct($settings);
    }

    public function addData() {
        if (isset($_POST['btnSubmit'])){
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
            $birthdate = filter_input(INPUT_POST, 'birthdate');
            $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
            $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
            $datebeginstudy = filter_input(INPUT_POST, 'datebeginstudy', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $dateendstudy = filter_input(INPUT_POST, 'dateendstudy', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $studyname = filter_input(INPUT_POST, 'studyname', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
            $professionstudy = filter_input(INPUT_POST, 'professionstudy', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
            $doctor = filter_input(INPUT_POST, 'doctor', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
            $querystudy = '';
            $executestudy = [];
            for($i = 0; $i < 5; $i++){
                $querystudy .= ":datebeginstudy$i, :dateendstudy$i, :studyname$i, :professionstudy$i, :doctor$i, ";
                $executestudy += ["datebeginstudy$i" => $datebeginstudy[$i], "dateendstudy$i" => $dateendstudy[$i],
                    "studyname$i" => $studyname[$i], "professionstudy$i" => $professionstudy[$i], "doctor$i" => $doctor[$i]];
            }
            $datebeginwork = filter_input(INPUT_POST, 'datebeginwork', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $dateendwork = filter_input(INPUT_POST, 'dateendwork', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $workname = filter_input(INPUT_POST, 'workname', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
            $professionwork = filter_input(INPUT_POST, 'professionwork', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
            $querywork = '';
            $executework = [];
            for($j = 0; $j < 5; $j++){
                $querywork .= ":datebeginwork$j, :dateendwork$j, :workname$j, :professionwork$j, ";
                $executework += ["datebeginwork$j" => $datebeginwork[$j], "dateendwork$j" => $dateendwork[$j],
                    "workname$j" => $workname[$j], "professionwork$j" => $professionwork[$j]];
            }
            $interests = filter_input(INPUT_POST, 'interests', FILTER_SANITIZE_STRING);

            if (!empty($_FILES['photo']['name'])) {
                if ($_FILES['photo']['error'] == 0) {
                    if (substr($_FILES['photo']['type'], 0, 5) == 'image') {
                        $photo = file_get_contents($_FILES['photo']['tmp_name']);
                    }
                }
            }

            $query = "INSERT INTO resume_db.list_users VALUES (NULL, :namesurname, :email)";
            $listus = $this->pdo->prepare($query);
            $namesurname = $name . ' ' . $surname;
            $listus->execute(['namesurname' => $namesurname, 'email' => $email]);

            $query2 = "INSERT INTO resume_db.user_resume VALUES (NULL, :name, :surname, :birthdate, :country, :tel, :email, "
                . ":address," . $querystudy . $querywork . " :interests, :photo)";
            $usresume = $this->pdo->prepare($query2);
            $usresume->execute(['name' => $name, 'surname' => $surname, 'birthdate' => $birthdate, 'country' => $country,
                    'tel' => $tel, 'email' => $email, 'address' => $address] + $executestudy + $executework + ['interests' => $interests, 'photo' => $photo]);
        }
    }

    public function getData() {
        $query = "SELECT * FROM resume_db.list_users";
        $listus = $this->pdo->query($query);
        return $listus;
    }
}