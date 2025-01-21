<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    public $session;

    public function __construct()
    {
        $this->session = session();
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
    }
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks = $taskModel->where('user_id', session('userId'))->paginate(5); // Paginación de 5 registros
        $pager = $taskModel->pager;

        return view('tasks/index', compact('tasks', 'pager'));
    }

    public function create()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'title' => 'required|min_length[3]|max_length[255]',
                'description' => 'required',
                'due_date' => 'required|valid_date',
                'status' => 'required|in_list[pending,in_progress,completed]',
            ];

            if (!$this->validate($rules)) {
                return view('tasks/create', ['validation' => $this->validator]);
            }

            $taskModel = new TaskModel();
            $taskModel->save([
                'user_id' => session('userId'),
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'due_date' => $this->request->getPost('due_date'),
                'status' => $this->request->getPost('status'),
            ]);

            return redirect()->to('/tasks')->with('success', 'Tarea creada exitosamente.');
        }

        return view('tasks/create');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->where('id', $id)->where('user_id', session('userId'))->first();

        if (!$task) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tarea no encontrada.');
        }

        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'title' => 'required|min_length[3]|max_length[255]',
                'description' => 'required',
                'due_date' => 'required|valid_date',
                'status' => 'required|in_list[pending,in_progress,completed]',
            ];

            if (!$this->validate($rules)) {
                return view('tasks/edit', ['task' => $task, 'validation' => $this->validator]);
            }

            $taskModel->update($id, [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'due_date' => $this->request->getPost('due_date'),
                'status' => $this->request->getPost('status'),
            ]);

            return redirect()->to('/tasks')->with('success', 'Tarea actualizada exitosamente.');
        }

        return view('tasks/edit', compact('task'));
    }


    public function view($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->where('id', $id)->where('user_id', session('userId'))->first();

        if (!$task) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tarea no encontrada.');
        }
        
        return view('tasks/view', compact('task'));
    }


    public function delete($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->where('id', $id)->where('user_id', session('userId'))->first();

        if (!$task) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tarea no encontrada.');
        }

        $taskModel->delete($id);

        return redirect()->to('/tasks')->with('success', 'Tarea eliminada exitosamente.');
    }
}
