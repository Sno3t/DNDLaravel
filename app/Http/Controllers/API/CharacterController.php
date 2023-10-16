<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Character;
use Validator;
use App\Http\Resources\Character as CharacterResource;


class CharacterController extends BaseController

{

    /**
     * Display a list of all characters.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $characters = Character::all();
        return response()->json(['data' => CharacterResource::collection($characters)]);
    }


    /**
     * Return one character.
     *
     * @param Character $character
     * @return JsonResponse
     */
    public function show(Character $character): JsonResponse
    {
        return response()->json(['data' => new CharacterResource($character)]);
    }

    /**
     * Store new character in database.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'race' => 'required',
            'age' => 'required',
            'backstory' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation Error', 'message' => $validator->errors()], 400);
        }

        $character = Character::create($input);
        return response()->json(['message' => 'Character created successfully', 'data' => new CharacterResource($character)], 201);
    }

    /**
     * Update a character.
     *
     * @param Request $request
     * @param Character $character
     * @return JsonResponse
     */
    public function update(Request $request, Character $character): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'race' => 'required',
            'age' => 'required',
            'backstory' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation Error', 'message' => $validator->errors()], 400);
        }

        $character->update($input);
        return response()->json(['message' => 'Character updated successfully', 'data' => new CharacterResource($character)], 200);
    }

    /**
     * Delete a character.
     *
     * @param Character $character
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Character $character): JsonResponse
    {
        $character->delete();
        return response()->json(['message' => 'Character deleted successfully'], 200);
    }
}
