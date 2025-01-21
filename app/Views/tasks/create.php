<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Crear Nueva Tarea
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h1 class="mb-4">Crear Tareas</h1>

<div class="table-responsive">
    <form action="/tasks/create" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Fecha de Vencimiento</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pendiente">Pendiente</option>
                <option value="en progreso">En Progreso</option>
                <option value="completado">Completada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
        <i class="fa-solid fa-check"></i>
            Crear</button>
        <a href="/tasks" class="btn btn-secondary">
        <i class="fa-solid fa-left-long"></i>
            Volver</a>
    </form>
</div>
<?= $this->endSection() ?>