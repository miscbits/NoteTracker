<?php

namespace App\Http\Controllers\Api;

use App\Note;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function index(Student $student)
    {
        return $student->notes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Student $student)
    {
        $note = $student->notes()->create($request->all());

        $request->user()->notes()->save($note);

        return $note;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student, Note $note)
    {
        return $note;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, Note $note)
    {
        return $note->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, Note $note)
    {
        return $note->destroy();
    }
}
