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
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $datebeginstudy0 = filter_input(INPUT_POST, 'datebeginstudy0');
        $dateendstudy0 = filter_input(INPUT_POST, 'dateendstudy0');
        $studyname0 = filter_input(INPUT_POST, 'studyname0', FILTER_SANITIZE_STRING);
        $professionstudy0 = filter_input(INPUT_POST, 'professionstudy0', FILTER_SANITIZE_STRING);
        $doctor0 = filter_input(INPUT_POST, 'doctor0', FILTER_SANITIZE_STRING);
        $datebeginstudy1 = filter_input(INPUT_POST, 'datebeginstudy1');
        $dateendstudy1 = filter_input(INPUT_POST, 'dateendstudy1');
        $studyname1 = filter_input(INPUT_POST, 'studyname1', FILTER_SANITIZE_STRING);
        $professionstudy1 = filter_input(INPUT_POST, 'professionstudy1', FILTER_SANITIZE_STRING);
        $doctor1 = filter_input(INPUT_POST, 'doctor1', FILTER_SANITIZE_STRING);
        $datebeginstudy2 = filter_input(INPUT_POST, 'datebeginstudy2');
        $dateendstudy2 = filter_input(INPUT_POST, 'dateendstudy2');
        $studyname2 = filter_input(INPUT_POST, 'studyname2', FILTER_SANITIZE_STRING);
        $professionstudy2 = filter_input(INPUT_POST, 'professionstudy2', FILTER_SANITIZE_STRING);
        $doctor2 = filter_input(INPUT_POST, 'doctor2', FILTER_SANITIZE_STRING);
        $datebeginstudy3 = filter_input(INPUT_POST, 'datebeginstudy3');
        $dateendstudy3 = filter_input(INPUT_POST, 'dateendstudy3');
        $studyname3 = filter_input(INPUT_POST, 'studyname3', FILTER_SANITIZE_STRING);
        $professionstudy3 = filter_input(INPUT_POST, 'professionstudy3', FILTER_SANITIZE_STRING);
        $doctor3 = filter_input(INPUT_POST, 'doctor3', FILTER_SANITIZE_STRING);
        $datebeginstudy4 = filter_input(INPUT_POST, 'datebeginstudy4');
        $dateendstudy4 = filter_input(INPUT_POST, 'dateendstudy4');
        $studyname4 = filter_input(INPUT_POST, 'studyname4', FILTER_SANITIZE_STRING);
        $professionstudy4 = filter_input(INPUT_POST, 'professionstudy4', FILTER_SANITIZE_STRING);
        $doctor4 = filter_input(INPUT_POST, 'doctor4', FILTER_SANITIZE_STRING);
        $datebeginwork0 = filter_input(INPUT_POST, 'datebeginwork0');
        $dateendwork0 = filter_input(INPUT_POST, 'dateendwork0');
        $workname0 = filter_input(INPUT_POST, 'workname0', FILTER_SANITIZE_STRING);
        $professionwork0 = filter_input(INPUT_POST, 'professionwork0', FILTER_SANITIZE_STRING);
        $datebeginwork1 = filter_input(INPUT_POST, 'datebeginwork1');
        $dateendwork1 = filter_input(INPUT_POST, 'dateendwork1');
        $workname1 = filter_input(INPUT_POST, 'workname1', FILTER_SANITIZE_STRING);
        $professionwork1 = filter_input(INPUT_POST, 'professionwork1', FILTER_SANITIZE_STRING);
        $datebeginwork2 = filter_input(INPUT_POST, 'datebeginwork2');
        $dateendwork2 = filter_input(INPUT_POST, 'dateendwork2');
        $workname2 = filter_input(INPUT_POST, 'workname2', FILTER_SANITIZE_STRING);
        $professionwork2 = filter_input(INPUT_POST, 'professionwork2', FILTER_SANITIZE_STRING);
        $datebeginwork3 = filter_input(INPUT_POST, 'datebeginwork3');
        $dateendwork3 = filter_input(INPUT_POST, 'dateendwork3');
        $workname3 = filter_input(INPUT_POST, 'workname3', FILTER_SANITIZE_STRING);
        $professionwork3 = filter_input(INPUT_POST, 'professionwork3', FILTER_SANITIZE_STRING);
        $datebeginwork4 = filter_input(INPUT_POST, 'datebeginwork4');
        $dateendwork4 = filter_input(INPUT_POST, 'dateendwork4');
        $workname4 = filter_input(INPUT_POST, 'workname4', FILTER_SANITIZE_STRING);
        $professionwork4 = filter_input(INPUT_POST, 'professionwork4', FILTER_SANITIZE_STRING);
        $interests = filter_input(INPUT_POST, 'interests', FILTER_SANITIZE_STRING);

        if (!empty($_FILES['photo']['name'])) {
            if ($_FILES['photo']['error'] == 0) {
                if (substr($_FILES['photo']['type'], 0, 5) =='image') {
                    $photo = file_get_contents($_FILES['photo']['tmp_name']);
                }
            }
        }

        $query = "INSERT INTO resume_db.list_users VALUES (NULL, :namesurname, :email)";
        $listus = $this->pdo->prepare($query);
        $namesurname = $name . ' ' . $surname;
        $listus->execute(['namesurname' => $namesurname, 'email' => $email]);

        $query2 = "INSERT INTO resume_db.user_resume VALUES (NULL, :name, :surname, :birthdate, :country, :tel, :email, :address,"
            . ":datebeginstudy0, :dateendstudy0, :studyname0, :professionstudy0, :doctor0, :datebeginstudy1, "
            . ":dateendstudy1, :studyname1, :professionstudy1, :doctor1, :datebeginstudy2, :dateendstudy2, :studyname2,"
            . ":professionstudy2, :doctor2, :datebeginstudy3, :dateendstudy3, :studyname3, :professionstudy3, :doctor3,"
            . ":datebeginstudy4, :dateendstudy4, :studyname4, :professionstudy4, :doctor4, :datebeginwork0, :dateendwork0,"
            . ":workname0, :professionwork0, :datebeginwork1, :dateendwork1, :workname1, :professionwork1, :datebeginwork2,"
            . ":dateendwork2, :workname2, :professionwork2, :datebeginwork3, :dateendwork3, :workname3, :professionwork3,"
            . ":datebeginwork4, :dateendwork4, :workname4, :professionwork4, :interests, :photo)";
        $usresume = $this->pdo->prepare($query2);
        $usresume->execute(['name' => $name, 'surname' => $surname, 'birthdate' => $birthdate, 'country' => $country,
            'tel' => $tel, 'email' => $email, 'address' => $address, 'datebeginstudy0' => $datebeginstudy0,
            'dateendstudy0' => $dateendstudy0, 'studyname0' => $studyname0, 'professionstudy0' => $professionstudy0,
            'doctor0' => $doctor0, 'datebeginstudy1' => $datebeginstudy1, 'dateendstudy1' => $dateendstudy1,
            'studyname1' => $studyname1, 'professionstudy1' => $professionstudy1, 'doctor1' => $doctor1,
            'datebeginstudy2' => $datebeginstudy2, 'dateendstudy2' => $dateendstudy2, 'studyname2' => $studyname2,
            'professionstudy2' => $professionstudy2, 'doctor2' => $doctor2, 'datebeginstudy3' => $datebeginstudy3,
            'dateendstudy3' => $dateendstudy3, 'studyname3' => $studyname3, 'professionstudy3' => $professionstudy3,
            'doctor3' => $doctor3, 'datebeginstudy4' => $datebeginstudy4, 'dateendstudy4' => $dateendstudy4,
            'studyname4' => $studyname4, 'professionstudy4' => $professionstudy4, 'doctor4' => $doctor4,
            'datebeginwork0' => $datebeginwork0, 'dateendwork0' => $dateendwork0, 'workname0' => $workname0,
            'professionwork0' => $professionwork0, 'datebeginwork1' => $datebeginwork1, 'dateendwork1' => $dateendwork1,
            'workname1' => $workname1, 'professionwork1' => $professionwork1, 'datebeginwork2' => $datebeginwork2,
            'dateendwork2' => $dateendwork2, 'workname2' => $workname2, 'professionwork2' => $professionwork2,
            'datebeginwork3' => $datebeginwork3, 'dateendwork3' => $dateendwork3, 'workname3' => $workname3,
            'professionwork3' => $professionwork3, 'datebeginwork4' => $datebeginwork4, 'dateendwork4' => $dateendwork4,
            'workname4' => $workname4, 'professionwork4' => $professionwork4, 'interests' => $interests,
            'photo' => $photo]);
    }

    public function getData() {
        $query = "SELECT * FROM resume_db.list_users";
        $listus = $this->pdo->query($query);
        return $listus;
    }
}