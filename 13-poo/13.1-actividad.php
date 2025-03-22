<?php 

class Cuenta {

    public string $nombre;
    public string $apellidos;
    public int $dni;
    public int $saldo;
    public bool $activa;

    function __construct(string $nombre, string $apellidos, int $dni, int $saldo, bool $activa) 
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->saldo = $saldo;
        $this->activa = $activa;
    }

    public function actualizarInfoPersonal(string $nuevoNombre, string $nuevoApellido, bool $cambioEstado): void 
    {
        $this->nombre = $nuevoNombre;
        $this->apellidos = $nuevoApellido;
        $this->activa = $cambioEstado;
        echo "La información del cliente ha sido actualizada correctamente.";
    }

    public function ingresarClienteNuevo(string $nombreClt, string $apellidosClt, int $dniClt, int $saldoClt, bool $activoClt):void 
    {
        $this->nombre = $nombreClt;
        $this->apellidos = $apellidosClt;
        $this->dni = $dniClt;
        $this->saldo = $saldoClt;
        $this->activa = $activoClt;
        echo "Estos son los datos del Cliente Nuevo: Nombre: {$this->nombre}, Apellidos: {$this->apellidos}, DNI: {$this->dni}, Saldo: {$this->saldo}, Activo: {$this->activa}.";
    }

    public function ingresarDinero(int $aumentaSaldo):void 
    {
        $this->saldo += $aumentaSaldo;
        echo "{$this->nombre}, tu nuevo saldo es: {$this->saldo}.";
    }

    public function restarDinero(int $restaSaldo):void 
    {
        $this->saldo -= $restaSaldo;
        echo "{$this->nombre}, tu nuevo saldo es: {$this->saldo}.";
    }

    public function bloquearCliente():void 
    {
        $this->activa = false;
        echo "{$this->nombre} tu cuenta ya no está activa.";
    }

    public function desbloquearCliente():void
    {
        $this->activa = true;
        echo "{$this->nombre} tu cuenta ya está activa.";
    }

    public function mostrarInfoCliente():void
    {
        echo "Estos son los datos de cliente: {$this->nombre}, {$this->apellidos}, {$this->dni}, {$this->saldo}, $this->activa";
    }
}

// Usando la clase Cuenta

// Creo un objeto
$miCuenta = new Cuenta("Pepito", "Perez", 123123, 34500, true);

// Llamo a la fx mostrarInfoCliente
$miCuenta->mostrarInfoCliente();

// Llamo a la fx ingresarDinero
$miCuenta->ingresarDinero(23000);

// Llamo a la fx restarDinero
$miCuenta->restarDinero(1200);

// Llamo a la fx bloquearCliente
$miCuenta->bloquearCliente();

// Llamo a la fx bloquearCliente
$miCuenta->desbloquearCliente();
?>