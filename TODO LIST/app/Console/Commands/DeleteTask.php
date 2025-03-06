<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class DeleteTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:delete {task_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $task_id = $this->argument('task_id');

        

        try {
            $task = Task::find($task_id);
            $task->delete();

            $this->info("Task deleted successfully ");
        } catch (\Exception $e) {
            $this->warn("Problem occured when deleting the task!");
        }
    }
}
