<?php

require_once('db.php');
require_once('../model/Car.php');
require_once('../model/Response.php');

try {
  $writeDB = DB::connectWriteDB();  //this connects to the database/
  $readDB = DB::connectReadDB();  //this reads the data from the database
}
catch(PDOException $exception) {  //this catches any errors if the database fails to connect
  error_log("Data Connection Error - ".$exception, 0);
  $response = new Response();
  $response->setHttpStatusCode(500);
  $response->setSuccess(false);
  $response->addMessage("Database Connection Failed");
  $response->send();
  exit;
}

if(array_key_exists("carid", $_GET)) {  //this gets the car id if the number exsists in the database
  $carid = $_GET['carid'];

  if($carid == '' || !is_numeric($carid)) { //this checks if the id is an actual number
    $response = new Response();
    $response->setHttpStatusCode(400);
    $response->setSuccess(false);
    $response->addMessage("Car ID: Cannot be null and must be numeric");
    $response->send();
    exit;
  }

  if($_SERVER['REQUEST_METHOD'] === 'GET') {  //this gets the database records from a chosen id number

    try {
      $query = $readDB->prepare('select id, make, model, description, colour, registration, price from tbl_cars where id = :carid');
      $query->bindParam(':carid', $carid, PDO::PARAM_INT);
      $query->execute();

      $rowCount = $query->rowCount();
      $carArray = array();

      if($rowCount === 0) {
        $response = new Response();
        $response->setHttpStatusCode(404);
        $response->setSuccess(false);
        $response->addMessage("Car ID Not Found");
        $response->send();
        exit;
      }
      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $car = new Car($row['id'], $row['make'], $row['model'], $row['description'], $row['colour'], $row['registration'], $row['price']);
        $carArray[] = $car->getCarAsArray();
      }

      $returnData = array();
      $returnData['rows_returned'] = $rowCount;
      $returnData['car'] = $carArray;

      $response = new Response();
      $response->setHttpStatusCode(200);
      $response->setSuccess(true);
      $response->toCache(true);
      $response->setData($returnData);
      $response->send();
      exit;
    }
    catch(CarException $exception) {
      $response = new Response();
      $response->setHttpStatusCode(500);
      $response->setSuccess(false);
      $response->addMessage($exception->getMessage());
      $response->send();
      exit;
    }
    catch(PDOException $exception) {  // this is an error that shows if there is a problem when finding a database record

      $response = new Response();
      $response->setHttpStatusCode(500);
      $response->setSuccess(false);
      $response->addMessage("Failed to Retrieve Car");
      $response->send();
      exit;
    }
  }
  //////////// END OF GET CAR ID ////////////////////////////////////


  elseif($_SERVER['REQUEST_METHOD'] === 'DELETE')  {  //this deletes records from a spesified ID

    try {
      $query = $writeDB->prepare('delete from tbl_cars where id=:carid');
      $query->bindParam(':carid', $carid, PDO::PARAM_INT);
      $query->execute();

      $rowCount = $query->rowCount();

      if($rowCount === 0) {
        $response = new Response();
        $response->setHttpStatusCode(404);
        $response->setSuccess(false);
        $response->addMessage("Error: Car not found!");
        $response->send();
        exit();
      }

      $response = new Response();
      $response->setHttpStatusCode(200);
      $response->setSuccess(true);
      $response->addMessage("Car Deleted Successfully!");
      $response->send();
      exit();
    }
    catch(PDOException $exception) {
      $response = new Response();
      $response->setHttpStatusCode(500);
      $response->setSuccess(false);
      $response->addMessage("Failed to Delete Car");
      $response->send();
      exit();
    }
  }
