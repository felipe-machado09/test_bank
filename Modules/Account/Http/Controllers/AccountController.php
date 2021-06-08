<?php

namespace Modules\Account\Http\Controllers;

use DB;
use App\Helpers\Helpers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Account\Entities\Account;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Account\Http\Requests\AccountRequest;
use Modules\Account\Entities\Actions\EditAccountAction;
use Modules\Account\Entities\Actions\ListAccountAction;
use Modules\Account\Entities\Actions\ShowAccountAction;
use Modules\Account\Entities\Actions\CreateAccountAction;
use Modules\Account\Entities\Actions\UpdateAccountAction;
use Modules\Account\Entities\Actions\ListAllAccountAction;
use Modules\Account\Entities\Actions\ActivateAccountAction;
use Modules\Account\Entities\DataTransferObject\AccountData;
use Modules\Account\Entities\Actions\InactivateAccountAction;

class AccountController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(ListAccountAction $action){

        $data = $action($filter = null);

        return $this->success(
            $data
        );

    }

    public function list(ListAllAccountAction $action){

        $data = $action();

        return $this->success(
            $data
        );

    }

    public function store(AccountRequest $request, CreateAccountAction $action){
        try{
            $data = AccountData::fromRequest($request);
            $response = $action($data);

            if(is_object($response)){
                return $this->success(
                    $response,
                   'Conta concluida com sucesso!'
                );
            }else{
                return $this->error(
                    $response,
                    404
                );
            }





        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Usuário Pagador não encontrado!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }

    public function show(ShowAccountAction $action){
        try{
            $id = request()->route()->parameter('id');
            $data = $action($id);
            return $this->success(
                $data
            );
        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Conta não encontrada!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }



    public function update(AccountRequest $request, UpdateAccountAction $action){
        try{
           $id = request()->route()->parameter('id');
           $data = AccountData::fromRequest($request);

            $response = $action($data, $id);

            return $this->success(
                $response,
               'Conta atualizada com sucesso!'
            );

        }catch (ModelNotFoundException $e) {
             return $this->error(
                'Conta não encontrada!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }

    public function inactivate(InactivateAccountAction $action){
        try{
            $id = request()->route()->parameter('id');
            $response = $action($id);

            return $this->success(
                $response,
               'Conta Excluída com sucesso!'
            );
        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Conta não encontrada!',
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
