<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

Route::get('/', function () {

    /**
     * On recupère les tâches et on envoie à la vue
     */
    $tasks = Task::orderBy("created_at", 'asc')->get();

    return view('tasks.index', [
        'tasks' => $tasks,
    ]);

});

//Lorsque l'on créé une tâche
Route::post('/task', function (Request $request) {

    //Validation du formulaire
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    /**
     * On revient à la page d'accueil en cas d'erreur
     */
    if($validator->fails()){
        return redirect('/')
        ->withErrors($validator)
        ->withInput();
    }

    /**
     * Sinon on créé une nouvelle tâche
     * @var nouvelle tâche
     */

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');

});

//Lorsque l'on supprime une tâche
//Grâce à Eloquent ORM on peut envoyer l'id et transformer directement en une entité

Route::delete('/task/{task}', function (Task $task) {

    $task->delete();

    return redirect('/');
});

/**
 * Ou alors on utilise :
 * $task = Task::find($id);
 *
 * $task = Task::where('id' , $id);
 *
 */
