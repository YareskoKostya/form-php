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
        $dateendstudy0 = filter_input(INPUT_POST, 'dateendtudy0');
        $studyname0 = filter_input(INPUT_POST, 'studyname0', FILTER_SANITIZE_STRING);
        $professionstudy0 = filter_input(INPUT_POST, 'professionstudy0', FILTER_SANITIZE_STRING);
        $doctor0 = filter_input(INPUT_POST, 'doctor0', FILTER_SANITIZE_STRING);
        $datebeginstudy1 = filter_input(INPUT_POST, 'datebeginstudy1');
        $dateendstudy1 = filter_input(INPUT_POST, 'dateendtudy1');
        $studyname1 = filter_input(INPUT_POST, 'studyname1', FILTER_SANITIZE_STRING);
        $professionstudy1 = filter_input(INPUT_POST, 'professionstudy1', FILTER_SANITIZE_STRING);
        $doctor1 = filter_input(INPUT_POST, 'doctor1', FILTER_SANITIZE_STRING);
        $datebeginstudy2 = filter_input(INPUT_POST, 'datebeginstudy2');
        $dateendstudy2 = filter_input(INPUT_POST, 'dateendtudy2');
        $studyname2 = filter_input(INPUT_POST, 'studyname2', FILTER_SANITIZE_STRING);
        $professionstudy2 = filter_input(INPUT_POST, 'professionstudy2', FILTER_SANITIZE_STRING);
        $doctor2 = filter_input(INPUT_POST, 'doctor2', FILTER_SANITIZE_STRING);
        $datebeginstudy3 = filter_input(INPUT_POST, 'datebeginstudy3');
        $dateendstudy3 = filter_input(INPUT_POST, 'dateendtudy3');
        $studyname3 = filter_input(INPUT_POST, 'studyname3', FILTER_SANITIZE_STRING);
        $professionstudy3 = filter_input(INPUT_POST, 'professionstudy3', FILTER_SANITIZE_STRING);
        $doctor3 = filter_input(INPUT_POST, 'doctor3', FILTER_SANITIZE_STRING);

        $query = "INSERT INTO list_users VALUES (NULL, :namesurname, :email)";
        $listus = $this->pdo->prepare($query);
        $namesurname = $name . ' ' . $surname;
        $listus->execute(['namesurname' => $namesurname, 'email' => $email]);

        $query2 = "INSERT INTO user_resume VALUES (NULL, :name, :surname, :birthdate, :country, :tel, :email, :address, :datebeginstudy0, :dateendstudy0, :studyname0, :professionstudy0, :doctor0, :datebeginstudy1, :dateendstudy1, :studyname1, "
            . ":professionstudy1, :doctor1, :datebeginstudy2, :dateendstudy2, :studyname2, :professionstudy2, :doctor2, :datebeginstudy3, :dateendstudy3, :studyname3, :professionstudy3, :doctor3, :datebeginstudy4, :dateendstudy4, :studyname4, :professionstudy4, :doctor4, "
            . ":datebeginwork0, :dateendwork0, :workname0, :professionwork0, :datebeginwork1, :dateendwork1, :workname1, :professionwork1, :datebeginwork2, :dateendwork2, :workname2, :professionwork2, :datebeginwork3, :dateendwork3, :workname3, :professionwork3,"
            . ":datebeginwork4, :dateendwork4, :workname4, :professionwork4, :interests)";
        $usresume = $this->pdo->prepare($query2);
        $usresume->execute(['name' => $_POST['name'], 'surname' => $_POST['surname'], 'birthdate' => $_POST['birthdate'], 'country' => $_POST['country'], 'tel' => $_POST['tel'], 'email' => $_POST['email'], 'address' => $_POST['address'], 'datebeginstudy0' => $_POST['datebeginstudy0'],
            'dateendstudy0' => $_POST['dateendstudy0'], 'studyname0' => $_POST['studyname0'], 'professionstudy0' => $_POST['professionstudy0'], 'doctor0' => $_POST['doctor0'], 'datebeginstudy1' => $_POST['datebeginstudy1'], 'dateendstudy1' => $_POST['dateendstudy1'], 'studyname1' => $_POST['studyname1'],
            'professionstudy1' => $_POST['professionstudy1'], 'doctor1' => $_POST['doctor1'], 'datebeginstudy2' => $_POST['datebeginstudy2'], 'dateendstudy2' => $_POST['dateendstudy2'], 'studyname2' => $_POST['studyname2'], 'professionstudy2' => $_POST['professionstudy2'], 'doctor2' => $_POST['doctor2'],
            'datebeginstudy3' => $_POST['datebeginstudy3'], 'dateendstudy3' => $_POST['dateendstudy3'], 'studyname3' => $_POST['studyname3'], 'professionstudy3' => $_POST['professionstudy3'], 'doctor3' => $_POST['doctor3'], 'datebeginstudy4' => $_POST['datebeginstudy4'], 'dateendstudy4' => $_POST['dateendstudy4'],
            'studyname4' => $_POST['studyname4'], 'professionstudy4' => $_POST['professionstudy4'], 'doctor4' => $_POST['doctor4'], 'datebeginwork0' => $_POST['datebeginwork0'], 'dateendwork0' => $_POST['dateendwork0'], 'workname0' => $_POST['workname0'], 'professionwork0' => $_POST['professionwork0'],
            'datebeginwork1' => $_POST['datebeginwork1'], 'dateendwork1' => $_POST['dateendwork1'], 'workname1' => $_POST['workname1'], 'professionwork1' => $_POST['professionwork1'], 'datebeginwork2' => $_POST['datebeginwork2'], 'dateendwork2' => $_POST['dateendwork2'], 'workname2' => $_POST['workname2'],
            'professionwork2' => $_POST['professionwork2'], 'datebeginwork3' => $_POST['datebeginwork3'], 'dateendwork3' => $_POST['dateendwork3'], 'workname3' => $_POST['workname3'], 'professionwork3' => $_POST['professionwork3'], 'datebeginwork4' => $_POST['datebeginwork4'], 'dateendwork4' => $_POST['dateendwork4'],
            'workname4' => $_POST['workname4'], 'professionwork4' => $_POST['professionwork4'], 'interests' => $_POST['interests']]);
    }

    public function getData() {
        $query = "SELECT * FROM list_users";
        $listus = $this->pdo->query($query);
        return $listus;
    }
}