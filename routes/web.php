<?php
use App\Task;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::group(['middlewarw' => 'web'], function (){

//     /**
//      * 顯示所有任務
//      */
//     Route::get('/', function () {
//         $tasks = Task::orderBy('created_at', 'asc')->get();

//         return view('tasks', [
//             'tasks' => $tasks
//         ]);
//     });

//     /**
//      * 增加新的任務
//      */
//     Route::post('/task', function (Request $request){
//         $validator = Validator::make($request->all(), [
//             'name' => 'request|max:255',
//         ]);

//         if ($validator->fails()) {
//             return redirect('/')
//                 ->withInput()
//                 ->withErrors($validator);
//         }
//         $task = new Task;
//         $task->name = $request->name;
//         $task->save();
//         return redirect('/');
//     });

//     /**
//      * 刪除任務
//      */
//     Route::delete('/task{task}', function (Task $task){
//         $task->delete();

//         return redirect('/');
//     });
// });

Route::group(['middleware' => ['web']], function () {
    
    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');
    Route::delete('/task/{task}', 'TaskController@destroy');
    Route::auth();
});

