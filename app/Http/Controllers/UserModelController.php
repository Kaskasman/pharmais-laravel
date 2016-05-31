<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class UserModelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userList = User::orderBy('id', 'asc')->paginate(10);

		return view('users.index', compact('userList'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param boolean $active
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id, $active)
	{
		$utlilizador = Users::findOrFail($id);

		if($active=="1")
		{
			$utlilizador->active = $request->input("0");
		}
		else
		{
			$utlilizador->active = $request->input("1");
		}

		$utlilizador->save();

		return redirect()->route('users.index')->with('message', 'Item updated successfully.');
	}
}