//////////// END OF DELETE ////////////////////////////////////
  elseif ($_SERVER['REQUEST_METHOD'] === 'PATCH') { //this updates records from the spesified ID

    try {

      if($_SERVER['CONTENT_TYPE'] !== 'application/json') {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("Error: Invalid Content Type Header");
        $response->send();
        exit();
      }

      $rawPATCHData = file_get_contents('php://input');

      if(!$jsonData = json_decode($rawPATCHData)) {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("Error: Request Body is not Valid JSON");
        $response->send();
        exit();
      }


      $makeUpdated = false;
      $modelUpdated = false;
      $descriptionUpdated = false;
      $colourUpdated = false;
      $registrationUpdated = false;
      $priceUpdated = false;


      $queryFields = "";

      if(isset($jsonData->make)){
        $makeUpdated = true;
        $queryFields .= "make = :make, ";
      }
      if(isset($jsonData->model)){
        $modelUpdated = true;
        $queryFields .= "model = :model, ";
      }
      if(isset($jsonData->description)){
        $descriptionUpdated = true;
        $queryFields .= "description = :description, ";
      }
      if(isset($jsonData->colour)){
        $colourUpdated = true;
        $queryFields .= "colour = :colour, ";
      }
      if(isset($jsonData->registration)){
        $registrationUpdated = true;
        $queryFields .= "registration = :registration, ";
      }
      if(isset($jsonData->price)){
        $priceUpdated = true;
        $queryFields .= "price = :price, ";
      }

      $queryFields = rtrim($queryFields, ", ");

      if($queryFields === "") {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage("No Data Provided");
        $response->send();
        exit();
      }

      $carid = $_GET['carid'];
      $query = $readDB->prepare('select id, make, model, description, colour, registration, price from tbl_cars where id = :carid');
      $query->bindParam(':carid', $carid, PDO::PARAM_INT);
      $query->execute();

      $rowCount = $query->rowCount();

      if($rowCount === 0) {
        $response = new Response();
        $response->setHttpStatusCode(404);
        $response->setSuccess(false);
        $response->addMessage("Car ID Not Found");
        $response->send();
        exit;
      }

      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $car = new Car($row['id'], $row['make'], $row['model'], $row['description'], $row['colour'], $row['registration'], $row['price']);
      }

      $updateQueryString = "update tbl_cars set ".$queryFields." where id = :carid";
      $updateQuery = $writeDB->prepare($updateQueryString);

      if($makeUpdated === true){
        $car->setMake($jsonData->make);
        $updatedMake = $car->getMake();
        $updateQuery->bindParam(':make', $updatedMake, PDO::PARAM_STR);
      }
      if($modelUpdated === true){
        $car->setModel($jsonData->model);
        $updatedModel = $car->getModel();
        $updateQuery->bindParam(':model', $updatedModel, PDO::PARAM_STR);
      }
      if($descriptionUpdated === true){
        $car->setDescription($jsonData->description);
        $updatedDescription = $car->getDescription();
        $updateQuery->bindParam(':description', $updatedDescription, PDO::PARAM_STR);
      }
      if($colourUpdated === true){
        $car->setcolour($jsonData->colour);
        $updatedColour = $car->getColour();
        $updateQuery->bindParam(':colour', $updatedColour, PDO::PARAM_STR);
      }
      if($registrationUpdated === true){
        $car->setRegistration($jsonData->registration);
        $updatedRegistration = $car->getRegistration();
        $updateQuery->bindParam(':registration', $updatedRegistration, PDO::PARAM_STR);
      }
      if($priceUpdated === true){
        $car->setPrice($jsonData->price);
        $updatedPrice = $car->getPrice();
        $updateQuery->bindParam(':price', $updatedPrice, PDO::PARAM_STR);
      }


      $updateQuery->bindParam(':carid', $carid, PDO::PARAM_INT);
      $updateQuery->execute();

      $rowCount = $updateQuery->rowCount();
      $carArray = array();

      if($rowCount === 0) {
        $response = new Response();
        $response->setHttpStatusCode(404);
        $response->setSuccess(false);
        $response->addMessage("car Not Updated");
        $response->send();
        exit;
      }

      $query = $readDB->prepare('select id, make, model, description, colour, registration, price from tbl_cars where id = :carid');
      $query->bindParam(':carid', $carid, PDO::PARAM_INT);
      $query->execute();

      $rowCount = $query->rowCount();
      $carArray = array();

      if($rowCount === 0) {
        $response = new Response();
        $response->setHttpStatusCode(404);
        $response->setSuccess(false);
        $response->addMessage("Car ID Not Found");
        $response->send();
        exit;
      }

      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $car = new Car($row['id'], $row['make'], $row['modle'], $row['description'], $row['colour'], $row['registration'], $row['price']);
        $carArray[] = $car->getCarAsArray();
      }

      $returnData = array();
      $returnData['rows_returned'] = $rowCount;
      $returnData['car'] = $carArray;

      $response = new Response();
      $response->setHttpStatusCode(200);
      $response->setSuccess(true);
      $response->toCache(true);
      $response->setData($returnData);
      $response->send();
      exit;
    }

    catch(CarException $exception) {
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->setSuccess(false);
        $response->addMessage($exception->getMessage());
        $response->send();
        exit();
    }
    catch(PDOException $exception) {
        $response = new Response();
        $response->setHttpStatusCode(500);
        $response->setSuccess(false);
        $response->addMessage("Failed to Update Car");
        $response->send();
        exit();
    }
}
////////////////////////END OF PATCH//////////////////////////////

