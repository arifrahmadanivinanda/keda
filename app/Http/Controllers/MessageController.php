<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message as Messages;

class MessageController extends Controller
{
    public $successStatus = 200;

    public function bug($id, $report)
    {
        $input = array();
        $input['from'] = $id;
        $input['to'] = 'dev';
        $input['message'] = $report;
        $input['type'] = 'bug';
        $message = Messages::create($input);

        return response()->json(['success'=>$message], $this->successStatus);
    }

    public function message($idfrom, $idto, $report)
    {
        $input = array();
        $input['from'] = $idfrom;
        $input['to'] = $idto;
        $input['message'] = $report;
        $input['type'] = 'message';
        $message = Messages::create($input);

        return response()->json(['success'=>$message], $this->successStatus);
    }

    public function list($id)
    {
        $history = Messages::withTrashed()
        ->where('from', $id)
        ->orWhere('to', $id)
        ->get();
        return response()->json([$history], $this->successStatus);
    }
}
