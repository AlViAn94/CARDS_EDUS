<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\school;
use App\Models\Teacher;
use App\Models\Personal;
class NewCardsController extends Controller
{
    public function actionGetStudents(Request $request)
    {

        $iin = $request->query('iin');
        $name = $request->query('name');
        $surname = $request->query('surname');
        $school = $request->query('school');

        $school_boy = Students::getSchoolBoy($iin);

//        switch (true) {
//            case $school_boy['data']['name'] != $name:
//                echo 'Имя не верно!';
//                exit();
//            case $school_boy['data']['surname'] != $surname:
//                echo 'Не правильная фамилия!';
//                exit();
//            case $school_boy['data']['id_mektep'] != $school:
//                echo 'Не та школа!';
//                exit();
//        }

        return $school_boy;
    }

    public function actionRegions(){

        $region = School::getRegion();

        return $region;
    }

    public function actionGetSchools(){

        $schools = School::getSchoolAll();

        return $schools;
    }

    public function actionGetPersonal(Request $request){

        $iin = $request->query('iin');
        $name = $request->query('name');
        $surname = $request->query('surname');
        $school = $request->query('school');
        $status = $request->query('status');

//        switch (true) {
//            case $school_boy['data']['name'] != $name:
//                echo 'Имя не верно!';
//                exit();
//            case $school_boy['data']['surname'] != $surname:
//                echo 'Не правильная фамилия!';
//                exit();
//            case $school_boy['data']['id_mektep'] != $school:
//                echo 'Не та школа!';
//                exit();
//        }

        switch ($status){
            case 'teacher':
                $teacher = Teacher::getTeacher($iin);
                return $teacher;
            case 'personal':
                $personal = Personal::getPersonal($iin);
                return $personal;
        }
    }
}
