<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Lista de Tareas
<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <div class="container mt-1">
        
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal">Perfil de Usuario</h1>
            
            <form action="/profile/<?= $user['id'] ?>" method="post">
            <?php
             if(isset($success)){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $success?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>

            <?php 
            if(isset($validation)){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $validation->listErrors() ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username', $user['username']) ?>">
                    <small class="text-danger"><?= isset($validation) ? $validation->getError('username') : '' ?></small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" readonly disabled class="form-control" id="email" name="email" value="<?= old('email', $user['email']) ?>">                    
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">                   
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-check"></i>
                    Editar </button>
              
                
            </form>
            
        </main>
    </div>
</body>

</html>

<?= $this->endSection() ?>