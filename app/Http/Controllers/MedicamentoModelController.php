<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\MedicamentoModel;
use Illuminate\Http\Request;

class MedicamentoModelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$nome = '%'.$request->input('nome','').'%';

		$medicamentosList = MedicamentoModel::where('nome', 'like', $nome)->orderBy('id', 'asc')->paginate(25);

		return view('medicamentos.index', compact('medicamentosList'));
	}
}