<?php
/**
 * Created by PhpStorm.
 * User: LuanNX
 * Date: 03/17/2018
 * Time: 3:33 PM
 */

namespace App\Http\Controllers\Admin;


use App\Models\ProductVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class ProductVendorsController extends AdminAppController
{
    protected $dirView = 'AdminView.ProductVendors.';
    protected $glue = '|___';

    public function index()
    {
        $listProductVendors= ProductVendor::getListProductVendors();
       
        return view($this->dirView . 'index')
            ->with('listProductVendors', $listProductVendors);
    }

    public function create()
    {
          $listProductVendors= ProductVendor::getListProductVendors();
       
        return view($this->dirView . 'create')
            ->with('listProductVendors', $listProductVendors);
    }
   public function edit($id){
	    $productVendor = ProductVendor::findOrFail($id);
		return view($this->dirView . 'edit')
            ->with('productVendor', $productVendor);
   }
    public function update($id,Request $request)
    {
        dd($request->all());
	    
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.productvendors.create')
                ->withErrors($validator)
                ->withInput();
        }
                  
            $data['created_by'] = Auth::guard('admin')->user()->id;
            $data['updated_by'] = Auth::guard('admin')->user()->id;
        

        //Save data
        try {
            DB::beginTransaction();
            ProductVendor::create($data);
            DB::commit();
            return redirect()->route('admin.productvendors.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.productvendors.create')
                ->withErrors([$e->getMessage()])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        dd($id);
    }

    
}