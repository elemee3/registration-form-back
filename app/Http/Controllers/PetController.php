<?php namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\{Request, Response};

class PetController extends Controller
{
  /**
     * Store a new pet
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = new Pet();
        $response = [];

        // Once a database is connected, we can easily test it out by toggling the ENV variable
        if (env('IS_DB_CONNECTED'))
        {
          $isValid = $pet->create([
              'name' => $request->name,
              'type' => $request->type,
              'breed' => $request->breed,
              'breedType' => $request->breedType,
              'mixedBreedDetails' => $request->mixedBreedDetails ?? null,
              'gender' => $request->gender
          ]);
        } else {
          // Instead of saving to db, validate all necessary fields are present
          $isValid = $request->has(['name', 'type', 'breed', 'breedType', 'gender']);
        }

        // Consistent responses will be useful when switching to db, test resutls should remain unchanged
        $statusCode = $isValid ? 201 : 400;
        $message = $isValid ? 'Created' : 'Bad Request';

        return response()->json([
          'message' => $message
        ], 201);
    }
}
