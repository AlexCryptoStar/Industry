<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataRegisterModel;
use App\DataRecordModel;
use Illuminate\Support\Facades\Input;
use Qcloud\Cos\Client;
use Illuminate\Validation\ValidationException;


class DataRegisterController extends Controller {

    public $QCLOUD_REGION = "ap-guangzhou";
    public $QCLOUD_APPID = "1251028544";
    public $QCLOUD_SECRETID = "AKIDjZpnPeZ1No4zBahCRUd2DuuVvad9rkG0";
    public $QCLOUD_SECRETKEY = "1LwNTdko4AJrFfjVtfkonha2TEPARCCs";
    public $QCLOUD_BUCKET = "sergey-1251028544";

    public function submit(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'standard' => 'required',
            'material' => 'required',
            'weight' => 'required',
            'manufacture' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,bmp|max:2048'
        ]);

        $count = $request->input('count') ? $request->input('count') : 0;
        $length = $request->input('length') ? $request->input('length') : 0;

        $image_url = '';
        foreach ($request->image as $key => $image) {
            $generate = $this->generateRandomString();
            $fileName = 'proof-'.$generate.'-'.$image->getClientOriginalName();
            $pathName = $image->getPathName();
            
            // Save the proof image in the console.cloud.tencent.com
            $this->uploadImg($fileName, $pathName);
            $image_url .= $this->QCLOUD_BUCKET.'.cos.'.$this->QCLOUD_REGION.'.myqcloud.com/'.$fileName.'|';
        }

        $dataRegistry =  new DataRegisterModel;

        $dataRegistry->img_url = $image_url;
        $dataRegistry->name = $request->input('name');
        $dataRegistry->amount_change = 0;
        $dataRegistry->standard = $request->input('standard');
        $dataRegistry->material = $request->input('material');
        $dataRegistry->count = $count;
        $dataRegistry->weight = $request->input('weight');
        $dataRegistry->length = $length;
        $dataRegistry->manufacture = $request->input('manufacture');
        $dataRegistry->note = $request->input('note');

        $dataRegistry->save();

        $currentRow = $dataRegistry->latest()->first();

        // Record in data_record Table
        $dataRecord = new DataRecordModel;
        $dataRecord->img_url = $image_url;
        $dataRecord->name = $request->input('name');
        $dataRecord->amount_change = 1;
        $dataRecord->standard = $request->input('standard');
        $dataRecord->material = $request->input('material');
        $dataRecord->count = $count;
        $dataRecord->weight = $request->input('weight');
        $dataRecord->length = $length;
        $dataRecord->manufacture = $request->input('manufacture');
        $dataRecord->parent_id = $currentRow->id;
        $dataRecord->note = $request->input('note');        
        $dataRecord->save();
  
        return redirect('/');
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
            'weight' => 'required',
            'manufacture' => 'required',
        ]);
        
        $count = $request->input('count') ? $request->input('count') : 0;
        $length = $request->input('length') ? $request->input('length') : 0;

        // For count 1 == input value , 2 == out value
        $countVal = $request->input('count');
        if ( $request->input('amount_change') == 1 ) {
            $countVal = $request->input('count_show') + $count;
        } else if ( $request->input('amount_change') == 2 ) {
            $countVal = $request->input('count_show') - $count;
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
            $lengthVal = $request->input('length_show') + $length;
        } else if ( $request->input('amount_change') == 2 ) {
            $lengthVal = $request->input('length_show') - $length;
        }

        $image_url = '';
        foreach ($request->updateImage as $key => $image) {
            $generate = $this->generateRandomString();
            $fileName = 'proof-updated-'.$generate.'-'.$image->getClientOriginalName();
            $pathName = $image->getPathName();
            
            // Save the proof image in the console.cloud.tencent.com
            $this->uploadImg($fileName, $pathName);
            $image_url .= $this->QCLOUD_BUCKET.'.cos.'.$this->QCLOUD_REGION.'.myqcloud.com/'.$fileName.'|';
        }

        // Updating in data_registry Table
        $dataRegistry = new DataRegisterModel;
        $dataRegistry
            ->where( 'id', $request->input('id') )
            ->update([
                'img_url' => $image_url,
                'amount_change' => 0,
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
        $dataRecord->img_url = $image_url;
        $dataRecord->name = $request->input('name');
        $dataRecord->amount_change = $request->input('amount_change');
        $dataRecord->standard = $request->input('standard');
        $dataRecord->material = $request->input('material');
        $dataRecord->count = $count;
        $dataRecord->weight = $request->input('weight');
        $dataRecord->length = $length;
        $dataRecord->manufacture = $request->input('manufacture');
        $dataRecord->parent_id = $request->input('id');
        $dataRecord->note = $request->input('note');        
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
        $data = $dataRecord->whereBetween('created_at', [$startTime, $endTime])->get();

        return response()->json($data);
    }

    // Image Uploading in Qcloud
    private function uploadImg($fileName, $realPath){
        
        $key = $fileName;
        $local_path = $realPath;

        $cosClient = new Client(array('region' => $this->QCLOUD_REGION,
            'credentials'=> array(
                'appId' => $this->QCLOUD_APPID,
                'secretId' => $this->QCLOUD_SECRETID,
                'secretKey' => $this->QCLOUD_SECRETKEY)));

        try {
            $result = $cosClient->putObject(array(
                'Bucket' => $this->QCLOUD_BUCKET,
                'Key' => $key,
                'Body' => fopen($local_path, 'rb')
            ));
        } catch (\Exception $e) {
            echo($e);
        }
    }

    private function generateRandomString() {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}