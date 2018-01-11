<?php

namespace Modules\Test2\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Test2\Entities\Entity_test1;
use Modules\Test2\Http\Requests\CreateEntity_test1Request;
use Modules\Test2\Http\Requests\UpdateEntity_test1Request;
use Modules\Test2\Repositories\Entity_test1Repository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class Entity_test1Controller extends AdminBaseController
{
    /**
     * @var Entity_test1Repository
     */
    private $entity_test1;

    public function __construct(Entity_test1Repository $entity_test1)
    {
        parent::__construct();

        $this->entity_test1 = $entity_test1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$entity_test1s = $this->entity_test1->all();

        return view('test2::admin.entity_test1s.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('test2::admin.entity_test1s.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateEntity_test1Request $request
     * @return Response
     */
    public function store(CreateEntity_test1Request $request)
    {
        $this->entity_test1->create($request->all());

        return redirect()->route('admin.test2.entity_test1.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('test2::entity_test1s.title.entity_test1s')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Entity_test1 $entity_test1
     * @return Response
     */
    public function edit(Entity_test1 $entity_test1)
    {
        return view('test2::admin.entity_test1s.edit', compact('entity_test1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Entity_test1 $entity_test1
     * @param  UpdateEntity_test1Request $request
     * @return Response
     */
    public function update(Entity_test1 $entity_test1, UpdateEntity_test1Request $request)
    {
        $this->entity_test1->update($entity_test1, $request->all());

        return redirect()->route('admin.test2.entity_test1.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('test2::entity_test1s.title.entity_test1s')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Entity_test1 $entity_test1
     * @return Response
     */
    public function destroy(Entity_test1 $entity_test1)
    {
        $this->entity_test1->destroy($entity_test1);

        return redirect()->route('admin.test2.entity_test1.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('test2::entity_test1s.title.entity_test1s')]));
    }
}
