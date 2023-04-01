<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Agenda,
    AgendaEvent
};

class AgendaController extends Controller
{
    public function all_agenda()
    {
        
        $allagenda = Agenda::where(['status'=>1])->get();
        $result = [];
        $i = 0;
        
        foreach($allagenda as $row){
            $result[$i][0] = $row->start_date;
            $result[$i++][1] = $row->agenda_event;
        }        

        return response()->json([
            'status' => 200,
            'agenda' => $result
        ]);
    }

}
