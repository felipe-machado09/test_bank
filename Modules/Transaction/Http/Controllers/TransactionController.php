<?php

namespace Modules\Transaction\Http\Controllers;

use DB;
use App\Helpers\Helpers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Transaction\Entities\Transaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Transaction\Http\Requests\TransactionRequest;
use Modules\Transaction\Entities\Actions\EditTransactionAction;
use Modules\Transaction\Entities\Actions\ListTransactionAction;
use Modules\Transaction\Entities\Actions\ShowTransactionAction;
use Modules\Transaction\Entities\Actions\CreateTransactionAction;
use Modules\Transaction\Entities\Actions\UpdateTransactionAction;
use Modules\Transaction\Entities\Actions\ListAllTransactionAction;
use Modules\Transaction\Entities\Actions\ActivateTransactionAction;
use Modules\Transaction\Entities\DataTransferObject\TransactionData;
use Modules\Transaction\Entities\Actions\InactivateTransactionAction;

class TransactionController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(ListTransactionAction $action){

        $data = $action($filter = null);
        return $this->success(
            $data
        );

    }

    public function list(ListAllTransactionAction $action){

        $data = $action();

        return $this->success(
            $data
        );

    }

    public function store(TransactionRequest $request, CreateTransactionAction $action){
        try{
            $data = TransactionData::fromRequest($request);
            $response = $action($data);

            if(is_object($response)){
                return $this->success(
                    $response,
                   'Transação concluida com sucesso!'
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

    public function show(ShowTransactionAction $action){
        try{
            $id = request()->route()->parameter('id');
            $data = $action($id);
            return $this->success(
                $data
            );


        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Transação não encontrada!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }



    public function update(TransactionRequest $request, UpdateTransactionAction $action){
        try{
           $id = request()->route()->parameter('id');
           $data = TransactionData::fromRequest($request);

            $response = $action($data, $id);

            return $this->success(
                $response,
               'Transação atualizada com sucesso!'
            );

        }catch (ModelNotFoundException $e) {
            dd('asas');
            return $this->error(
                'Transação não encontrada!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }

    public function inactivate(InactivateTransactionAction $action){
        try{
            $id = request()->route()->parameter('id');
            $response = $action($id);

            return $this->success(
                $response,
               'Transação Excluída com sucesso!'
            );
        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Transação não encontrada!',
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
