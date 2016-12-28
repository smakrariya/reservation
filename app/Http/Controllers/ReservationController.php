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

        for($i = 0; $i <= 6; $i++){
            $seat = $this->SeatBooking($seat, rand(1, 7));
            $this->printArray($seat);
        }
    }

    public function SeatBooking($bookingSeat, $seatBook){

        var_dump($seatBook);echo "<br />";
        $seatBooked = 0;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                if(!$seatBooked) {
                    for ($j = 0; $j < 7; $j++) {
                        if ($bookingSeat[$i][$j] == 0)
                            $counter++;
                        if ($counter == $seatBook) {
                            $loopstart = $j - $counter + 1;
                            $loopLimit = $loopstart + $counter;
                            while ($loopstart < $loopLimit) {
                                $bookingSeat[$i][$loopstart] = 1;
                                $loopstart++;
                            }
                            $seatBooked = 1;
                        }

                    }
                }
            }
        }

        else
            die('Please type authorise number');

        return $bookingSeat;
    }

    public function printArray($bookingSeat)
    {
        for($i = 0 ; $i < 12; $i++){
            for($j = 0; $j < 7; $j ++)
                echo " ". $bookingSeat[$i][$j];
            echo '<br />';
        }

        echo '<br />';
    }


}