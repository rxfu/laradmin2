<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;

    protected $model;

    protected $modname;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index($action = null, $id = null)
    {
        $action = is_null($action) ? 'create' : $action;
        $items = $this->service->getAll();

        $item = null;
        if (!is_null($id)) {
            $item = $this->service->get($id);
        }

        return view('pages.index', [
            'modname' => $this->modname,
            'model' => $this->model,
            'action' => $action,
            'id' => $id,
            'items' => $items,
            'item' => $item,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [];

        foreach (config('components.' . $this->model) as $component) {
            if (isset($component['validation'])) {
                $rules[$component['field']] = $component['validation'];
            }
        }
        
        if (!empty($rules)) {
            $request->validate($rules);
        }

        $this->service->store($request->all());

        return back()->withSuccess('创建' . $this->modname . '成功');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('put')) {
            $rules = [];

            foreach (config('components.' . $this->model) as $component) {
                if (isset($component['validation'])) {
                    $rules[$component['field']] = $component['validation'];
                }
            }
        
            if (!empty($rules)) {
                $request->validate($rules);
            }
            $this->service->update($id, $request->all());

            return back()->withSuccess('更新' . $this->modname . '成功');
        }
    }
}
