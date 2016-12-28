<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReservationController extends Controller
{
    public function index()
    {
        $seat = [];
        for ($i = 11; $i >= 0; $i--) {
            for ($j = 0; $j < 7; $j++) {
                $seat[$i][$j] = 0;
            }
        }
        $seatBook = 6;
        $seatBooked = 0;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                if($seatBooked) {
                    for ($j = 0; $j < 7; $j++) {
                        if ($seat[$i][$j] == 0)
                            $counter++;
                        if ($counter == $seatBook) {
                            for ($k = 0; $k < 7; $k++) {
                                if ($seat[$i][$k] == 0)
                                    break;
                            }
                            $loopLimit = $k + $seatBook;
                            while ($k < $loopLimit) {
                                $seat[$i][$k] = 1;
                                $k++;
                                $seatBooked = 1;
                            }

                        }

                    }
                }
            }
        }
        var_dump($seat);
        echo '<br />';

        $seatBook = 4;
        $seatBooked = 0;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                if($seatBooked) {
                    for ($j = 0; $j < 7; $j++) {
                        if ($seat[$i][$j] == 0)
                            $counter++;
                        if ($counter == $seatBook) {
                            for ($k = 0; $k < 7; $k++) {
                                if ($seat[$i][$k] == 0)
                                    break;
                            }
                            $loopLimit = $k + $seatBook;
                            while ($k < $loopLimit) {
                                $seatBook[$i][$k] = 1;
                                $k++;
                            }

                        }

                    }
                }
            }
        }
        echo '<br />';
        var_dump($seat);

    }
}