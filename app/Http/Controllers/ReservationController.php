<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

class ReservationController extends Controller
{
    public function index(){
        $seat = [];
        for ($i = 11; $i >= 0; $i--) {
            for ($j = 0; $j < 7; $j++) {
                $seat[$i][$j] = 0;
            }
        }

        if(!Session::has('reservation'))
            Session::put('reservation', $seat);

        return view('Reservation');
    }

    public function reset(){
        Session::destroy();
        return response()->back();
    }

    public function calculation(Request $request)
    {
        /*$seat = [];
        for ($i = 11; $i >= 0; $i--) {
            for ($j = 0; $j < 7; $j++) {
                $seat[$i][$j] = 0;
            }
        }*/

        $seatBooked = $request['seatsNo'];
        $seat = Session::get('reservation');
        //for($i = 0; $i <= 13; $i++){
            //$bookedSeat = $this->SeatBooking($seat, rand(1,7));
            $bookedSeat = $this->SeatBooking($seat, $seatBooked);

            if($bookedSeat){
                $seat = $bookedSeat;
                return $this->printArray($bookedSeat);
            }
            else
            {
                $bookedSeat = $this->SeatBookingNotInSameRow($seat, $seatBooked);
                //$seat = $bookedSeat;
                if($bookedSeat)
                    return $this->printArray($bookedSeat);
                else
                    return "NO SPACE IS AVAILABLE";
            }

        //}
        //$this->printArray($bookedSeat);
    }

    /**
     * @param $bookingSeat
     * @param $seatBook
     * @return mixed
     */
    public function SeatBooking($bookingSeat, $seatBook)
    {
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

        else{
            echo'Please type authorise number';
        }

        if($seatBooked)
            return $bookingSeat;
        else
            return 0;
    }

    public function SeatBookingNotInSameRow($seat, $seatBooking)
    {
        $counter = 0;
        for ($i = 11; $i >= 0; $i--) {
            $rowLimit = ($i == 11) ? 3 : 7;
            for ($j = 0; $j < $rowLimit; $j++) {
                    if ($seat[$i][$j] == 0) {
                        $counter++;
                    }
            }
        }
        if($counter >= $seatBooking){
            $seat = $this->booking($seat, $seatBooking);
            return $seat;
        }
        else{
            return 0;
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
            $rowLimit = ($i == 11) ? 3 : 7;
            if (!$booked) {
                for ($j = 0; $j < $rowLimit; $j++) {
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
        Session::put(['reservation' => $bookingSeat]);
        return ($bookingSeat);
    }

}
