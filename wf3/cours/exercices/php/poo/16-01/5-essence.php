<?php

class Car
{
    const NB_WHEELS = 4;

    private static $fuel_tank_capacity = 50;
    private $fuel_tank_filled = 10;

    private $color = 'noir';

    /**
     * Récupère la couleur
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Assigne une couleur
     *
     * @param $color
     * @return $this
     */
    public function setColor( $color )
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Récupère la contenance du réservoir d'essence
     *
     * @return int
     */
    public function getFuelTankCapacity()
    {
        return self::$fuel_tank_capacity;
    }

    /**
     * Assigne une nouvelle contenance de réservoir d'essence
     *
     * @param $fill
     */
    public static function setFuelTankCapacity( $fill )
    {
        if( is_numeric($fill) && $fill > 0 ) {
            self::$fuel_tank_capacity = $fill;
        }
    }

    /**
     * Récupère le nombre de litres d'essence contenu dans le reservoir
     *
     * @return int
     */
    public function getFuelTankFilled()
    {
        return $this->fuel_tank_filled;
    }

    /**
     * Assigne une valeur au remplissage du réservoir
     *
     * @param $fill
     * @return $this
     */
    public function setFuelTankFilled( $fill )
    {
        $this->fuel_tank_filled = $fill;

        return $this;
    }

    public function getFuelFankMissing()
    {
        return $this->getFuelTankCapacity() - $this->getFuelTankFilled();
    }
}

/*$voiture = new Car;
echo 'Voiture 1 => Couleur : ' . $voiture->getColor() . ', Contenance : ' . $voiture->getFuelTankCapacity() . '<hr />';

$voiture2 = (new Car)->setColor('green');
echo 'Voiture 1 => Couleur : ' . $voiture->getColor() . ', Contenance : ' . $voiture->getFuelTankCapacity() . '<br />';
echo 'Voiture 2 => Couleur : ' . $voiture2->getColor() . ', Contenance : ' . $voiture2->getFuelTankCapacity() . '<hr />';

Car::setFuelTankCapacity(60);

$voiture3 = new Car;
echo 'Voiture 3 => Couleur : ' . $voiture3->getColor() . ', Contenance : ' . $voiture3->getFuelTankCapacity() . '<hr />';*/

class Gas_station
{
    # Capacité de la contenance de la station
    const CAPACITY = 800;
    # Volume rempli du réservoir de la station
    private static $fuel_tank_filled = 800;

    /**
     * Récupère la capacité du réservoir de la station
     *
     * @return int
     */
    public function getCapacity()
    {
        return self::CAPACITY;
    }

    /**
     * Récupère le volume rempli du réservoir de la station
     *
     * @return int
     */
    public function getFuelTankFilled()
    {
        return self::$fuel_tank_filled;
    }

    /**
     * Assigne une valeur au volume d'essence contenu dans le réservoir de la station
     *
     * @param $fuel_tank_filled
     * @return $this
     */
    public function setFuelTankFilled( $fuel_tank_filled )
    {
        self::$fuel_tank_filled = $fuel_tank_filled;
    }

    public function getFinalVolumFuel( $car_fuel_fill )
    {
        return ( ( self::getFuelTankFilled() - $car_fuel_fill ) < 0 ) ? self::getFuelTankFilled() : $car_fuel_fill ;
    }

    /**
     * Rempli l'essence d'une voiture
     *
     * @param Car $car
     */
    public static function fillFuelTank( Car $car )
    {
        ###########
        # Voiture #
        ###########
        /**
         * Quantité restante d'essence dans la voiture
         */
        $car_fuel_filled = $car->getFuelTankFilled();

        /**
         * Quantité d'essence manquante dans la voiture
         */
        $car_fuel_hope = $car->getFuelFankMissing();

        ###################
        # Station Essence #
        ###################
        # Quantité restante d'essence dans la station
        $gas_station_filled = self::getFuelTankFilled();


        /**
         * Capacité de remplissage de la voiture par la station essence
         */
        $car_fuel_reality = self::getFinalVolumFuel( $car_fuel_hope ) ;


        /**
         * Nouvelle contenance de la station
         */
        $new_gas_station_capacity = ( ( $gas_station_filled - $car_fuel_reality ) < 0 ) ? 0 : $gas_station_filled - $car_fuel_reality;

        /**
         * Nouvelle contenance de la voiture
         */
        $new_car_fuel_tank_filled = $car_fuel_filled + $car_fuel_reality;

        /**
         * On rempli de le réservoir de la voiture
         */
        $car->setFuelTankFilled( $new_car_fuel_tank_filled );

        /**
         * On vide le résevoir de la station
         */
        self::setFuelTankFilled( $new_gas_station_capacity );
    }
}

echo '<pre>';

$car = new Car;

echo '<h2>VOITURE : </h2>';
echo 'Capacite essence : ';
var_dump($car->getFuelTankCapacity());
echo '<br />';
echo 'Essence restante : ';
var_dump($car->getFuelTankFilled());
echo '<br />';
echo 'Essence manquante : ';
var_dump($car->getFuelFankMissing());
echo '<h2>STATION ESSENCE : </h2>';
echo 'Capacite essence : ';
var_dump(Gas_station::CAPACITY);
echo '<br />';
echo 'Essence restante : ';
var_dump(Gas_station::getFuelTankFilled());
echo '<br />';

/*

*/
echo '<hr /><h2>PASSAGE À LA STATION...</h2>';
echo <<<PASSAGE_STATION
                                          ________
            ___                          /  ____  \
           /_|_\__                       | |____| |
..........|__|__|__|       ===>          |        |
            O     O                      |________|
PASSAGE_STATION;

echo '<hr />';
Gas_station::fillFuelTank( $car );




echo '<h2>VOITURE : </h2>';
echo 'Capacite essence : ';
var_dump($car->getFuelTankCapacity());
echo '<br />';
echo 'Essence restante : ';
var_dump($car->getFuelTankFilled());
echo '<br />';
echo 'Essence manquante : ';
var_dump($car->getFuelFankMissing());
echo '<h2>STATION ESSENCE : </h2>';
echo 'Capacite essence : ';
var_dump(Gas_station::CAPACITY);
echo '<br />';
echo 'Essence restante : ';
var_dump(Gas_station::getFuelTankFilled());
echo '<br />';