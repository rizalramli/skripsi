<?php

namespace App\Http\Controllers;

use App\DataTables\CriteriasDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCriteriasRequest;
use App\Http\Requests\UpdateCriteriasRequest;
use App\Repositories\CriteriasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Datatables;

class CriteriasController extends AppBaseController
{
    /** @var  CriteriasRepository */
    private $criteriasRepository;

    public function __construct(CriteriasRepository $criteriasRepo)
    {
        $this->criteriasRepository = $criteriasRepo;
    }

    /**
     * Display a listing of the Criterias.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of((new CriteriasDataTable())->get())->make(true);
        }
    
        return view('criterias.index');
    }

    /**
     * Show the form for creating a new Criterias.
     *
     * @return Response
     */
    public function create()
    {
        return view('criterias.create');
    }

    /**
     * Store a newly created Criterias in storage.
     *
     * @param CreateCriteriasRequest $request
     *
     * @return Response
     */
    public function store(CreateCriteriasRequest $request)
    {
        $input = $request->all();

        $criterias = $this->criteriasRepository->create($input);

        Flash::success('Criterias saved successfully.');

        return redirect(route('criterias.index'));
    }

    /**
     * Display the specified Criterias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $criterias = $this->criteriasRepository->find($id);

        if (empty($criterias)) {
            Flash::error('Criterias not found');

            return redirect(route('criterias.index'));
        }

        return view('criterias.show')->with('criterias', $criterias);
    }

    /**
     * Show the form for editing the specified Criterias.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $criterias = $this->criteriasRepository->find($id);

        if (empty($criterias)) {
            Flash::error('Criterias not found');

            return redirect(route('criterias.index'));
        }

        return view('criterias.edit')->with('criterias', $criterias);
    }

    /**
     * Update the specified Criterias in storage.
     *
     * @param  int              $id
     * @param UpdateCriteriasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCriteriasRequest $request)
    {
        $criterias = $this->criteriasRepository->find($id);

        if (empty($criterias)) {
            Flash::error('Criterias not found');

            return redirect(route('criterias.index'));
        }

        $criterias = $this->criteriasRepository->update($request->all(), $id);

        Flash::success('Criterias updated successfully.');

        return redirect(route('criterias.index'));
    }

    /**
     * Remove the specified Criterias from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $criterias = $this->criteriasRepository->find($id);

        $criterias->delete();

        return $this->sendSuccess('Criterias deleted successfully.');
    }
}
