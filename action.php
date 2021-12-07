<?php
include_once 'db.php';

session_start();

include_once 'ErrorsController.php';
$errors = new ErrorsController();
$errors->setErrors($_POST);
if ($errors->setErrors($_POST)) {

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['age'] = $_POST['age'];
    header('Location: /');

}

if (!empty($_POST)) {

    $sth = $query->prepare("INSERT INTO `peoples` SET `name` = :name, `age` = :age");
    $sth->execute([
        'name' => $_POST['name'],
        'age' => $_POST['age']
    ]);
}
$errors->addErrors(['success'=>'Запись успешно добавлена!']);

header('Location: /');



