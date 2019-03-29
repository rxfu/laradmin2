<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;

    protected $model;

    protected $subtitle;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function list($action = null, $id = null)
    {
        $action = is_null($action) ? 'create' : $action;
        $items = $this->service->getAll();

        return view('pages.index', [
            'subtitle' => $this->subtitle,
            'model' => $this->model,
            'action' => $action,
            'items' => $items,
        ]);
    }

    public function edit($id)
    {
        $item = $this->service->get($id);

        return view('pages.edit');
    }
}