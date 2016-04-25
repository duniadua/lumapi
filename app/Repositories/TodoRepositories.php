<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Todo;
/**
 * Description of TodoRepositories
 *
 * @author sahid
 * @link www.terastekno.net
 * 
 */
class TodoRepositories {

    public function __construct(Todo $todo) {
        $this->todo = $todo;
    }

    public function insert($request) {
        $svcReturn = FALSE;

        $this->todo->title = $request->title;
        $this->todo->description = $request->description;

        if ($this->todo->save()):
            $svcReturn = TRUE;
        else:
            throw new Exception("Couldnt Save The Record");
        endif;

        return $svcReturn;
    }

    public function update($request, $id) {
        $svcReturn = FALSE;
                       
        $this->todo = Todo::find($id);
        $this->todo->title = $request->title;
        $this->todo->description = $request->description;
        
        if ($this->todo->save()):
            $svcReturn = TRUE;
        else:
            throw new Exception("Update Record Fail");
        endif;

        return $svcReturn;
    }

    public function getAll() {
        return Todo::all();
    }

    public function deleteID($id) {
        $result = FALSE;

        if (isset($id)):
            $result = $this->findByID($id);
            if ($result):
                Todo::destroy($id);
            else:
                throw new \Exception("Record " . $id . " Not Found, Cannot Delete");
            endif;
        endif;

        return $result;
    }

    public function findByID($id) {
        $result = FALSE;

        if (isset($id)):
            $result = Todo::find($id);
            if (!$result):
                throw new \Exception("Record " . $id . " Not Found");
            endif;
        endif;

        return $result;
    }

}
