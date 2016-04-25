<?php

namespace App\Http\Controllers;

use Dingo\Api\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TodoRepositories;

class TodoController extends Controller {

    protected $todos;

    public function __construct(TodoRepositories $todos) {
        $this->todos = $todos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = [
                'message' => 'Show Result Success',
                'status_code' => 200,
                'result' => $this->todos->getAll(),
            ];
        
        return $this->response->array($data)->setStatusCode(200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $data = [
                'message' => 'Insert Record Success',
                'status_code' => 201,                
            ];
            
            if ($this->todos->insert($request)):
                return $this->response->array($data)->setStatusCode(201);
            endif;
        } catch (Exception $exc) {
            $exc->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        try {
            $data = [
                'message' => 'Show Result Success',
                'status_code' => 200,
                'result' => $this->todos->findByID($id),
            ];                        

            return $this->response->array([$data])->setStatusCode(200);
        } catch (Exception $exc) {
            $exc->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            $data = [
                'message' => 'Updated Status Success',
                'status_code' => 201,
            ];

            if ($this->todos->update($request, $id)):
                return $this->response->array($data)->setStatusCode(201);
            endif;
        } catch (Exception $exc) {
            $exc->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $data = [
                'message' => 'Delete Resource '.$id.' Was Success',
                'status_code' => 200,
            ];
            
            if ($this->todos->deleteID($id)):
                return $this->response->array($data)->setStatusCode(200);
            endif;
        } catch (Exception $exc) {
            $exc->getMessage();
        }
    }

}
