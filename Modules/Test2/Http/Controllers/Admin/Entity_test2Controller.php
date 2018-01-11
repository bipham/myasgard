<?php

namespace Modules\Test2\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Test2\Entities\Entity_test2;
use Modules\Test2\Http\Requests\CreateEntity_test2Request;
use Modules\Test2\Http\Requests\UpdateEntity_test2Request;
use Modules\Test2\Repositories\Entity_test2Repository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class Entity_test2Controller extends AdminBaseController
{
    /**
     * @var Entity_test2Repository
     */
    private $entity_test2;

    public function __construct(Entity_test2Repository $entity_test2)
    {
        parent::__construct();

        $this->entity_test2 = $entity_test2;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$entity_test2s = $this->entity_test2->all();

        return view('test2::admin.entity_test2s.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('test2::admin.entity_test2s.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateEntity_test2Request $request
     * @return Response
     */
    public function store(CreateEntity_test2Request $request)
    {
        $this->entity_test2->create($request->all());

        return redirect()->route('admin.test2.entity_test2.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('test2::entity_test2s.title.entity_test2s')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Entity_test2 $entity_test2
     * @return Response
     */
    public function edit(Entity_test2 $entity_test2)
    {
        return view('test2::admin.entity_test2s.edit', compact('entity_test2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Entity_test2 $entity_test2
     * @param  UpdateEntity_test2Request $request
     * @return Response
     */
    public function update(Entity_test2 $entity_test2, UpdateEntity_test2Request $request)
    {
        $this->entity_test2->update($entity_test2, $request->all());

        return redirect()->route('admin.test2.entity_test2.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('test2::entity_test2s.title.entity_test2s')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Entity_test2 $entity_test2
     * @return Response
     */
    public function destroy(Entity_test2 $entity_test2)
    {
        $this->entity_test2->destroy($entity_test2);

        return redirect()->route('admin.test2.entity_test2.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('test2::entity_test2s.title.entity_test2s')]));
    }
}
