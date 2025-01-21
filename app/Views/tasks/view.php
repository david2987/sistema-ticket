<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Crear Nueva Tarea
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Ticket</h1>


    <?= csrf_field() ?>

    <div class="mb-3">
        <label for="title" class="form-label">Título</label>
        <input type="text" class="form-control" disabled  id="title" name="title" value="<?= old('title', $task['title']) ?>" required>        
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descripción</label>
        <textarea class="form-control" disabled id="description" name="description" rows="4" required><?= old('description', $task['description']) ?></textarea>        
    </div>

    <div class="mb-3">
        <label for="due_date" class="form-label">Fecha de Vencimiento</label>
        <input type="date" class="form-control" disabled id="due_date" name="due_date" value="<?= old('due_date', $task['due_date']) ?>" required>
        <small class="text-danger"><?= isset($validation) ? $validation->getError('due_date') : '' ?></small>
    </div>

    <div class="mb-3">
        <label for="status" class="form-label">Estado</label>
        <select class="form-select" id="status" name="status" disabled>
            <option value="pendiente" <?= old('status', $task['status']) === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
            <option value="en progreso" <?= old('status', $task['status']) === 'en progreso' ? 'selected' : '' ?>>En Progreso</option>
            <option value="completado" <?= old('status', $task['status']) === 'completado' ? 'selected' : '' ?>>Completada</option>
        </select>
        <small class="text-danger"><?= isset($validation) ? $validation->getError('status') : '' ?></small>
    </div>
    
    <a href="/tasks" class="btn btn-secondary">
        <i class="fa-solid fa-left-long"></i>
        Volver</a>
</div>
<?= $this->endSection() ?>
