<?php

namespace CodeFin\Http\Controllers\Api;

use CodeFin\Http\Controllers\Controller;
use CodeFin\Http\Controllers\Response;
use CodeFin\Http\Requests;
use CodeFin\Http\Requests\BillPayRequest;
use CodeFin\Repositories\Interfaces\BillPayRepository;


class BillPaysController extends Controller
{

    /**
     * @var BillPayRepository
     */
    protected $repository;


    public function __construct(BillPayRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BillPayRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BillPayRequest $request)
    {
        $bankAccount = $this->repository->create($request->all());
        return response()->json($bankAccount, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bankAccount = $this->repository->find($id);
        return response()->json($bankAccount, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BillPayRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(BillPayRequest $request, $id)
    {
        $bankAccount = $this->repository->update($request->all(), $id);
        return response()->json($bankAccount, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json([], 204);
    }
}
