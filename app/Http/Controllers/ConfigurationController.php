<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuration;
use Illuminate\Support\Facades\Redirect;
use Carbon;

class ConfigurationController extends Controller {

    public function __construct() {
        $this->middleware('Admin');
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'disable_records' => 'required',
                    'disable_reservations' => 'required',
                    'booking_time' => 'required|min:1|max:24',
                    'disable_mails' => 'required',
                    'disable_news' => 'required'
        ]);
    }

    public function update(Request $request) {
        $registros = ($request['disable_records'] == 'on') ? 1 : 0;
        $reservas = ($request['disable_reservations'] == 'on') ? 1 : 0;
        $mails = ($request['disable_mails'] == 'on') ? 1 : 0;
        $news = ($request['disable_news'] == 'on') ? 1 : 0;
        $configuration = Configuration::find(1);
        $configuration->fill([
            'disable_records' => $registros,
            'disable_reservations' => $reservas,
            'booking_time' => $request['booking_time'],
            'disable_mails' => $mails,
            'disable_news' => $news]);

        $configuration->update();
        $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
        \Session::flash('flash_message', 'Se ha actualizado Correctamente. '.$format);
        return Redirect::back();
    }

    public function config() {
         $mytime = Carbon\Carbon::now();
        $format = $mytime->subDay()->format('h:i:s');
        try {
            $config = Configuration::find(1);

            $disableRecords = ($config->disable_records == 1) ? 'checked' : '';
            $disableReservations = ($config->disable_reservations == 1) ? 'checked' : '';
            $disableMails = ($config->disable_mails == 1) ? 'checked' : '';
            $disableNews = ($config->disable_news == 1) ? 'checked' : '';
        } catch (Exception $e) {
             \Session::flash('flash_message_error', 'Ha ocurrido un error. '.$format);
            return view('admin.config.config', ['msg' => 'No se ha podido cargar el registro de opciones. Error: ' . $e]);
        }
                return view('admin.config.config', ['disableRecords' => $disableRecords, 'disableReservations' => $disableReservations, 'disableMails' => $disableMails, 'disableNews' => $disableNews, 'bookingTime' => $config->booking_time, 'msd' => 'Se ha cargado el registro de opciones correctamente']);
    }

}
