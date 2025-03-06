<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class ListTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:list {--a|all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List the task uncompleted';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $all = $this->option('all');

        if ($all) {
            $tasks = Task::all()->map(function ($task) {
                return [
                    'ID' => $task->id,
                    'Task' => $task->name,
                    'Created' => $task->created_at->diffForHumans(),
                    'Done' => $task->completed ? 'completed' : 'uncompleted',
                ];
            });
        } else {
            $tasks = Task::where('completed', false)->get()->map(function ($task) {
                return [
                    'ID' => $task->id,
                    'Task' => $task->name,
                    'Created' => $task->created_at->diffForHumans(),
                    'Done' => $task->completed ? 'completed' : 'uncompleted',
                ];
            });
        }

        $this->table(['ID', 'Task', 'Created', 'Done'], $tasks);
    }
}
