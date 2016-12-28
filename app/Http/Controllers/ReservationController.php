<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReservationController extends Controller
{
    /*public function index(){
        $seat = [];
        for ($i = 11; $i >= 0; $i--) {
            for ($j = 0; $j < 7; $j++) {
                $seat[$i][$j] = 0;
            }
        }

        return view('Reservation');
    }*/
    public function index()
    {
        $seat = [];
        for ($i = 11; $i >= 0; $i--) {
            for ($j = 0; $j < 7; $j++) {
                $seat[$i][$j] = 0;
            }
        }
        $seatBooked = 6;
        for($i = 0; $i <= 12; $i++){
            //$bookedSeat = $this->SeatBooking($seat, rand(1, 7));
            $bookedSeat = $this->SeatBooking($seat, 6);

            if($bookedSeat){
                $seat = $bookedSeat;
                $this->printArray($bookedSeat);
            }

            else
            {
                $bookedSeat = $this->SeatBookingNotInSameRow($seat, $seatBooked);
                $this->printArray($bookedSeat);
            }

        }
        //$this->printArray($bookedSeat);
    }
    /**
     * @param $bookingSeat
     * @param $seatBook
     * @return mixed
     */
    public function SeatBooking($bookingSeat, $seatBook)
    {
        echo $seatBook;
        echo "<br />";
        $seatBooked = 0;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {

                $counter = 0;
                $rowLimit = ($i == 11) ? 3 : 7;

                if(!$seatBooked) {

                    for ($j = 0; $j < $rowLimit; $j++) {

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

        if($seatBooked)
            return $bookingSeat;
        else
            return 0;
    }

    public function SeatBookingNotInSameRow($seat, $seatBooking)
    {
        $counter = 0;
        $spaceAvaliable = 0;
        for ($i = 11; $i >= 0; $i--) {
            if(!$spaceAvaliable) {
                for ($j = 0; $j < 7; $j++) {
                    if ($seat[$i][$j] == 0) {
                        $counter++;
                    }
                    if ($counter == $seatBooking) {
                        $spaceAvaliable = 1;
                        $seat = $this->booking($seat, $seatBooking);
                        return $seat;
                    }

                }
            }
            else
                echo "Seats Not Avaliable";
        }
    }

    /**
     * @param $seat
     * @param $seatBooking
     * @return mixed
     */
    public function booking($seat , $seatBooking)
    {
        $counter = 0;
        $booked = 0;
        for ($i = 11; $i >= 0; $i--) {
            if (!$booked) {
                for ($j = 0; $j < 7; $j++) {
                    if ($seat[$i][$j] == 0) {
                        $seat[$i][$j] = 1;
                        $counter++;
                    }

                    if ($counter == $seatBooking)
                        $booked = 1;
                }
            }
        }
        return $seat;
    }

    /**
     * @param $bookingSeat
     */
    public function printArray($bookingSeat)
    {
        echo '<table>';
        for($i = 0 ; $i < 12; $i++){
            echo '<tr>';
            for($j = 0; $j < 7; $j ++) {
                if($bookingSeat[$i][$j] == 1)
                    echo '<td>' . (($i)*7 + ($j+1)).'</td>';
                else
                    echo '<td>' . $bookingSeat[$i][$j].'</td>';
                    //echo "| ". $bookingSeat[$i][$j];
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '<br />';
    }


}