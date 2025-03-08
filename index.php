<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/scss/custom.css">
    <title>Calculadora UC</title>
</head>
<body>
<header class="">
    <div class="row">
        <div class=" col-10 logo">
            <img src="IMAGENES/logo.png" alt="">
        </div>
        <div class=" col-2  p-1 m-auto">
            <div class="profile-card m-0 bg-primary dropdown">
                <div class="d-flex align-items-center" data-bs-toggle="dropdown">

                    <!-- Imagen de perfil -->
                    <img src="IMAGENES/dragonjar.png" alt="Foto de perfil" class="profile-img m-2">
                    <!-- Información del perfil -->
                    <div>
                        <div class="name-text text-end" >Sepulveda Julian Os...</div>
                        <div class="text-white-50">Estudiante</div>
                    </div>
                    <ul class="dropdown-menu text-white">
                        <li><a class="dropdown-item" href="#">Cambiar Foto</a></li>
                        <li><a class="dropdown-item" href="#">Mis Usuarios</a></li>
                        <li><a class="dropdown-item" href="#"> Cambiar Contraseña</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="row ">
        <div class="col-12 bg-primary min-vw-100">
            <ul class="nav nav-tabs p-2 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Calculadora Estudiantil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="#">Bienestar Universitario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Registro Academico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Moodle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Evaluacion Docente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Manual de Ayuda</a>
                </li>

            </ul>

        </div>
    </div>

    <!-- Contenido -->
    <div class="row">

        <div class="col-4 ">
            <img class="position-fixed z-n1 h-75" src="IMAGENES/unnamed.png" alt="" srcset="">

            <nav class="vertical-menu">
                <div class="container-fluid">
                    <!-- Lista de navegación -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white " href="#">Calculadora Estudiantil </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-8">
            <!-- Calculadora -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form class="m-5" action="index.php" method="POST">
                            <div class="card card-success">
                                <div class="card card-header">
                                    <h3 class="card-title">Calculadora Estudiantil</h3>

                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="p-digito"> Primer Digito</label>
                                        <input type="number" class="form-control" id="p-digito" name="p-digito" placeholder="Digite el Primer Digito">
                                    </div>
                                    <div class="mb-3">
                                        <label for="s-digito"> Segundo Digito</label>
                                        <input type="number" class="form-control" id="s-digito" name="s-digito" placeholder="Digite el Segundo Digito">
                                    </div>

                                    <div class="mb-3">
                                        <label for="operacion"> Seleccione una operacion</label>
                                        <select class="form-select form-select-lg form control" id="operacion" name="operacion">
                                            <option selected> Selecciona una Operacion </option>
                                            <option value="suma">Suma</option>
                                            <option value="resta">Resta</option>
                                            <option value="multiplicacion">Multiplicacion</option>
                                            <option value="division">Division</option>
                                        </select>
                                    </div>
                                    <div>
                                        <?php
                                        class Calculadora {
                                            private $operaciones;

                                            public function __construct() {
                                                // Array de operaciones con su nombre y función
                                                $this->operaciones = [
                                                    ['nombre' => 'suma', 'funcion' => function($a, $b) { return $a + $b; }],
                                                    ['nombre' => 'resta', 'funcion' => function($a, $b) { return $a - $b; }],
                                                    ['nombre' => 'multiplicacion', 'funcion' => function($a, $b) { return $a * $b; }],
                                                    ['nombre' => 'division', 'funcion' => function($a, $b) {
                                                        if ($b == 0) {
                                                            return "Error: No se puede dividir por cero";
                                                        }
                                                        return $a / $b;
                                                    }]
                                                ];
                                            }

                                            // Método para validar los dígitos usando un bucle while
                                            private function validarDigito($digito) {
                                                $esValido = false;
                                                $intento = 0;
                                                $maxIntentos = 10; // Límite para evitar bucles infinitos

                                                // Usar un bucle while para intentar convertir el dígito a un número válido
                                                while (!$esValido && $intento < $maxIntentos) {
                                                    if (is_numeric($digito)) {
                                                        $esValido = true;
                                                        return floatval($digito); // Convertir a float y devolver
                                                    } else {
                                                        $intento++;
                                                        return null; // Si no es válido, devolver null
                                                    }
                                                }

                                                return null; // Si se exceden los intentos, devolver null
                                            }

                                            public function calcular($pDigito, $sDigito, $operacion) {
                                                // Verificar si los parámetros están definidos
                                                if (!isset($pDigito) || !isset($sDigito) || !isset($operacion)) {
                                                    return "<h5 class='text-danger'>Error: Faltan parámetros.</h5>";
                                                }

                                                // Validar los dígitos usando el método con bucle while
                                                $pDigito = $this->validarDigito($pDigito);
                                                $sDigito = $this->validarDigito($sDigito);

                                                if ($pDigito === null || $sDigito === null) {
                                                    return "<h5 class='text-danger'>Error: Los dígitos deben ser números válidos.</h5>";
                                                }

                                                // Usar un bucle for para buscar la operación
                                                $operacionEncontrada = false;
                                                $resultado = null;

                                                for ($i = 0; $i < count($this->operaciones); $i++) {
                                                    if ($this->operaciones[$i]['nombre'] === $operacion) {
                                                        $operacionEncontrada = true;
                                                        $funcion = $this->operaciones[$i]['funcion'];
                                                        $resultado = $funcion($pDigito, $sDigito);
                                                        break; // Salir del bucle una vez que se encuentra la operación
                                                    }
                                                }

                                                // Verificar si se encontró la operación
                                                if ($operacionEncontrada) {
                                                    return "<h5 class='text-success'>El total es de: $resultado</h5>";
                                                } else {
                                                    return "<h5 class='text-danger'>Por favor seleccione una opción válida</h5>";
                                                }
                                            }

                                            // Método para obtener las operaciones (útil para el formulario)
                                            public function obtenerOperaciones() {
                                                return $this->operaciones;
                                            }
                                        }

                                        // Procesar el formulario
                                        $resultado = '';
                                        $calculadora = new Calculadora();

                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                            if (isset($_POST['p-digito']) && isset($_POST['s-digito']) && isset($_POST['operacion'])) {
                                                $pDigito = $_POST['p-digito'];
                                                $sDigito = $_POST['s-digito'];
                                                $operacion = $_POST['operacion'];

                                                $resultado = $calculadora->calcular($pDigito, $sDigito, $operacion);
                                                echo $resultado;
                                            }
                                        }

                                        ?>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-end">REALIZAR CALCULO</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>


</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>