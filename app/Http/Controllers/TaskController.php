<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function page(){
        return view("home");
    } 


    public function getTask(){
        return Task::orderBy('id', 'DESC')->get();
    }

    public function createTask(Request $request){

        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'description' => 'nullable',
                'completed' => 'boolean',
            ]);
    
            $taskId = $request->input("task_id");
            $title = $request->input("title");
            $description = $request->input("description");

            if($taskId){


                $taskUpdate = Task::where("id","=",$taskId)->update(["title" => $title,"description" => $description]);
                if($taskUpdate){
                    return response()->json([
                        "status" => "success",
                        "message" => "Task Update Successful",
                ]);
                }else{
                    return response()->json([
                        "status" => "failed",
                        "message" => "Task Update Failed",
                    ]);
                }
                

            }else{
                $taskCreate = Task::create(["title" => $title,"description" => $description]);
                if($taskCreate){
                    return response()->json([
                        "status" => "success",
                        "message" => "Task  Create Successful",
                    ]);
                }else{
                    return response()->json([
                        "status" => "failed",
                        "message" => "Task Create Failed",
                    ]);
                }
            }


        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

      
    }

    public function deleteTask(Request $request){
    
        $taskId = $request->input("taskId");
        $taskDelete = Task::where("id","=",$taskId)->delete();

        if($taskDelete){
            return response()->json([
                "status" => "success",
                "message" => "Task Delete Successful",
            ]);
        }else{
            return response()->json([
                "status" => "failed",
                "message" => "Task Delete Failed"
            ]);
        }
    }

    public function taskyByID(Request $request,$id){
        return  Task::where("id","=",$id)->first();
    }
    
}
