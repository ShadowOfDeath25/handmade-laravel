<?php
require_once 'vendor/autoload.php';

use App\Http\Controllers\StudentController;

header('content-type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['age'])) {
            echo json_encode(StudentController::store([
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'age' => $_POST['age']
            ]));

        } else {
            echo json_encode([
                "message" => "Invalid input data",
            ]);
        }
        break;
    case 'GET':
        if (isset($_GET['id'])) {
            echo json_encode(StudentController::show($_GET['id']));
        } else {
            echo json_encode(StudentController::index());
        }
        break;
    case'DELETE':

        $data = file_get_contents("php://input");
        parse_str($data, $delete);
        if (isset($delete['id'])) {
            echo json_encode(StudentController::destroy($delete['id']));
        } else {
            echo json_encode([
                "message" => "ID is required for deletion",
            ]);
        }
        break;
}


?>