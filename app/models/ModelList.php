<?php

namespace App\Models;

use App\Core\Model;

class ModelList extends Model
{
    public function __construct(array $settings)
    {
        parent::__construct($settings);
    }

    public function addDataForm1() {
        if (isset($_POST['btnSubmit'])){
            $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
            $birthdate = filter_input(INPUT_POST, 'birthdate');
            $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
            $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            $query = "INSERT INTO form_db.tbl_1 VALUES (NULL, :firstname, :lastsurname, :birthdate, :subject, :country, :phone, :email)";
            $member = $this->pdo->prepare($query);
            $member->execute(['firstname' => $firstname, 'lastname' => $lastname, 'birthdate' => $birthdate, 'subject' => $subject,
                'country' => $country, 'phone' => $phone, 'email' => $email]);
        }
    }

    public function addDataForm2() {
        if (isset($_POST['btnSubmit'])){
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
            }

            $query = "INSERT INTO form_db.tbl_2 VALUES (NULL, :company, :position, :about, :photo)";
            $member = $this->pdo->prepare($query);
            $member->execute(['company' => $company, 'position' => $position, 'about' => $about, 'photo' => $photo]);
        }
    }

    public function getData() {
        $query = "SELECT * FROM form_db.tbl_1 INNER JOIN form_db.tbl_2";
        $members = $this->pdo->query($query);
        return $members;
    }
}