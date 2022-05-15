<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Orders\OrderModel;

use Validator;

class OrdersController extends Controller
{
    protected $rules = [
      'ID' => 'required|integer|unique:App\Models\Orders\OrderModel,ID|min:1',
      'FIO' => 'required|string|min:10|max:255',
      'SUM' => 'required|digits_between:0.00,1000000.00',
      'CREATED' => 'date',
      'ADDRESS' => 'required|string|min:12|max:255'
    ];

    public function ordersAll(){
      return response()->json(OrderModel::get(), 200);
    }

    public function orderById($id){
      $order = OrderModel::find($id);
      if(is_null($order)){
        return response()->json(['error' => 'Order doesn\'t exist!'], 404);
      }
      return response()->json($order, 200);
    }

    public function orderSave(Request $request){
      $this->setCurrentDate($request);
      $validator = Validator::make($request->all(), $this->rules);
      if($validator->fails()){
        return response()->json($validator->errors(), 400);
      }
      $new_order = OrderModel::create($request->all());
      return response()->json($new_order, 201);
    }

    public function orderEdit(Request $request, $id){
      $order = OrderModel::whereId($id);
      if(is_null($order->first())){
        return response()->json(['error' => 'Order doesn\'t exist!'], 404);
      }
      //$this->setCurrentDate($request); if update leads to reset date
      $validator = Validator::make($request->all(), $this->rules);
      if(count($validator->valid()) == 0){
        return response()->json(['invalid data' => $validator->invalid()], 400);
      }
      $order->update($validator->validated());
      return response()->json(['ID' => $id,
                              'updated:' => ['fields:' => $validator->validated()]], 200);
    }

    protected function setCurrentDate(Request &$request){
      if(is_null($request->get('CREATED')) || trim($request->get('CREATED')) == ''){
        $request->replace([
                  'CREATED' => date("Y-m-d h:i:s")
                ]);
      }
    }

}
