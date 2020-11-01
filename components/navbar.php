<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);

if (!class_exists('db')) {
  require $root . "/php/db.php";
}
require $root . "/php/credentials.php"
?>
<?php
$db = new db($dbHost, $dbUID, $dbPWD, $dbName);
$sql = "SELECT * FROM doc_especialidades WHERE doc_especialidades_key IN (SELECT doc_especialidades_key FROM doc_doctores_especialidades)";
$especialidades = $db->query($sql)->fetchAll();

?>
<div>

  <div class="d-none d-sm-block" id="contactUs">
    <a class="text-white" href="/contacto">Contáctanos</a>
  </div>
  <nav class="navbar navbar-expand-xl navbar-light d-print" id="top-navbar">

    <!-- Brand -->
    <a class="navbar-brand ml-lg-5" href="/">
      <img src="/img/svg/Logo Plaza Ancalmo copy.svg" width="75" alt="Logo de Plaza Ancalmo">
    </a>

    <a href="/" class="navbar-brand">PLAZA <br>ANCALMO</a>
    <!-- toggle button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Items de la navbar -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav">
        <a class="nav-link" href="/acerca-de">Nosotros</a>
        <a class="nav-link" href="/farmacia">Farmacia Ancalmo</a>
        <!-- <a class="nav-link" href="http://www.menendezlab.com/" target="_blank">Laboratorio Menéndez</a> -->
        <a class="nav-link" href="#">Lifestyle</a>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="especialidadesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Doctores
          </a>
          <div class="dropdown-menu" id="especialidadesMenu" aria-labelledby="especialidadesDropdown">
            <a class="dropdown-item" href="/especialidades/">Todos</a>
            <a class="dropdown-item" href="http://www.menendezlab.com/" target="_blank">Laboratorio</a>
            <?php
            foreach ($especialidades as $especialidad) {
            ?>
              <a class="dropdown-item" href="/especialidades/?especialidad=<?= $especialidad['doc_especialidades_key'] ?>"><?= $especialidad['doc_especialidades_nombre'] ?></a>

            <?php
            }
            ?>
          </div>
        </div>
        <a class="nav-link" href="#">Locales Disponibles</a>
        <a class="nav-link" href="/galeria">Galería</a>


        <a class="nav-link d-block d-sm-none" id="contactanos-tab" href="/contacto">Contáctanos</a>
      </div>
    </div>
  </nav>
</div>