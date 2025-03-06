# Laravel CLI Task Manager

This project is a Laravel-based CLI Task Manager, allowing users to manage tasks directly from the command line using Artisan commands. It was created as part of a Medium article, which you can read here: [Medium Article](https://medium.com/@hendelRamzy/how-laravel-console-commands-works-todo-list-d6cfc2720174).

## Installation

1. Clone the repository:
   ```sh
   git clone <repository-url>
   cd <project-directory>
   ```
2. Install dependencies:
   ```sh
   composer install
   ```
3. Set up your `.env` file and configure the database.
4. Run migrations:
   ```sh
   php artisan migrate
   ```

## Creating a New Task

To create a new task, use the following command:
```sh
php artisan task:create "Your Task Name" --description="Task description" --completed
```
- `Your Task Name`: The required name of the task.
- `--description`: (Optional) A short description of the task.
- `--completed`: (Optional) If provided, the task will be marked as completed.

## Listing Tasks

You can list tasks in two ways:

### List All Tasks
```sh
php artisan task:list --all
```
This command displays all tasks, regardless of their completion status.

### List Only Incomplete Tasks
```sh
php artisan task:list
```
If the `--all` option is not used, the command only shows tasks that are not completed.

## Completing a Task

To mark a task as completed, use:
```sh
php artisan task:complete <task_id>
```
Replace `<task_id>` with the ID of the task you want to complete.

## Deleting a Task

To delete a task, run:
```sh
php artisan task:delete <task_id>
```
Replace `<task_id>` with the ID of the task you want to remove.

## What to Do Next?
Here are some additional features you can implement:
1. **Task Editing** - Add a command to edit an existing task.
2. **Task Prioritization** - Implement a priority system for tasks.
3. **Task Search** - Allow users to search for tasks by name or description.
4. **Scheduled Tasks** - Use Laravel's scheduling feature to automate task reminders.

---
This project showcases the power of Laravel Artisan commands for managing tasks efficiently. Happy coding! 🚀
