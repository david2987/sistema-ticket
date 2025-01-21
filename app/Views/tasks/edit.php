<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Crear Nueva Tarea
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Editar Ticket</h1>

<form action="/tasks/edit/<?= $task['id'] ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $task['title']) ?>" required>
        <small class="text-danger"><?= isset($validation) ? $validation->getError('title') : '' ?></small>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" id="description" name="description" rows="4" required><?= old('description', $task['description']) ?></textarea>
        <small class="text-danger"><?= isset($validation) ? $validation->getError('description') : '' ?></small>
    </div>

    <div class="mb-3">
        <label for="due_date" class="form-label">Fecha de Vencimiento</label>
        <input type="date" class="form-control" id="due_date" name="due_date" value="<?= old('due_date', $task['due_date']) ?>" required>
        <small class="text-danger"><?= isset($validation) ? $validation->getError('due_date') : '' ?></small>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Estado</label>
        <select class="form-select" id="status" name="status" required>
            <option value="pending" <?= old('status', $task['status']) === 'pending' ? 'selected' : '' ?>>Pendiente</option>
            <option value="in_progress" <?= old('status', $task['status']) === 'in_progress' ? 'selected' : '' ?>>En Progreso</option>
            <option value="completed" <?= old('status', $task['status']) === 'completed' ? 'selected' : '' ?>>Completada</option>
        </select>
        <small class="text-danger"><?= isset($validation) ? $validation->getError('status') : '' ?></small>
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
