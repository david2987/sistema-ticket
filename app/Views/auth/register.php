<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/signin.css'); ?>">
</head>

<body>
    <div class="container mt-1">
        <div class="d-grid mb-4 text-center">
            <div><i class="fa-solid fa-ticket fa-6x"></i></div>
            <div class="fw-bold fs-2 text">Sistema de Ticket</div>
        </div>
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal">Registrarse</h1>
            <form action="/register" method="post">

                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>">
                    <small class="text-danger"><?= isset($validation) ? $validation->getError('username') : '' ?></small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                    <small class="text-danger"><?= isset($validation) ? $validation->getError('email')  : '' ?></small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="text-danger"><?= isset($validation) ? $validation->getError('password')  : '' ?></small>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-check"></i>
                    Registrarse</button>
                <a href="/login" class="btn btn-secondary">
                <i class="fa-solid fa-left-long"></i>
                    Volver</a>
            </form>
        </main>
    </div>
</body>

</html>