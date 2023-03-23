<?php
class Car {

    /**
     * The color of the car (i.e. red, blue, grey, black)
     * @var string
     */
    public $color;

    /**
     * The make of the car (i.e. Chevy, Dodge, Toyota)
     * @var string
     */
    public $make;

    /**
     * The model of the car (i.e. Silverado, Dart, Corolla)
     * @var string
     */
    public $model;

    /**
     * The color of the car
     * Format: YYYY (i.e. 2023)
     * @var int
     */
    public $year;

    /**
     * The current of the car
     * Examples: forward, Parked, Reverse
     * @var string
     */
    public $status;

    /**
     * Car constructor
     */
    function __construct()
    {
        $this->status = 'parked';
    }

    /**
     * Put the car in forward status
     * @return void
     */
    function forward(){
        $this->status = 'forward';
        echo "The car is moving forward <br><br>";
    }

    /**
     * Put the car in reverse status
     * @return void
     */
    function reverse(){
        $this->status = 'reverse';
        echo "The car is moving backwards <br><br>";
    }

    /**
     * Put the car in park status
     * @return void
     */
    function park(){
        $this->status = 'park';
        echo "The car is now parked <br><br>";
    }

    // Setters and getters
    function  setColor($color){
        $this->color = $color;
    }
    function  getColor(){
        return $this->color;
    }

    function  setMake($make){
        $this->make = $make;
    }
    function  getMake(){
        return $this->make;
    }

    function  setModel($model){
        $this->model = $model;
    }
    function  getModel(){
        return $this->model;
    }

    function  setYear($year){
        $this->year = $year;
    }
    function  getYear(){
        return $this->year;
    }
} //--end of class


$my_car = new Car();
$my_car -> setColor( "green");
$my_car -> setMake( "Dodge");
$my_car -> setModel( "Shadow");
$my_car -> setYear( "1994");
echo "My $my_car->color $my_car->make $my_car->model was made in $my_car->year. <br><br>";
echo "My {$my_car->getColor()} {$my_car->getMake()} {$my_car->getModel()} was made in {$my_car->getYear()}. <br><br>";

$my_car -> forward();
$my_car -> reverse();
$my_car -> park();