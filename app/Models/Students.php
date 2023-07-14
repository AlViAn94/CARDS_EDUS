<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

class Students extends Model
{
    protected $fillable = [
        'id_mektep',
        'id_class',
        'name',
        'surname',
        'lastname',
        'name_latin',
        'surname_latin',
        'lastname_latin',
        'iin',
        'birthday',
        'pol',
        'national',
        'photo_file',
        'parent_ata_id',
        'parent_ana_id',
        'status',
        'login',
        'pass',
        'email',
        'access',
        'access_by',
        'access_iin',
        'access_date',
        'access_expire',
        'last_visit',
        'last_visit_out',
        'remote_ip',
        'remote_host',
        'remote_browser',
    ];


    public static function getSchoolBoy($iin)
    {
        $client = new Client();
        $response = $client->get('https://mektep.edu.kz/api/v1/index.php', [
            'query' => [
                'action' => 'studentone',
                'auth' => $_ENV['AUTH_TOKEN'],
                'iin' => $iin
            ]
        ]);


        $data = $response->getBody()->getContents();
        $school_boy = json_decode($data, true);

        return $school_boy;
    }
}
