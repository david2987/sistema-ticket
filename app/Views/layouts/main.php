<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestion de Ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/ticket.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>

<body>
    <div class="grid w-100">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <i class="fa-solid fa-ticket" style="background-color: #ccc;"></i>
                <a class="navbar-brand ms-2" href="/dashboard"> Sistema Ticket</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">                    
                        <li class="nav-item">
                        <li class="nav-item"><a class="nav-link " href="/tasks">
                                <i class="fa-solid fa-clipboard-list"></i>
                                Tareas</a></li>
                        </li>
                       

                       

                    </ul>
                    <ul class="navbar-nav ms-auto userProfile ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                            </a>
                            <ul class="dropdown-menu bg-dark ">
                                <li class="dropdown-item">
                                    <a class="nav-link" href="/profile/<?= session()->get('userId') ?>">
                                        <i class="fa-solid fa-user"></i>
                                        Perfil
                                    </a>
                                </li>
                                <li class="dropdown-item">
                                    <a class="nav-link" href="/logout">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        Salir
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- -->
                    </ul>

                </div>
            </div>
        </nav>
        <div class="container">
            <!-- Main Content -->
            <div class="container-fluid">                
                <?= $this->renderSection('content') ?>
            </div>

            <!-- Footer -->
            <footer class="text-center mt-4 footer">
                <p>&copy; <?= date('Y') ?> Sistema de Tickets . Todos los derechos reservados.</p>
            </footer>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>