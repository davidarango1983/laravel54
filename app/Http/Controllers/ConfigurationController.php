<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    
       public function __construct()
    {
        $this->middleware('Admin');
    }
    
    protected function validator(array $data)
  {
      return Validator::make($data, [
          'allow_records' => 'required',
          'allow_reservations' => 'required',
            'booking_time' => 'required',
            'disable_mails' => 'required',
            'disable_news' => 'required'
        ]);
  }
    
    
}
