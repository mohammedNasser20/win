<?php

$firstName = '';
$lastName = '';
$email = '';
//error arry from the form
$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'emailError' => '',
];



// check when click in submit button
if (isset($_POST['submit'])) {


    // convert the interd data to string 
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    // Form validation

    //first name validation
    if (empty($firstName)) {
        $errors['firstNameError'] = 'ادخل الاسم الاول';
    }elseif (strlen($firstName) < 3)
    {
        $errors['firstNameError'] = "الاسم المدخل قصير جدا الحد الادنى 3حروف";
    }
    elseif(strlen($firstName) > 12)
    {
        $errors['firstNameError'] = "الاسم المدخل طويل جدا الحد الاقصى 12 حرف";
    }elseif(!ctype_alpha($firstName)){
        $errors['firstNameError'] ='الاسم يجب ان يحتوى على حروف فقط';
    }
    

    // last name validation
    if (empty($lastName)) {
        $errors['lastNameError'] = 'ادخل الاسم الاخير';
    }elseif (strlen($lastName) < 3)
    {
        $errors['lastNameError'] = "الاسم المدخل قصير جدا الحد الادنى 3حروف";
    }
    elseif(strlen($lastName) > 12)
    {
        $errors['lastNameError'] = "الاسم المدخل طويل جدا الحد الاقصى 12 حرف";
    }elseif(!ctype_alpha($lastName)){
        $errors['lastNameError'] ='الاسم يجب ان يحتوى على حروف فقط';
    }

    // email validation
    if (empty($email)) {
        $errors['emailError'] = 'ادخل البريد الالكتروني';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = 'ادخل بريد الكتروني حقيقي';
    }

    if (!array_filter($errors)) {



        //insert data to var...
        $sql = "INSERT INTO users(firstName, lastName, email)
            VALUES ('$firstName', '$lastName', '$email')";

        // check if the connection success and send data to DB
        if (mysqli_query($conn, $sql)) {

            header('location:' . $_SERVER['PHP_SELF']);
        } else {
            echo 'Error' . mysqli_error($conn);
        }
    }
}
