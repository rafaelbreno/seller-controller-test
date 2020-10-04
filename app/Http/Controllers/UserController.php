<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->view('user.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request)
    {
        return $this->returnJson(
            User::create($request->validated())->toArray()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param string $user
     * @return Response
     */
    public function show(string $user)
    {
        return response()->view('user.show', [
            'data' => User::whereDetailed($user)
        ]);
    }
}
