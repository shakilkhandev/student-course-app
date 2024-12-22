<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Student ;
use App\Models\Role ;
use App\Models\Course ;

class StudentController extends Controller
{
    public function getAllStudents(){

          

               //find all students with their courses 

        $student = Student::with('course')->get();
        return response()->json($student);
        
        // if(!$student){
           
        //     return response()->json(['message' => 'No student found'], 404);
        // }
        // return response()->json($student, 200);

    

        // // get users by role id  ex:teacher = 2 , student = 1 ;

        // $user = User::get()->where('role_id','=','2');
        // return response()->json($user);


        //        // All roles along with users 

        // $role = Role::with('users')->get();
        // return response()->json($role);

        // $all_students = Course::with('student')->where('id','=','2')->get();



        

        // $students_with_course_2  = Student::with('course')->whereHas('course', function ($query) {
        // $query->where('course_id', 2);
        // })->limit(3)->get();

        // return response()->json($students_with_course_2);







    }
}
