<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Lista de Tareas
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="mb-4 mt-5">Ticket</h1>



<form method="get" action="<?= base_url('tasks') ?>" class="mb-3">
    <div class="mb-3  d-flex gap-3">
        <div class="col-3">
            <input type="text" name="search" class="form-control" placeholder="Buscar tareas..." value="<?= esc($search) ?>">
        </div>
        <div class="col-3">
            <select class="form-select" id="status" name="status" aria-label="Estados" >
                <option value="">Todos</option>
                <option <?= isset($status) && $status =='pendiente'?'selected':'' ?>  value="pendiente">PENDIENTE</option>
                <option <?= isset($status) && $status =='en progreso'?'selected':'' ?> value="en progreso">EN PROGRESO</option>
                <option <?= isset($status) && $status =='completado'?'selected':'' ?> value="completado">COMPLETADO</option>
            </select>

        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="/tasks/create" class="btn btn-success">
                <i class="fa-solid fa-plus"></i>
                Crear Ticket
            </a>
        </div>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha de Vencimiento</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tasksTable">
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><a href="/tasks/view/<?= $task['id'] ?>"><?= $task['id'] ?></a></td>
                    <td><?= esc($task['title']) ?></td>
                    <td><?= esc($task['description']) ?></td>
                    <td><?= date('d/m/Y', strtotime($task['due_date'])) ?></td>
                    <td>

                        <?php
                        echo "<div>";
                        switch ($task['status']) {
                            case 'pendiente':

                                echo "<i class='fa-solid fa-circle' style='color:red' ></i>";

                                break;
                            case 'en progreso':
                                echo "<i class='fa-solid fa-circle' style='color:yellow' ></i>";
                                break;
                            case 'completado':
                                echo "<i class='fa-solid fa-circle' style='color:green' ></i>";
                                break;
                        }
                        echo ' ' . strtoupper($task['status']);



                        ?>
                    </td>
                    <td>
                        <a href="/tasks/edit/<?= $task['id'] ?>" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Editar</a>
                        <a href="/tasks/delete/<?= $task['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta tarea?')">
                            <i class="fa-solid fa-trash"></i>
                            Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        <?= isset($pager)?$pager->links():'' ?>
    </div>
</div>

<script>
    // Filtro de tareas en tiempo real
    document.querySelector('input[name="search"]').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('#taskTable tr');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(term) ? '' : 'none';
        });
    });
</script>
<?= $this->endSection() ?>