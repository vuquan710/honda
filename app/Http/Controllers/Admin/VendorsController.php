<?php
/**
 * Created by PhpStorm.
 * User: Lenh Ho Xung
 * Date: 3/11/2018
 * Time: 10:15 PM
 */

namespace App\Http\Controllers\Admin;
use App\Models\Setting;
use App\Models\Product;
use App\Models\ProductVendor;
use Illuminate\Http\Request;
use Validator;
use DB;
use Illuminate\Support\Facades\Auth;
class VendorsController extends AdminAppController
{
	 protected $dirView = 'AdminView.Vendors.';
    protected $glue = '|___';

    public function index()
    {
       $listVendors= ProductVendor::getListProductVendors();
       
        return view($this->dirView . 'index')
            ->with('listVendors', $listVendors);
    }

    public function create()
    {
      $listProductVendors= ProductVendor::getListProductVendors();
       
        return view($this->dirView . 'create')
            ->with('listProductVendors', $listProductVendors);
    }

    public function store(Request $request)
    {
       $data = $request->all();
	    $lang=Setting::getLanguage();
		$messValidate = [
                'name.required' => 'Name is not empty!',
                'address.required' => 'Address is not empty!',
				 'phone_number.required' => 'Phone number is not empty!'
            ];
			if($lang=='vi'){
				$messValidate = [
                'name.required' => 'Tên nhà cung cấp không được để trống',
                'address.required' => 'Địa chỉ nhà cung cấp không được để trống',
				 'phone_number.required' => 'Số điện thoại không được để trống'
            ];
			}
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'address' => 'required|max:255',
			 'phone_number' => 'required|max:11',
        ],$messValidate);

        if ($validator->fails()) {
            return redirect()->route('admin.vendors.create')
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
            return redirect()->route('admin.vendors.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.vendors.create')
                ->withErrors([$e->getMessage()])
                ->withInput();
        }
    }
	public function edit($id){
	    $productVendor = ProductVendor::findByIdActive($id);		
        if (empty($productVendor)) {
            abort(404);
        }
		return view($this->dirView . 'edit')
            ->with('productVendor', $productVendor);
   }
   public function update(Request $request, $id)
    {
        $category = ProductVendor::findByIdActive($id);
        if (empty($category)) {
            return abort(404);
        }
        $data = $request->all();
		 $lang=Setting::getLanguage();
		$messValidate = [
                'name.required' => 'Name is not empty!',
                'address.required' => 'Address is not empty!',
				 'phone_number.required' => 'Phone number is not empty!'
            ];
			if($lang=='vi'){
				$messValidate = [
                'name.required' => 'Tên nhà cung cấp không được để trống',
                'address.required' => 'Địa chỉ nhà cung cấp không được để trống',
				 'phone_number.required' => 'Số điện thoại không được để trống'
            ];
			}
        $validator = Validator::make($data, [
             'name' => 'required|max:255',
            'address' => 'required|max:255',
			 'phone_number' => 'required|max:11',
        ],$messValidate);

        if ($validator->fails()) {
            return redirect()->route('admin.vendors.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        
        try {
            DB::beginTransaction();
            $category->fill($data);
            $category->save();
            DB::commit();
            return redirect()->route('admin.vendors.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin.vendors.edit', $id)
                ->withErrors([$e->getMessage()])
                ->withInput();
        };

    }
    public function destroy($id)
    {
      $vendor = ProductVendor::findByIdActive($id);
        if (empty($vendor)) {
            return json_encode(['status' => false, 'message' => 'Not found id!']);
        }
        try {
            DB::beginTransaction();          
            ProductVendor::where('id', $id)->delete();
            Product::where('p_vendor_id', $id)->delete();
            DB::commit();
            return json_encode(['status' => true, 'message' => 'Successfully']);
        } catch (\Exception $e) {
            DB::rollback();
            return json_encode(['status' => false, 'message' => $e->getMessage()]);
        }
    }

}