else {
  $response = new Response();
  $response->setHttpStatusCode(405);
  $response->setSuccess(false);
  $response->addMessage("Request method not allowed");
  $response->send();
  exit;
  }
}
elseif(array_key_exists("carmake", $_GET)) {  //this searches the database for records with the matching car make

  // TODO: Add GET endpoint here
  // NOTE: This endpoint returns all entries for a certain MAKE of car
  // NOTE: You do not have to implement this to pass the assessment

  $carmake = $_GET['carmake'];


  if($_SERVER['REQUEST_METHOD'] === 'GET') {  //this gets the database records from a chosen car make

    try {
      $query = $readDB->prepare('select id, make, model, description, colour, registration, price from tbl_cars where make = :carmake');
      $query->bindParam(':carmake', $carmake, PDO::PARAM_INT);
      $query->execute();

      $rowCount = $query->rowCount();
      $carArray = array();

      if($rowCount === 0) {
        $response = new Response();
        $response->setHttpStatusCode(404);
        $response->setSuccess(false);
        $response->addMessage("Car Make Not Found");
        $response->send();
        exit;
      }
      while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $car = new Car($row['id'], $row['make'], $row['model'], $row['description'], $row['colour'], $row['registration'], $row['price']);
        $carArray[] = $car->getCarAsArray();
      }

      $returnData = array();
      $returnData['rows_returned'] = $rowCount;
      $returnData['car'] = $carArray;

      $response = new Response();
      $response->setHttpStatusCode(200);
      $response->setSuccess(true);
      $response->toCache(true);
      $response->setData($returnData);
      $response->send();
      exit;
    }
    catch(CarException $exception) {
      $response = new Response();
      $response->setHttpStatusCode(500);
      $response->setSuccess(false);
      $response->addMessage($exception->getMessage());
      $response->send();
      exit;
    }
    catch(PDOException $exception) {  // this is an error that shows if there is a problem when finding a database record

      $response = new Response();
      $response->setHttpStatusCode(500);
      $response->setSuccess(false);
      $response->addMessage("Failed to Retrieve Car");
      $response->send();
      exit;
    }
}
}
elseif(empty($_GET)) {

  if ($_SERVER['REQUEST_METHOD'] === 'POST') { //this creates new database enteries
try{
    if($_SERVER['CONTENT_TYPE'] !== 'application/json') {
      $response = new Response();
      $response->setHttpStatusCode(400);
      $response->setSuccess(false);
      $response->addMessage("Error: Invalid Content Type Header");
      $response->send();
      exit();
    }

    $rawPOSTData = file_get_contents('php://input');

    if(!$jsonData = json_decode($rawPOSTData)) {
      $response = new Response();
      $response->setHttpStatusCode(400);
      $response->setSuccess(false);
      $response->addMessage("Error: Request Body is not Valid JSON");
      $response->send();
      exit();
    }

    if(!isset($jsonData->make) || !isset($jsonData->model)) {
      $response = new Response();
      $response->setHttpStatusCode(400);
      $response->setSuccess(false);
      (!isset($jsonData->make) ? $response->addMessage("Error: Make is a Mandatory Field") : false);
      (!isset($jsonData->model) ? $response->addMessage("Error: Model Status is a Mandatory Field") : false);
      $response->send();
      exit();
}

    $newCar = new Car(null,
                        (isset($jsonData->make) ? $jsonData->make : null),
                        (isset($jsonData->model) ? $jsonData->model : null),
                        (isset($jsonData->description) ? $jsonData->description : null),
                        (isset($jsonData->colour) ? $jsonData->colour : null),
                        (isset($jsonData->registration) ? $jsonData->registration : null),
                        (isset($jsonData->price) ? $jsonData->price : null));


    $make = $newCar->getMake();
    $model = $newCar->getModel();
    $description = $newCar->getDescription();
    $colour = $newCar->getColour();
    $registration = $newCar->getRegistration();
    $price = $newCar->getPrice();


    $query = $writeDB->prepare('insert into tbl_cars (make, model, description, colour, registration, price) values (:make, :model, :description, :colour, :registration, :price)');

    $query->bindParam(':make', $make, PDO::PARAM_STR);
    $query->bindParam(':model', $model, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':colour', $colour, PDO::PARAM_STR);
    $query->bindParam(':registration', $registration, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);

    $tempvar = $complete;

    $query->execute();

    $rowCount = $query->rowCount();

    if($rowCount === 0) {
      $response = new Response();
      $response->setHttpStatusCode(500);
      $response->setSuccess(false);
      $response->addMessage("Error: Failed to Insert Car into Database");
      $response->send();
      exit();
    }

    $lastCarID = $writeDB->lastInsertId();

    $query = $readDB->prepare('select id, make, model, description, colour, registration, price from tbl_cars where id = :carid');
    $query->bindParam(':carid', $lastCarID, PDO::PARAM_INT);
    $query->execute();

    $rowCount = $query->rowCount();
    $carArray = array();

    if($rowCount === 0) {
      $response = new Response();
      $response->setHttpStatusCode(404);
      $response->setSuccess(false);
      $response->addMessage("Error: Car ID Not Found");
      $response->send();
      exit;
    }

    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $car = new Car($row['id'], $row['make'], $row['model'], $row['description'], $row['colour'], $row['registration'], $row['price']);
      $carArray[] = $car->getCarAsArray();
    }

    $returnData = array();
    $returnData['rows_returned'] = $rowCount;
    $returnData['car'] = $carArray;

    $response = new Response();
    $response->setHttpStatusCode(200);
    $response->setSuccess(true);
    $response->toCache(true);
    $response->setData($returnData);
    $response->send();
    exit;
  }
  catch(CarException $exception) {
    $response = new Response();
    $response->setHttpStatusCode(400);
    $response->setSuccess(false);
    $response->addMessage("Value of Complete on Create is: ".$tempvar);
    $response->send();
    exit();
  }
  catch(PDOException $exception) {
    error_log("Database Query Error: ".$exception, 0);
    $response = new Response();
    $response->setHttpStatusCode(500);
    $response->setSuccess(false);
    $response->addMessage("PDO Error: Failed to Insert Car into Database");
    $response->send();
    exit();
  }
}

else {
  $response = new Response();
  $response->setHttpStatusCode(404);
  $response->setSuccess(false);
  $response->addMessage("Error: Invalid Endpoint");
  $response->send();
  exit();
 }
}
?>
