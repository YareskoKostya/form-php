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
        $query = "SELECT t1.firstname, t1.lastname, t1.subject, t1.email, t2.photo FROM form_db.tbl_1 t1 LEFT JOIN form_db.tbl_2 t2 ON t1.id=t2.member_id GROUP BY t1.email ORDER BY t1.id";
        $members = $this->pdo->query($query);
        return $members;
    }
}
