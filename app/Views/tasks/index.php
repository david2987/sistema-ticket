<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Lista de Tareas
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1 class="mb-4 mt-5">Ticket</h1>

<div class="mb-3  d-flex gap-3">
    <div class="col-3">
        <input type="text" id="search" class="form-control" placeholder="Buscar tareas..." onkeyup="filterTasks()">
    </div>
    <div class="col-3">
        <select class="form-select" id="status"   aria-label="Estados" onkeyup="filterTasks()">        
        <option value="">Todos</option>
            <option value="pendiente">PENDIENTE</option>
            <option value="en progreso">EN PROGRESO</option>
            <option value="completado">COMPLETADO</option>
        </select>
    </div>
    <div class="col-3">
        <a href="/tasks/create" class="btn btn-success">
            <i class="fa-solid fa-plus"></i>
            Crear Ticket
        </a>
    </div>
</div>
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
</div>

<script>
    function filterTasks() {
        let input = document.getElementById('search').value.toLowerCase();
        let rows = document.getElementById('tasksTable').getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName('td');
            let match = false;

            for (let j = 0; j < cells.length - 1; j++) {
                if (cells[j].textContent.toLowerCase().includes(input)) {
                    match = true;
                    break;
                }
            }

            rows[i].style.display = match ? '' : 'none';
        }
    }
</script>
<?= $this->endSection() ?>