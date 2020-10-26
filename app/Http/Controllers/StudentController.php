<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // get all students
    public function getAllStudents()
    {
        return Student::all();
    }

    //get student by id
    public function getStudentByID($student_id)
    {
        return Student::where('id', $student_id)->first();
    }

    //create new student
    public function createNewStudent(Request $request)
    {
        $error=[];
        $uni_id=$request->input("uni_id");
        $Name=$request->input("NameFull");
        $identity=$request->input("Identity");
        $nationality=$request->input("Nationality");
        $bday=$request->input("Birthday");
        $nameWith=$request->input("NameWithInitials");
        $addr=$request->input("Address");
        $email=$request->input("email");
        $country=$request->input("country");
        $phoneNo=$request->input("phoneNo");
        $active=$request->input("Active");
        $registered=$request->input("Registered");

       

        $result= Student::create([
            'uni_id' => $uni_id,
            'NameFull' => $Name,
            'Identity' => $identity,
            'Nationality' => $nationality,
            "Birthday"=>$bday,
            "NameWithInitials"=>$nameWith,
            "Address"=>$addr,
            "email"=>$email,
            "country"=>$country,
            "phoneNo"=>$phoneNo,
            "Active"=>$active,
            "Registered"=>$registered
        ]);

        if($result)
            return response()->json([
                'success' => true,
                'message' => 'Success!'
            ]);
        else
            return response()->json([
                'success' => false
            ]);
    }

    //update Existing student
    public function updateExsistingStudent(Request $request)
    {
        $student_id=$request->input("id");
        $uni_id=$request->input("uni_id");
        $Name=$request->input("NameFull");
        $identity=$request->input("Identity");
        $nationality=$request->input("Nationality");
        $bday=$request->input("Birthday");
        $nameWith=$request->input("NameWithInitials");
        $addr=$request->input("Address");
        $email=$request->input("email");
        $country=$request->input("country");
        $phoneNo=$request->input("phoneNo");
        $active=$request->input("Active");
        $registered=$request->input("Registered");

        $is_update=Student::where('id',$student_id)->update([
            'uni_id' => $uni_id,
            'NameFull' => $Name,
            'Identity' => $identity,
            'Nationality' => $nationality,
            "Birthday"=>$bday,
            "NameWithInitials"=>$nameWith,
            "Address"=>$addr,
            "email"=>$email,
            "country"=>$country,
            "phoneNo"=>$phoneNo,
            "Active"=>$active,
            "Registered"=>$registered
        ]);

        if($result)
            return response()->json([
                'success' => true,
                'message' => 'Success!'
            ]);
        else
            return response()->json([
                'success' => false
            ]);
    }

    // remove the student
    public function deleteStudentByID($student_id)
    {
        return Student::where('id', $student_id)->delete();
    }
}
