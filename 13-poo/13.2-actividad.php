<?php 
class Hotel {

    public int $numero;
    public int $camas;
    public bool $disponible;
    public bool $limpia;
    public int $capacidad;

    function __construct(int $numero, int $camas, bool $disponible, bool $limpia, int $capacidad) 
    {
        $this->numero = $numero;
        $this->camas = $camas;
        $this->disponible = $disponible;
        $this->limpia = $limpia;
        $this->capacidad = $capacidad;

        echo "Se creó la habitacion $this->numero con $this->camas camas, capacidad: $this->capacidad personas, con estado: $this->disponible y se encuentra $this->limpia";
    }

    public function actualizar_datos_hab(int $actCamas, bool $actDisponible, bool $actLimpia, int $actCapacidad)
    {
        $this->camas = $actCamas;
        $this->disponible = $actDisponible;
        $this->limpia = $actLimpia; 
        $this->capacidad = $actCapacidad;

        echo "La habitación $this->numero se actualizó a $this->camas camas, capacidad: $this->capacidad personas, disponible: $this->disponible, Limpia: $this->limpia";
    }

    public function marcar_hab_limpia(bool $actLimpia)
    {
        $this->limpia = $actLimpia;

        if ($this->limpia) {
            echo "La habitación $this->numero está limpia.";
        } else {
            echo "La habitación $this->numero está sucia.";
        }
    }

    public function marcar_hab_disponible(bool $actDisponible)
    {
        $this->disponible = $actDisponible;
        if($this->disponible) {
            echo "La habitacion $this->numero esta disponible";
        } else {
            echo "La habitacion $this->numero no esta disponible";
        }

    }

    public function ver_capacidad()
    {
        echo "La habitación $this->numero tiene capacidad para $this->capacidad personas";
    }

    public function ver_numero_habitacion()
    {
        echo "El número de habitación es: $this->numero";
    }
}

$habitacion = new Hotel(234, 2, true, true, 4);
$habitacion->actualizar_datos_hab(4,false,true,3);
$habitacion->marcar_hab_limpia(false);
$habitacion->marcar_hab_disponible(true);
$habitacion->ver_capacidad();
$habitacion->ver_numero_habitacion();

?>