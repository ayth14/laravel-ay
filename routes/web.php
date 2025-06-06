<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

class Local_Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {}
}

$tasks = [
  new Local_Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Local_Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Local_Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Local_Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];

Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  // $tasks = Task::all();
  $tasks = Task::latest()->get();
  return view('index', [
    "tasks" => $tasks
  ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) use ($tasks) {
  $task = Task::findOrFail($id);

  // if (!$task) {
  //   abort(Response::HTTP_NOT_FOUND);
  // }
  return view('tasks.show', ['task' => $task]);
})->name('tasks.show');

Route::get('/create-task', function ($id) {
  return view('tasks.create');
})->name('task.create');

// Route::get('/extra', function () {
//     return 'Hello how are you?';
// })->name('extra');

// Route::get('/hello', function () {
//     return redirect()->route('extra');
// });

Route::fallback(function () {
  return 'You hit an Error!';
});
