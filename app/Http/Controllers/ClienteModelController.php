<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ClienteModel;
use Illuminate\Http\Request;

class ClienteModelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$nome = '%'.$request->input('nome','').'%';

		$clienteList = ClienteModel::where('nome', 'like', $nome)->orderBy('id', 'asc')->paginate(25);

		return view('clientes.index', compact('clienteList'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('clientes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		//$validator = Validator::make($request->all(), ['sexo' => 'required|max:1', 'nome' => 'required', ]);

		//$rules= [ 'sexo' => 'required|max:1','body' => 'required', ];
		//$msg = [ 'sexo.required' => 'sexo é obrigatório' ,'sexo.max' => 'maximo uma letra' ];
		//$val = Validator::make($request->all(), $rules, $msg);

		//if ($validator->fails()) {
		//	return redirect('post/create')->withErrors($validator)->withInput();
		//}
		// Dados estão válidos – continua processamento

		$cliente = new ClienteModel();

		$cliente->nome = $request->input("nome");
        $cliente->data_nascimento = $request->input("data_nascimento");
        $cliente->telemovel = $request->input("telemovel");
        $cliente->sexo = $request->input("sexo");
        $cliente->NIF = $request->input("NIF");

		$cliente->save();

		return redirect()->route('clientes.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$clienteList = ClienteModel::findOrFail($id);

		return view('clientes.show', compact('clienteList'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clienteList = ClienteModel::findOrFail($id);

		return view('clientes.edit', compact('clienteList'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$cliente = ClienteModel::findOrFail($id);

		$cliente->nome = $request->input("nome");
        $cliente->data_nascimento = $request->input("data_nascimento");
        $cliente->telemovel = $request->input("telemovel");
        $cliente->sexo = $request->input("sexo");
        $cliente->NIF = $request->input("NIF");

		$cliente->save();

		return redirect()->route('clientes.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cliente = ClienteModel::findOrFail($id);
		$cliente->delete();

		return redirect()->route('clientes.index')->with('message', 'Item deleted successfully.');
	}

}
