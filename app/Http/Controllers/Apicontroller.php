<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Models\Student; 
use Illuminate\Http\Request;


class ApiController extends Controller
{

//show all students    
public function index(Request $request)
{
    //show all student
    $students = Student::all();

    return response() -> json([
        'results' => $students
    ],200);
    //json response
}

//show selected student
    public function find($id)
    {
        try {
            //find the student
            $students = Student::findOrFail($id);
            return response()->json([
                'student' => $students
            ], 200);
            //json response
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
    }



//add new students
//public function create(Request $request)
//{
//  $students = new Student();

//    $students -> name = $request->input('name');
//    $students -> email = $request->input('email');
//    $students -> password = $request->input('password'); 

//    $students -> save();

//    return response() -> json($students);

//}

public function store(CreateStudentRequest $request)
{
    try {
        //add new student
        $students = new Student();

        $students->name = $request->input('name');
        $students->email = $request->input('email');
        $students->password = $request->input('password');

        $students->save();

        return response()->json([
            'message' => 'Student created successfully'
        ], 200);
        //json response
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error storing student'
        ], 500);
    }
}

//update student
public function update(CreateStudentRequest $request, $id)
{
    try {
        $student = Student::find($id);
        //check the user is available or not in the db
        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
        //update the student       
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');

        $student->save();

        return response()->json([
            'message' => 'Student updated successfully'
        ], 200);
        //json response
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error updating student',
            'error' => $e->getMessage()
        ], 500);
    }
}


//delete student
public function destroy($id)
{
    try {
        $student = Student::find($id);
        //check the user is available or not in the db
        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
        //delete
        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ], 200);
        //json response
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Error deleting student',
            'error' => $e->getMessage()
        ], 500);
    }
}

}
