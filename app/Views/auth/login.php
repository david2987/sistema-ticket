<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/signin.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>

    <main class="form-signin">
        <form action="/login" method="post">
            <?= csrf_field() ?>
            <div class="d-grid mb-4 text-center">
                <div><i class="fa-solid fa-ticket fa-6x"  ></i></div>
                <div class="fw-bold fs-2 text">Sistema de Ticket</div>                        
            </div>
            <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>        
            <div class="form-floating">
                <input type="email" class="form-control" id="email" name="email">
                <label for="email" style="background-color: transparent ">Correo Electrónico</label>
                <small class="text-danger"><?= isset($validation) ? $validation->getError('email') : '' ?></small>
            </div>
            <div class="form-floating mt-2">
                <input type="password" class="form-control" id="password" name="password">
                <label for="password" style="background-color: transparent !important;" >Contraseña</label>
                <small class="text-danger"><?= isset($validation) ? $validation->getError('password') : '' ?></small>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recordar 
                </label>
            </div>
            <!-- <button class="" type="submit">Sign in</button> -->
             <div class="d-grid p-2">
                <div class="col-md-12">
                    <button type="submit" class="w-100 btn btn-lg btn-primary">Iniciar Sesión</button>
                </div>
                <div class="col-md-12 mt-2">
                    <a href="/register" class="w-100 btn btn-lg btn-secondary">Registrarse</a>
                </div>
             </div>      
        </form>
    </main>
    <?php if (isset($error)): ?>
        <small class="text-danger"><?= $error ?></small>
    <?php endif; ?>
</body>

</html>