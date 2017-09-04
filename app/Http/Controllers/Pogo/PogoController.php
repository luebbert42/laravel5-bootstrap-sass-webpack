<?php

namespace App\Http\Controllers\Pogo;


use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Requests\EditUserRequest;
use phpDocumentor\Reflection\Types\Integer;

class PogoController extends BaseController
{


    public function __construct() {
        parent::__construct();
    }

    public function generate($num) {
        $records = $this->getRecords($num);
        $template =  \View::make('pogo/generate', [
                "records" => $records
          ]
      )->render();
      $filename = $this->writeXML2File($template, (int) $num);
      return \Response::download($filename, 'pega-fake-data-'.$num.'-'.date("Y-m-d").'.xml')->deleteFileAfterSend(true);
    }

    public function debug($num) {
        $breadcrumbs = [];
        $records = $this->getRecords($num);
        return view('pogo/debug',
            [
                "breadcrumbs" => $breadcrumbs,
                "records" => $records
            ]
        );
    }

    public function index() {
        $breadcrumbs = [];
        return view('pogo/index',
            [
                "breadcrumbs" => $breadcrumbs
            ]
        );
    }

    protected function getRecords($num) {
        $faker = \Faker\Factory::create('de_DE');
        $records = [];
        for ($i=0; $i < $num; $i++) {
            $record = [
                "vorname" => $faker->firstName(),
                "nachname" => $faker->lastName(),
                "briefanrede1" => $faker->text(100),
                "berater_filiale" => $faker->city(),
                "berater_strasse_nr" => $faker->streetName()." ".$faker->buildingNumber(),
                "berater_plz_ort" => $faker->randomNumber(5,true)." ".$faker->city(),
                "partner_id" => $faker->randomNumber(6,true),
                "email_adresse" => $faker->userName."@".$faker->safeEmailDomain
            ];
            $records[] = $record;
        }
        return $records;
    }
    protected function writeXML2File( $template, $num) {

        $filename = storage_path().'/output/pogo-fake-data-'.$num."-".date("Y-m-d H:i:s", time()).".xml";
        $fp = fopen($filename,"w");
        fwrite($fp,$template);
        fclose($fp);
        return $filename;

    }
}
