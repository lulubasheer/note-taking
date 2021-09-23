<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Handles Note CRUD operations
 */
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        return $this->successResponse($notes);
    }

    /**
     * Store a newly created note
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 400);
        }
        $note = new Note([
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);
        $note->save();
        return $this->successResponse($note, 'Note Created', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return $this->errorResponse('Couldn\'t found data', 404);
        }
        return $this->successResponse($note, 'Note Retrieved', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        if (!$note) {
            return $this->errorResponse('Not found', 404);
        }
        $note->update($request->all());
        return $this->successResponse($note, 'Note Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        if (!$note) {
            return $this->errorResponse('Not found', 404);
        }
        $note->delete();
        return $this->successResponse(null, 'Note Deleted', 200);
    }
}
