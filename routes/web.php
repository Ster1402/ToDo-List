<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

Route::get('/', function () {
    return view('tasks/index');
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
     * Sinon on poursuit
     */



});

//Lorsque l'on supprime une tâche
Route::delete('/task/{id}', function ($id) {

});
