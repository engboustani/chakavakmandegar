<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{
    use SoftDeletes;

    public function getList()
    {
        $courses = \App\Course::latest()->get();
        return $courses->makeHidden(['updated_at'])->toJson();
    }

    public function new(Request $request)
    {
        $course = new \App\Course;

        $course->title = $request->title;
        $course->description = $request->description;
        $course->teacher = $request->teacher;
        $course->price = $request->price;
        $course->poster = $request->poster;
        $course->indexed = $request->indexed;
        $course->limit_count = $request->limit_count;
        $course->limit_time = $request->limit_time;
        $course->auther_id = Auth::id();

        $course->save();

        return response()->json([
            'id' => $course->id
        ], 201);
    }

    public function get($id)
    {
        $course = \App\Course::find($id);

        return $course->toJson();
    }

    public function update(Request $request)
    {
        $course = \App\Course::find($request->id);

        $course->title = $request->title;
        $course->description = $request->description;
        $course->teacher = $request->teacher;
        $course->price = $request->price;
        $course->poster = $request->poster;
        $course->indexed = $request->indexed;
        $course->limit_count = $request->limit_count;
        $course->limit_time = $request->limit_time;

        $course->save();

        return response()->json([
            'id' => $request->id,
        ], 200);
    }

    public function delete(Request $request)
    {
        $course = \App\Course::find($request->id);

        $course->delete();

        return response()->json([
            'id' => $request->id,
        ], 200);
    }

    public function info($id)
    {
        $course = \App\Course::find($id);
        $user = Auth::user();
        switch ($this->checkCourse($course, $user)) {
            case -1:
                return response()->json([
                    'msg' => 'registered before!',
                    'status' => -1
                ], 200);
                break;
            case -2:
                return response()->json([
                    'msg' => 'registration limited!',
                    'status' => -2
                ], 200);
                break;
            default:
                return response()->json([
                    'msg' => 'you can register!',
                    'status' => 1
                ], 200);
                break;
        }
    }

    public function signupCourse(Request $request)
    {
        $course = \App\Course::find($request->id);
        $user = Auth::user();
        switch ($this->checkCourse($course, $user)) {
            case 0:
                return response()->json([
                    'msg' => 'course not exist!',
                ], 500);
                break;
            case -1:
                return response()->json([
                    'msg' => 'registered before!',
                ], 500);
                break;
            case -2:
                return response()->json([
                    'msg' => 'registeration limited!',
                ], 500);
                break;
            default:
                # code...
                break;
        }
        if($course->price == 0) {
            return $this->addSignToCourse($course, $user);
        }
        else {
            if($user->credit >= $course->price)
            {
                $this->disCharge($course, $user);
                return $this->addSignToCourse($course, $user);
            }
            else {
                $payment = $this->newPayment($course, $user);
        
                try {
                    $url = $payment->getUrlCourse($course);
                    return response()->json([
                        'msg' => 'goto payment for add charge',
                        'url' => $url
                    ], 200);
                }
                catch(SendException $e)
                {
                    return $e; 
                }
            }
        }
    }

    private function checkCourse($course, $user)
    {
        $result = 1;
        // if course exist
        if ($course == null)
        {
            $result = 0;
            return $result;
        }
        $count = $course->users()->where('id', $user->id)->count();
        // registered before
        if($count != 0)
        {
            $result = -1;
            return $result;
        }
        $count_course = $course->users()->count();
        // registeration limited
        if ($count_course >= $course->limit_count) {
            $result = -2;
            return $result;
        }
        return $result;
    }

    private function addSignToCourse($course, $user)
    {
        $course->users()->save($user);
        return response()->json([
            'msg' => 'registered succesfully',
        ], 201);
    }

    private function disCharge($course, $user)
    {
        $discharge = new \App\Charge;
        $discharge->type = 1;
        $discharge->user_id = $user->id;
        $discharge->amount = -1 * $course->price;
        $discharge->save();
    }

    private function newPayment($course, $user)
    {
        $payment = new \App\Payment;

        $payment->method = 1;
        $payment->user_id = $user->id;
        $payment->submited_by = 1;
        $payment->amount = $course->price;
        $payment->description = "پرداخت ثبت‌نام {$course->title}";

        $payment->save();

        return $payment;
    }


}
