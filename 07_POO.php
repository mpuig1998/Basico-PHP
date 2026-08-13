<?php

// Clases y Objetos
class Clase {
    public $propiedad_1;
    public $propiedad_2;

    public function Funcion() {
        return "Hola, mi nombre es $this->propiedad_1 y tengo $this->propiedad_2 años.";
    }
}

$objeto = new Clase();
$objeto->propiedad_1 = "Asignando propiedad_1 del objeto_1";
$objeto->propiedad_2 = "Asignando propiedad_2 del objeto_1";

echo $objeto->Funcion() . "<br>";


// Propiedades y Métodos
class Persona {
    public $nombre;
    public $apellido;

    public function __construct($nombre, $apellido) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function descripcion() {
        return "Nombre: $this->nombre, Apellido: $this->apellido.";
    }
}

$persona = new Persona("Tu Nombre", "Tu Apellido");
echo $persona->descripcion() . "<br>";


// Herencia
class Profesor {
    public $herencia;

    public function __construct($herencia) {
        $this->herencia = $herencia;
    }

    public function profesor() {
        return "El profesor enseña IT.";
    }
}

class Alumno extends Profesor {
    public function alumno() {
        return "El alumno enseña $this->herencia.";
    }
}

$estudiante = new Alumno("programación");
echo $estudiante->alumno() . "<br>";


// Encapsulamiento
class Banco {
    private $saldo = 0;

    public function ingreso($cantidad) {
        if ($cantidad > 0) {
            $this->saldo += $cantidad;
        }
    }
    public function retiro($cantidad) {
        if ($cantidad > 0) {
            $this->saldo -= $cantidad;
        }
    }    
    public function detalle() {
        return $this->saldo;
    }
}

$cuenta = new Banco();
$cuenta->ingreso(500);
echo "Saldo actual: " . $cuenta->detalle() . "<br>";


// Interfaces
interface Estudia {
    public function temario();
}

class Estudiante implements Estudia {
    public function temario() {
        return "El alumno estudia IT.";
    }
}

$mario = new Estudiante();
echo $mario->temario() . "<br>";


// Traits
trait Felicitaciones {
    public function licencia() {
        return "Empiezan las practicas";
    }
}

class Estudiantes {
    use Felicitaciones;
}

$licenciado = new Estudiantes();
echo $licenciado->licencia() . "<br>";
?>