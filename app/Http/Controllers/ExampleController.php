<?php

namespace App\Http\Controllers;

class ExampleController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function index() {
        return $this->response->array(['message' => 'success'])->setStatusCode(200);
    }

    public function show() {
        $books = [
            [
                'id' => '1',
                'title' => 'Hogfather',
                'yr' => '1998',
                'author_name' => 'Philip K Dick',
                'author_email' => 'philip@example.org',
            ],
            [
                'id' => '2',
                'title' => 'Game Of Kill Everyone',
                'yr' => '2014',
                'author_name' => 'George R. R. Satan',
                'author_email' => 'george@example.org',
            ]
        ];
//        return $this->response->array(['success'])->withHeader('Dtype', 'todo');
        return $this->response->array($books)->setStatusCode(200);
//        return $this->response->errorForbidden();        
    }

}
