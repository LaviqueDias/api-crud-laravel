<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{   

    /**
     * Retorna uma lista paginada de usuários.
     * 
     * Este método recupera uma lista paginada de usuários de banco de dados
     * e a retorna como uma resposta JSON
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {   
        //Recupera os usuários do BD, ordenados pelo id em ordem decrescente, paginados   
        $users = User::orderBy('id', 'DESC')->paginate(2);
        
        //Retorno dos usuários recuperados como uma resposta JSON
        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }

    /**
     * Exibe os detalhes de um usuário específico.
     * 
     * Este método retorna os detalhes específicos de um usuário em formato JSON.
     *
     * @param \App\Models\User $user O objeto do usuário a ser exibido
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user) : JsonResponse
    {
        //Retorno do usuário indicado como uma resposta JSON
        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);
    }

    /**
     * Cria novo usuário com os dados fornecodos na requisiçaõ
     *
     * @param UserRequest $request O objeto da requisição contendo os dados do usuário a ser criado.
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        //Iniciar a transação
        DB::beginTransaction();

        try{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Retorna uma mensagem de sucesso com status 200
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário cadastrado com sucesso!',
            ], 200);

        } catch (Exception $e){

            // Operação não é concluída com êxito
            DB::rollBack();

            // Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não cadsatrado!",
            ], 400);

        }

    }

    /**
     * Atualizar os dados de um usuário existente com base nos dados fornecidos na requisição.
     * 
     * @param UserRequest $request O objeto da requisição contendo os dados do usuário a ser atualizado.
     * @param User $user O usuário a ser atualizado.
     * 
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user) : JsonResponse
    {
        //Iniciar a transação
        DB::beginTransaction();

        try{

            // Editar o registro no banco de dados
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Operação é concluída com êxito
            DB::commit();
            
            // Retorna os dados do usuário editado e uma mensagem de sucessso com satus 200
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário editado com sucesso!',
            ], 200);

        } catch(Exception $e){

            // Operação não é concluída com êxito
            DB::rollBack();

            // Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não editado!",
            ], 400);
        }

    }

    /**
     * Excluir usuário no banco de dados.
     *
     * @param User $user O usuário a ser excluído
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        
        try{

            // Apagar o registro no banco de dados
            $user->delete();

             // Retorna os dados do usuário apagado e uma mensagem de sucessso com satus 200
             return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'Usuário apagado com sucesso!',
            ], 200);

        } catch(Exception $e){

            // Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não apagado!",
            ], 400);

        }
    }


}
