<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Category;
use Illuminate\Http\Request;
use VG;
use Input;
use Session;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Category::getIndexView();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Category::getCreateView();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
		$data = array_diff_key($data, array_flip(['id','_method','deleted_at','deleted_by','updated_at','created_at']));
		$data["created_by"] = Session::get('user_id');
		$status = Category::create($data);
		if($status === NULL) {
			return VG::result(false, 'failed!');
		}
		return VG::result(true, ['action' => 'create', 'id' => $status->id]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return Category::getCreateView($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::all();
		$data = array_diff_key($data, array_flip(['id','_method','deleted_at','deleted_by','updated_at','created_at']));
		$data["updated_by"] = Session::get('user_id');
		$status = Category::whereId($id)->update($data);
		if($status == 1) {
			return VG::result(true, ['action' => 'update', 'id' => $id]);
		}
		return VG::result(false, 'failed!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = Category::find($id);
		if (is_null($data)) {
			Category::withTrashed()->whereId($id)->first()->restore();
			return VG::result(true, ['action' => 'restore', 'id' => $id]);

		}else{
			$data->delete();
			return VG::result(true, ['action' => 'delete', 'id' => $id]);
		}
	}

}
