<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
	protected $service;

	protected $model;

	public function __construct(Service $service) {
		$this->service = $service;
	}

    public function list() {
    	return view('partials.list', ['model' => $this->model]);
    }
}
