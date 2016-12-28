<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReservationController extends Controller
{
    public function index()
    {
        $seat[12][7] = [0];
        $seatBook = 6;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                for ($j = 0; $j < 7; $j++) {
                    if($seat[$i][$j] == 0)
                        $counter++;
                    if($counter == $seatBook){
                        for($k = 0 ; $k < 7; $k++){
                            if($seat[$i][$k] == 0)
                                break;
                        }
                        $loopLimit = $k+$seatBook;
                        while ($k < $loopLimit){
                            $seatBook[$i][$k] = 1;
                            $k++;
                        }

                    }

                }
            }
        }
        var_dump($seat);

        $seatBook = 4;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                for ($j = 0; $j < 7; $j++) {
                    if($seat[$i][$j] == 0)
                        $counter++;
                    if($counter == $seatBook){
                        for($k = 0 ; $k < 7; $k++){
                            if($seat[$i][$k] == 0)
                                break;
                        }
                        $loopLimit = $k+$seatBook;
                        while ($k < $loopLimit){
                            $seatBook[$i][$k] = 1;
                            $k++;
                        }

                    }

                }
            }
        }
        var_dump($seat);

    }
}