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
                if(!$seatBooked) {
                    for ($j = 0; $j < 7; $j++) {
                        if ($seat[$i][$j] == 0)
                            $counter++;
                        if ($counter == $seatBook) {
                            $loopstart = $j - $counter + 1;
                            $loopLimit = $loopstart + $counter;
                            while ($loopstart < $loopLimit) {
                                $seat[$i][$loopstart] = 1;
                                $loopstart++;
                            }
                            $seatBooked = 1;
                        }

                    }
                }
            }
        }

        $seatBook = 4;
        $seatBooked = 0;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                if(!$seatBooked) {
                    for ($j = 0; $j < 7; $j++) {
                        if ($seat[$i][$j] == 0)
                            $counter++;
                        if ($counter == $seatBook) {
                            $loopstart = $j - $counter + 1;
                            $loopLimit = $loopstart + $counter;
                            while ($loopstart < $loopLimit) {
                                $seat[$i][$loopstart] = 1;
                                $loopstart++;
                            }
                            $seatBooked = 1;
                        }

                    }
                }
            }
        }

        $seatBook = 2;
        $seatBooked = 0;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                if(!$seatBooked) {
                    for ($j = 0; $j < 7; $j++) {
                        if ($seat[$i][$j] == 0)
                            $counter++;
                        if ($counter == $seatBook) {
                            $loopstart = $j - $counter + 1;
                            $loopLimit = $loopstart + $counter;
                            while ($loopstart < $loopLimit) {
                                $seat[$i][$loopstart] = 1;
                                $loopstart++;
                            }
                            $seatBooked = 1;
                        }

                    }
                }
            }
        }
        $seatBook = 7;
        $seatBooked = 0;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                if(!$seatBooked) {
                    for ($j = 0; $j < 7; $j++) {
                        if ($seat[$i][$j] == 0)
                            $counter++;
                        if ($counter == $seatBook) {
                            $loopstart = $j - $counter + 1;
                            $loopLimit = $loopstart + $counter;
                            while ($loopstart < $loopLimit) {
                                $seat[$i][$loopstart] = 1;
                                $loopstart++;
                            }
                            $seatBooked = 1;
                        }

                    }
                }
            }
        }

        $seatBook = 5;
        $seatBooked = 0;
        if ($seatBook <= 7 && $seatBook > 0) {
            for ($i = 11; $i >= 0; $i--) {
                $counter = 0;
                if(!$seatBooked) {
                    for ($j = 0; $j < 7; $j++) {
                        if ($seat[$i][$j] == 0)
                            $counter++;
                        if ($counter == $seatBook) {
                            $loopstart = $j - $counter + 1;
                            $loopLimit = $loopstart + $counter;
                            while ($loopstart < $loopLimit) {
                                $seat[$i][$loopstart] = 1;
                                $loopstart++;
                            }
                            $seatBooked = 1;
                        }

                    }
                }
            }
        }
        $this->printArray($seat);

    }

    public function printArray($bookingSeat)
    {
        for($i = 0 ; $i < 12; $i++){
            for($j = 0; $j < 7; $j ++)
                echo " ". $bookingSeat[$i][$j];
            echo '<br />';
        }
    }


}