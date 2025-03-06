<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class CreateTask extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:create {name} {description?} {--completed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command That create a new task';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        /**
         * Access the arguments
         */
        $name = $this->argument('name');
        $description = $this->argument('description');

        /**
         * Access the option
         */
        $completed = $this->option('completed');

        try {
            $task = Task::create([
                "name" => $name,
                "description" => $description,
                "completed" => $completed
            ]);

            $this->info("Task created successfully! {$task->name}");
        } catch (\Exception $e) {
            $this->warn("Problem occured when creating the task!");
        }
    }


    /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array<string, string>
     */
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => 'Please provide the name of the task.',
        ];
    }
}
