<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\vicidial_agent_log;
use App\vici_agent_log_local;
use Illuminate\Http\Request;

class AutomateHourController extends Controller
{
    
    public function index(){

        $listHorasCompletas = array();

        $listHoras_madrugada = vicidial_agent_log::where("user", "=", 'LT2175')->whereBetween("event_time", ['2022-06-13 00:00:00', '2022-06-13 05:59:59'])->get();
        $listHoras_dia = vicidial_agent_log::where("user", "=", 'LT2175')->whereBetween("event_time", ['2022-06-13 6:00:00', '2022-06-13 18:59:59'])->get();
        $listHoras_noche = vicidial_agent_log::where("user", "=", 'LT2175')->whereBetween("event_time", ['2022-06-13 19:00:00', '2022-06-13 23:59:59'])->get();

        foreach ($listHoras_madrugada as $key => $value) {

            if (isset($listHorasCompletas[$value["user"]]["Madrugada"][$value["sub_status"]])) {

                $listHorasCompletas[$value["user"]]["Madrugada"][$value["sub_status"]] += ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;
                
            }else{

                $listHorasCompletas[$value["user"]]["Madrugada"][$value["sub_status"]] = ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;

            }
            
        }

        foreach ($listHoras_dia as $key => $value) {

            if (isset($listHorasCompletas[$value["user"]]["Dia"][$value["sub_status"]])) {

                $listHorasCompletas[$value["user"]]["Dia"][$value["sub_status"]] += ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;
                
            }else{

                $listHorasCompletas[$value["user"]]["Dia"][$value["sub_status"]] = ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;

            }
            
        }

        foreach ($listHoras_noche as $key => $value) {

            if (isset($listHorasCompletas[$value["user"]]["Noche"][$value["sub_status"]])) {

                $listHorasCompletas[$value["user"]]["Noche"][$value["sub_status"]] += ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;
                
            }else{

                $listHorasCompletas[$value["user"]]["Noche"][$value["sub_status"]] = ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;

            }
            
        }

        dd($listHorasCompletas);

        return view("Script.ScriptVici", compact("listHoras_madrugada"));
    }

    public function ViciLocal(){

        $listHorasCompletas = array();

        $listHoras_madrugada = vici_agent_log_local::where("user", "=", '101')->whereBetween("event_time", ['2017-07-13 00:00:00', '2017-07-13 05:59:59'])->get();
        $listHoras_dia = vici_agent_log_local::where("user", "=", '101')->whereBetween("event_time", ['2017-07-13 6:00:00', '2017-07-13 18:59:59'])->get();
        $listHoras_noche = vici_agent_log_local::where("user", "=", '101')->whereBetween("event_time", ['2017-07-13 19:00:00', '2017-07-13 23:59:59'])->get();

        foreach ($listHoras_madrugada as $key => $value) {

            if (isset($listHorasCompletas[$value["user"]]["Madrugada"][$value["sub_status"]])) {

                $listHorasCompletas[$value["user"]]["Madrugada"][$value["sub_status"]] += ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;
                
            }else{

                $listHorasCompletas[$value["user"]]["Madrugada"][$value["sub_status"]] = ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;

            }
            
        }

        foreach ($listHoras_dia as $key => $value) {

            if (isset($listHorasCompletas[$value["user"]]["Dia"][$value["sub_status"]])) {

                $listHorasCompletas[$value["user"]]["Dia"][$value["sub_status"]] += ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;
                
            }else{

                $listHorasCompletas[$value["user"]]["Dia"][$value["sub_status"]] = ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;

            }
            
        }

        foreach ($listHoras_noche as $key => $value) {

            if (isset($listHorasCompletas[$value["user"]]["Noche"][$value["sub_status"]])) {

                $listHorasCompletas[$value["user"]]["Noche"][$value["sub_status"]] += ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;
                
            }else{

                $listHorasCompletas[$value["user"]]["Noche"][$value["sub_status"]] = ($value["talk_sec"] + $value["pause_sec"] + $value["wait_sec"] + $value["dispo_sec"]) / 3600;

            }
            
        }

        dd($listHorasCompletas);

        return view("Script.ScriptVici", compact("listHoras_madrugada"));
    }

}