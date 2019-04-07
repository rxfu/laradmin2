<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $service;

    protected $model;

    protected $modname;

    protected $request;

    public function __construct(Service $service, Request $request)
    {
        $this->service = $service;
        $this->request = $request;
    }

    public function index($action = null, $id = null)
    {
        $action = is_null($action) ? 'create' : $action;
        $items = $this->service->getAll();

        $item = null;
        if (!is_null($id)) {
            $item = $this->service->get($id);
        }
        
        return view('pages.list', [
            'modname' => $this->modname,
            'model' => $this->model,
            'action' => $action,
            'id' => $id,
            'items' => $items,
            'item' => $item,
        ]);
    }

    public function store()
    {
        $this->service->store($this->request->all());

        return back()->withSuccess('创建' . $this->modname . '成功');
    }

    public function update($id)
    {
        if ($request->isMethod('put')) {
            $this->service->update($id, $this->request->all());

            return back()->withSuccess('更新' . $this->modname . '成功');
        }
    }

    public function delete()
    {
        $this->service->delete($this->request->input('items'));

        return back()->withSuccess('删除' . $this->modname . '成功');
    }
}
