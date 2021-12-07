<?php

class ErrorsController
{
    public function setErrors(array $post)
    {
        if (empty($post['name'])) {
            $_SESSION['errors']['empty_name'] = 'Заполните поле имя!';
        } elseif (iconv_strlen($post['name']) < 2) {
            $_SESSION['errors']['lenght_name'] = 'Имя должно содержать не менее 2 символов!';
        }

        if (empty($post['age'])) {
            $_SESSION['errors']['empty_age'] = 'Укажите свой возраст!';
        } elseif (!is_numeric($post['age'])) {
            $_SESSION['errors']['is_number_age'] = 'Поле возраст должно содержать только цифры!';
        } elseif ($post['age'] > 150 && $post['age'] < 0) {
            $_SESSION['errors']['age'] = 'Вам это не нужно!';
        }

        if (!empty($_SESSION['errors'])) {
            return $_SESSION['errors'];
        }

        return false;
    }

    public function getErrors()
    {
        if (empty($_SESSION['errors'])) {
            return false;
        }

        foreach ($_SESSION['errors'] as $value) {
            echo '<p>' . $value . '</p>';
        }
    }

    public function addErrors(array $errors)
    {
     foreach ($errors as $key => $value){
         $_SESSION['errors'][$key] =  $value;
     }
    }
}