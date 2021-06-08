<?php

namespace Modules\Historic\Http\Controllers;

use DB;
use App\Helpers\Helpers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Historic\Entities\Historic;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Historic\Http\Requests\HistoricRequest;
use Modules\Historic\Entities\Actions\EditHistoricAction;
use Modules\Historic\Entities\Actions\ListHistoricAction;
use Modules\Historic\Entities\Actions\ShowHistoricAction;
use Modules\Historic\Entities\Actions\CreateHistoricAction;
use Modules\Historic\Entities\Actions\UpdateHistoricAction;
use Modules\Historic\Entities\Actions\ListAllHistoricAction;
use Modules\Historic\Entities\Actions\ActivateHistoricAction;
use Modules\Historic\Entities\DataTransferObject\HistoricData;
use Modules\Historic\Entities\Actions\InactivateHistoricAction;

class HistoricController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(ListHistoricAction $action){

        $data = $action($filter = null);
        return $this->success(
            $data
        );

    }

    public function list(ListAllHistoricAction $action){

        $data = $action();

        return $this->success(
            $data
        );

    }

    public function store(HistoricRequest $request, CreateHistoricAction $action){
        try{
            $data = HistoricData::fromRequest($request);
            $response = $action($data);

            if(is_object($response)){
                return $this->success(
                    $response,
                   'Histórico Cadastrado com sucesso!'
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

    public function show(ShowHistoricAction $action){
        try{
            $id = request()->route()->parameter('id');
            $data = $action($id);
            return $this->success(
                $data
            );


        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Histórico não encontrado!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }



    public function update(HistoricRequest $request, UpdateHistoricAction $action){
        try{
           $id = request()->route()->parameter('id');
           $data = HistoricData::fromRequest($request);

            $response = $action($data, $id);

            return $this->success(
                $response,
               'Histórico atualizado com sucesso!'
            );

        }catch (ModelNotFoundException $e) {
            dd('asas');
            return $this->error(
                'Histórico não encontrado!',
                404
            );
        }catch(Exception $e){
            return $this->error(
                'Oops', 'Aconteceu um erro inesperado, contate o suporte!',
                404
            );
        }
    }

    public function inactivate(InactivateHistoricAction $action){
        try{
            $id = request()->route()->parameter('id');
            $response = $action($id);

            return $this->success(
                $response,
               'Histórico Excluído com sucesso!'
            );
        }catch (ModelNotFoundException $e) {
            return $this->error(
                'Histórico não encontrada!',
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
