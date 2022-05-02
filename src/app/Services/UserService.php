<?php

namespace App\Services;

use App\Models\ValidationUser;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class UserService
{
    private $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        return response()->json($this->repo->getAll(), Response::HTTP_OK);
    }

    public function get($id)
    {
        return response()->json($this->repo->get($id), Response::HTTP_OK);
    }

    public function create(array $data)
    {

        $validator = Validator::make($data, ValidationUser::RULE_USER);

        try {
            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors()], Response::HTTP_BAD_REQUEST);
            }
            return response()->json($this->repo->create($data), Response::HTTP_CREATED);
        } catch (Throwable  $e) {
            abort(404, 'Erro ao inserir os dados');
        }


        return response()->json($this->repo->create($data), Response::HTTP_CREATED);
    }

    public function update($id, array $data)
    {
        $validator = Validator::make($data, ValidationUser::RULE_USER);

        try {
            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors()], Response::HTTP_BAD_REQUEST);
            }
            return response()->json($this->repo->update($id, $data), Response::HTTP_OK);
        } catch (Throwable  $e) {
            abort(404, 'Erro ao atualizar os dados');
        }

    }

    public function delete($id)
    {
        try {
            if ($this->repo->delete($id)) {
                return response()->json(["success" => 'Deletado com sucesso!'], Response::HTTP_OK);
            }
            return response()->json(["error" => 'Não foi possível deletar.'], Response::HTTP_BAD_REQUEST);

        } catch (Throwable  $e) {
            abort(404, "Erro ao deletar  o usuário");
        }
    }
}
