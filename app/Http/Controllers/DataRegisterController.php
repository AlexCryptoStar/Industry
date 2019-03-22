<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataRegisterModel;
use App\DataRecordModel;

class DataRegisterController extends Controller {

    public function submit(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'amount_change' => 'required',
            'standard' => 'required',
            'material' => 'required',
            'count' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'manufacture' => 'required',
        ]);

        echo $request;

        // $dataRegistry =  new DataRegisterModel;

        // $dataRegistry->name = $request->input('name');
        // $dataRegistry->amount_change = intval($request->input('amount_change'));
        // $dataRegistry->standard = $request->input('standard');
        // $dataRegistry->material = $request->input('material');
        // $dataRegistry->count = $request->input('count');
        // $dataRegistry->weight = $request->input('weight');
        // $dataRegistry->length = $request->input('length');
        // $dataRegistry->manufacture = $request->input('manufacture');

        // $dataRegistry->save();

        // $currentRow = $dataRegistry->latest()->first();

        // // Record in data_record Table
        // $dataRecord = new DataRecordModel;
        // $dataRecord->name = $request->input('name');
        // $dataRecord->amount_change = $request->input('amount_change');
        // $dataRecord->standard = $request->input('standard');
        // $dataRecord->material = $request->input('material');
        // $dataRecord->count = $request->input('count');
        // $dataRecord->weight = $request->input('weight');
        // $dataRecord->length = $request->input('length');
        // $dataRecord->manufacture = $request->input('manufacture');
        // $dataRecord->parent_id = $currentRow->id;
        // $dataRecord->save();
  
        // return redirect('/');
    }

    public function getDataById(Request $request) {
        
        $dataRegistry = new DataRegisterModel;
        $data = $dataRegistry->where('id', '=', $request->rowId)->get();

        return response()->json($data);
    }

    // Data Updating
    public function update(Request $request) {
        
        $this->validate($request, [
            'id' => 'required',
            'name' => 'required',
            'amount_change' => 'required',
            'standard' => 'required',
            'material' => 'required',
            'count' => 'required',
            'weight' => 'required',
            'length' => 'required',
            'manufacture' => 'required',
        ]);
        
        // For count 1 == input value , 2 == out value
        $countVal = $request->input('count');
        if ( $request->input('amount_change') == 1 ) {
            $countVal = $request->input('count_show') + $request->input('count');
        } else if ( $request->input('amount_change') == 2 ) {
            $countVal = $request->input('count_show') - $request->input('count');
        }

        // For weight 1 == input value , 2 == out value
        $weightVal = $request->input('weight');
        if ( $request->input('amount_change') == 1 ) {
            $weightVal = $request->input('weight_show') + $request->input('weight');
        } else if ( $request->input('amount_change') == 2 ) {
            $weightVal = $request->input('weight_show') - $request->input('weight');
        }

        // For length if 1 == input value , 2 == out value
        $lengthVal = $request->input('length');
        if ( $request->input('amount_change') == 1 ) {
            $lengthVal = $request->input('length_show') + $request->input('length');
        } else if ( $request->input('amount_change') == 2 ) {
            $lengthVal = $request->input('length_show') - $request->input('length');
        }

        // Updating in data_registry Table
        $dataRegistry = new DataRegisterModel;
        $dataRegistry
            ->where( 'id', $request->input('id') )
            ->update([
                'name' => $request->input('name'),
                'standard' => $request->input('standard'),
                'material' => $request->input('material'),
                'count' => $countVal,
                'weight' => $weightVal,
                'length' => $lengthVal,
                'manufacture' => $request->input('manufacture'),
                ]);

        // Record in data_record Table
        $dataRecord = new DataRecordModel;
        $dataRecord->name = $request->input('name');
        $dataRecord->amount_change = $request->input('amount_change');
        $dataRecord->standard = $request->input('standard');
        $dataRecord->material = $request->input('material');
        $dataRecord->count = $request->input('count');
        $dataRecord->weight = $request->input('weight');
        $dataRecord->length = $request->input('length');
        $dataRecord->manufacture = $request->input('manufacture');
        $dataRecord->parent_id = $request->input('id');
        $dataRecord->save();
  
        return redirect('/');
    }

    // getting date list for side bar.
    public function getDateList(Request $request) {

        $date = explode("-", $request->date);
        $startDate = date("Y-m-d H:i", strtotime($date[0])).":00";
        $endDate = date("Y-m-d", strtotime($date[1]))." 23:59:00";
        
        $dataRecord = new DataRecordModel;
        $data = $dataRecord->whereBetween('created_at', [$startDate, $endDate])->get('created_at')->sortByDesc('created_at');

        $dateList = array();
        foreach ( $data as $key => $value ) {
            $dateVal = explode(' ', $value->created_at )[0];
            array_push( $dateList, $dateVal );
        }
        $res = array_values(array_unique($dateList));

        return response()->json($res);
    }   

    // getting data by date for datatable.
    public function getDataByDate(Request $request) {

        $startTime = $request->date.' 00:00:00';
        $endTime = $request->date.' 23:59:59';

        $dataRecord = new DataRecordModel;
        $data = $dataRecord->whereBetween('created_at', [$startTime, $endTime])->get()->sortByDesc('created_at');

        return response()->json($data);
    }

}