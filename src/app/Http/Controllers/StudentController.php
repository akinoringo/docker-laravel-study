<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('lessons')->get();
        return response()->json([
            'students' => $students->toArray()
        ]);
    }

    public function store(Request $request)
    {
        $student = Student::query()->create([
            'name' => $request->name,
        ]);

        $lesson = Lesson::query()->findOrFail($request->lesson_id);
        $student->lessons()->attach($lesson->id);

        return response()->json([
            'student' => $student->toArray()
        ]);
    }
}
