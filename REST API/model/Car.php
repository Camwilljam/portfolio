<?php

class CarException extends Exception { }

class Car {
  private $_id;
  private $_make;
  private $_model;
  private $_description;
  private $_colour;
  private $_registration;
  private $_price;

  public function __construct($id, $make, $model, $description, $colour, $registration, $price) {
    $this->setId($id);
    $this->setMake($make);
    $this->setModel($model);
    $this->setDescription($description);
    $this->setColour($colour);
    $this->setRegistration($registration);
    $this->setPrice($price);
  }

  public function getId() {
    return $this->_id;
  }

  public function getMake() {
    return $this->_make;
  }

  public function getModel() {
    return $this->_model;
  }

  public function getDescription() {
    return $this->_description;
  }

  public function getColour() {
    return $this->_colour;
  }

  public function getRegistration() {
    return $this->_registration;
  }

  public function getPrice() {
    return $this->_price;
  }

  public function setId($id) {
    if (($id !== null) && (!is_numeric($id) || $this->_id !== null)) {
      throw new CarException("Error: Car ID Issue");
    }
    $this->_id = $id;
  }

  public function setMake($make) {
    $this->_make = $make;
  }

  public function setModel($model) {
    $this->_model = $model;
  }

  public function setDescription($description) {
    $this->_description = $description;
  }

  public function setColour ($colour) {
    $this->_colour = $colour;
  }

  public function setRegistration($registration) {
    $this->_registration = $registration;
  }

  public function setPrice($price) {
    $this->_price = $price;
  }

  public function getCarAsArray() {
    $car = array();
    $car['id'] = $this->getId();
    $car['make'] = $this->getMake();
    $car['model'] = $this->getModel();
    $car['description'] = $this->getDescription();
    $car['colour'] = $this->getColour();
    $car['registration'] = $this->getRegistration();
    $car['price'] = $this->getPrice();
    return $car;
  }
}

?>
