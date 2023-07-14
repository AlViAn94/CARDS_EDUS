<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\school;
use App\Models\Teacher;
use App\Models\Personal;
class NewCardsController extends Controller
{
    public function actionGetUsers(Request $request){

        $iin = $request->input('iin');
        $name = $request->input('name');
        $surname = $request->input('surname');
        $school = $request->input('school');
        $status = $request->input('status');

        switch ($status){
            case 'teacher':
                $user = Teacher::getTeacher($iin);
                $result = $this->validateUsers($user, $name, $surname, $school, $status);
                return $result;
            case 'personal':
                $user = Personal::getPersonal($iin);
                $result = $this->validateUsers($user, $name, $surname, $school, $status);
                return $result;
            case 'student';
                $user = Students::getSchoolBoy($iin);
                $result = $this->validateUsers($user, $name, $surname, $school, $status);
                return $result;
        }
        return response()->json(['error' => 'Неверный запрос'], 406);
    }

    public function actionRegions(){

        $region = School::getRegion();

        return $region;
    }

    public function actionGetSchools(){

        $schools = School::getSchoolAll();

        return $schools;
    }

    public function validateUsers($user, $name, $surname, $school){

        if($user['data'] == null){
            return response()->json(['error' => 'Такой пользователь не найден!'], 400);
            exit();
        }
        switch (true) {
            case $user['data']['name'] != $name:
                return response()->json(['error' => 'Имя не верно!'], 401);
                exit();
            case $user['data']['surname'] != $surname:
                return response()->json(['error' => 'Не правильная фамилия!'], 402);
                exit();
            case $user['data']['id_mektep'] != $school:
                return response()->json(['error' => 'Не та школа!'], 403);
                exit();
        }
        return $user;
    }
    public function saveNewCards(Request $request){

        foreach ($request as $studentData) {
            Students::create($studentData);
        }


    }
}
