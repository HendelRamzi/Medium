<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class CompletedTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:completed {task_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mark the given task as completed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $task_id = $this->argument('task_id');

        try {
            $task = Task::find($task_id);
            $task->completed();

            $this->info("Task #{$task->id} completed successfully ");
        } catch (\Exception $e) {
            $this->warn("Problem occured when updating the task!");
        }
    }
}
