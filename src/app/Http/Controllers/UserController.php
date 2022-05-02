<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\UserService;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try {
            return $this->service->getAll();
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Get(
     *     path="/user",
     *     tags={"user"},
     *     @OA\Response(
     *          response="200",
     *          description="An example resource",
     *          content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                         "id": 1,
     *                          "nome_completo": "Dr. Bret Frami PhD",
     *                          "cpf": "72685169542",
     *                          "cnpj": "86922855074731",
     *                          "email": "bret02@example.org",
     *                          "senha": "F^B:Qg+>pQ-^7#!dcmS_",
     *                          "carteira": "1.69",
     *                          "created_at": "2021-02-13T17:36:24.000000Z",
     *                          "updated_at": "2021-02-13T17:36:24.000000Z"
     *                     }
     *                 )
     *             )
     *         }
     *      )
     * )
     */
    public function show($id)
    {
        try {
            return $this->service->get($id);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Post(
     *     path="/user",
     *     tags={"user"},
     *     summary="Create user",
     *     description="This can only be done by the logged in user.",
     *     operationId="createUser",
     *     @OA\Response(
     *         response="200",
     *         description="successful operation",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                         "nome_completo": "Anderson Oliveira",
     *                          "email": "andoliversant@hotmail.com",
     *                          "cpf": "05696862539",
     *                          "senha": "password",
     *                          "carteira": 50,
     *                          "updated_at": "2022-05-01:51:37.000000Z",
     *                          "created_at": "2022-05-01T15:51:37.000000Z",
     *                          "id": 6
     *                     }
     *                 )
     *             )
     *          }
     *     ),
     *     @OA\RequestBody(
     *         description="Create user object",
     *         required=true,
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                             "nome_completo": "Anderson Oliveira",
     *                              "email": "andoliversant@hotmail.com",
     *                              "cpf": "05696862539",
     *                              "senha": "password",
     *                              "carteira": "50.00"
     *                     }
     *                 )
     *             )
     *          }
     *     )
     * )
     */
    public function store(Request $request)
    {
        try {
            return $this->service->create($request->all());
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Put(
     *     path="/user/{id}",
     *     tags={"user"},
     *     summary="Updated user",
     *     operationId="updateUser",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User ID",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid user supplied"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     ),
     *     @OA\RequestBody(
     *         description="Updated user object",
     *         required=true,
     *     )
     * )
     */
    public function update($id, Request $request)
    {
        try {
            return $this->service->update($id, $request->all());
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @OA\Delete(
     *     path="/user/{id}",
     *     tags={"user"},
     *     summary="Delete user",
     *     description="This can only be done by the logged in user.",
     *     operationId="deleteUser",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="User ID",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid username supplied",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found",
     *     )
     * )
     */
    public function delete($id)
    {
        try {
            return $this->service->delete($id);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
