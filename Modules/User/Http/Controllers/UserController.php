<?php

namespace Modules\User\Http\Controllers;

use DB;
use App\Helpers\Helpers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\User\Entities\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Entities\Actions\EditUserAction;
use Modules\User\Entities\Actions\ListUserAction;
use Modules\User\Entities\Actions\ShowUserAction;
use Modules\User\Entities\Actions\CreateUserAction;
use Modules\User\Entities\Actions\UpdateUserAction;
use Modules\User\Entities\Actions\ListAllUserAction;
use Modules\User\Entities\Actions\ActivateUserAction;
use Modules\User\Entities\DataTransferObject\UserData;
use Modules\User\Entities\Actions\InactivateUserAction;

class UserController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(ListUserAction $action){

        $data = $action($filter = null);

        return $this->success(
            $data
        );

    }

    public function list(ListAllUserAction $action){

        $data = $action($filter = null);

        return $this->success(
            $data
        );

    }

    public function store(UserRequest $request, CreateUserAction $action){
        try{
            $data = UserData::fromRequest($request);
            $response = $action($data);


            return $this->success(
                $response,
               'Usuário cadastrado com sucesso!'
            );

        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Usuário não encontrado!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }

    public function show(ShowUserAction $action){
        try{
            $id = request()->route()->parameter('id');
            $data = $action($id);
            return $this->success(
                $data
            );


        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Usuário não encontrado!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }



    public function update(UserRequest $request, UpdateUserAction $action){
        try{
           $id = request()->route()->parameter('id');
           $data = UserData::fromRequest($request);

            $response = $action($data, $id);

            return $this->success(
                $response,
               'Usuário atualizado com sucesso!'
            );

        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Usuário não encontrado!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }

    public function inactivate(InactivateUserAction $action){
        try{
            $id = request()->route()->parameter('id');
            $response = $action($id);

            return $this->success(
                $response,
               'Usuário Excluída com sucesso!'
            );
        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Usuário não encontrado!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }



}
