<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Crear Nueva Tarea
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Editar Ticket</h1>

<form action="/tasks/edit/<?= $task['id'] ?>" method="post">
    <?= csrf_field() ?>
    <?php
    if (isset($success)) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $success ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <?php
    if (isset($validation)) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $validation->listErrors() ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>

    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $task['title']) ?>" required>

    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="4" required><?= old('description', $task['description']) ?></textarea>
    </div>

    <div class="mb-3">
        <label for="due_date" class="form-label">Fecha de Vencimiento</label>
        <input type="date" class="form-control" id="due_date" name="due_date" value="<?= old('due_date', $task['due_date']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Estado</label>
        <select class="form-select" id="status" name="status" required>
            <option value="pendiente" <?= old('status', $task['status']) === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
            <option value="en progreso" <?= old('status', $task['status']) === 'en progreso' ? 'selected' : '' ?>>En Progreso</option>
            <option value="completado" <?= old('status', $task['status']) === 'completado' ? 'selected' : '' ?>>Completada</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">
        <i class="fa-solid fa-check"></i>
        Editar</button>
    <a href="/tasks" class="btn btn-secondary">
        <i class="fa-solid fa-left-long"></i>
        Volver</a>
</form>
</div>
<?= $this->endSection() ?>