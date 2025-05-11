<?php

namespace MyClinic\Setting\Controllers;

use Backend\Classes\Controller;
use Cms\Helpers\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Mail;
use MyClinic\Hr\Models\AskUs;
use MyClinic\Hr\Models\Career;
use MyClinic\Hr\Models\ProgramEnrollment;
use MyClinic\Programs\Models\Program;
use Illuminate\Support\Facades\Http;
use Route;
use Storage;
use System\Models\File as ModelsFile;
use Validator;
use ValidationException;
use MyClinic\Doctor\Models\Doctor;

class Settings extends Controller
{

    public function sendContactUsMail(Request $request)
    {
        $subject = 'ddddd';
        $body = 'dfdsfsdf';
        $to = 'mueedsajjad@gmail.com';
        Mail::raw($body, function ($message) use ($to, $subject) {
            $message->to($to);
            $message->subject($subject);
        });
    }

    public function enrollmentSubmit(Request $request)
    {
        $full_name = $request->full_name;
        $email = $request->email;
        $phone = $request->phone;
        $program_id = $request->program_id;
        $programDetails = Program::find($program_id);
        $language = $request->language;
        $successMsg = 'Enrollment Sent Successfully';

        if ($language == 'ar') {
            $successMsg = 'التسجيل تم بنجاح';
        }

        try {
            ProgramEnrollment::create([
                'full_name' => $full_name,
                'email' => $email,
                'phone' => $phone,
                'program_id' => $program_id,
                'program_name' => $programDetails->name,
            ]);
            return ['message' =>  $successMsg ];
        } catch (Exception $e) {
            return ['message' => 'Enrollment Failed with :' . $e->getMessage() ];
        }
    }

    public function askUsSubmit(Request $request)
    {
        $full_name = $request->full_name;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;
        $language = $request->language;
        $successMsg = 'Query Sent Successfully';

        if ($language == 'ar') {
            $successMsg = 'تم إرسال الاستفسار بنجاح';
        }

        try {
            AskUs::create([
                'full_name' => $full_name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
            ]);
            $data = [
                'name' => $full_name,
                'email' => $email,
                'phone' => $phone,
                'message2' => $message,
            ];

            Mail::send('ask-us', $data, function ($SuccessMessage) {
                $SuccessMessage->to('info@myclinic.com.sa', 'MyClinic');
            });


            return ['message' =>  $successMsg ];
        } catch (Exception $e) {
            return ['message' => 'Enrollment Failed with :' . $e->getMessage() ];
        }
    }


    public function changeToLanguage($language)
    {
        $previousUrl = URL::previous();
        $previousUrl = explode('/', $previousUrl);
        $previousUrl =  array_slice($previousUrl, 3);
        $previousUrl = array_diff($previousUrl, ["myclinic"]);
        $previousUrl = array_diff($previousUrl, ["ar"]);
        $newRoute = implode('/', $previousUrl);
        if ($language == 'ar') {
            $newRoute = $language . '/' . $newRoute;
        }

        return redirect(url($newRoute));
    }

    public function careerRequest(Request $request)
    {
         // Define validation rules
         $rules = [
            // 'g-recaptcha-token' => 'required',
            // Add other validation rules here
        ];

        // Create a Validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            // Throw an exception if validation fails
            throw new ValidationException($validator);
        }

         $secret = '6LdN9DwqAAAAAPkF2ZCwr_ja9JmBMPmN1f7V7-Qf';

         $response = Http::get('https://www.google.com/recaptcha/api/siteverify', [
             'secret' => $secret,
             'response' => $request['g-recaptcha-token']
         ]);
        
        // Decode the response as JSON
         $responseKeys = $response->json();

        // if (!isset($responseKeys['success']) || $responseKeys['success'] !== true) {
        //     // CAPTCHA verification failed
        //     return ['message' => '<p style="color:white;background-color:red">Enrollment Failed with: CAPTCHA verification failed</p>'];
        // }

        $first_name = $request->first_name;
        $last_name = $request->last_name;

        $education = $request->education;
        $years_of_exp = $request->years_of_exp;
        $current_residence = $request->current_residence;
        $job_category = $request->job_category;
        $nationality = $request->nationality;
        $gender = $request->gender;
        $email = $request->email;
        $phone = $request->countryCode . $request->phone;
        $language = $request->language;
        $city_of_employment = $request->city_of_employment;
        $contract_type = $request->contract_type;


        $successMsg = 'Query Sent Successfully';

        if ($language == 'ar') {
            $successMsg = 'تم إرسال الاستفسار بنجاح';
        }

        try {
            $alreadyExist = Career::where('phone',$phone)->where('email',$email)->first();
            if($alreadyExist){
                return ['message' => '<p style="color:white;background-color:red">Request already exist with this email and phone</p>'];
            }


            $model = Career::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'education' => $education,
                'years_of_exp' => $years_of_exp,
                'current_residence' => $current_residence,
                'job_category' => $job_category,
                'nationality' => $nationality,
                'gender' => $gender,
                'email' => $email,
                'phone' => $phone,
                'contract_type' => $contract_type,
                'city_of_employment' => $city_of_employment
            ]);
            $model->file = $request->file('file');
            $model->license = $request->file('license');
            $model->education_certificate = $request->file('education_certificate');
            $model->exp_certificate = $request->file('exp_certificate');
            $model->additional_certificate = $request->file('additional_certificate');
            $model->save();

            $model2 = Career::find($model->id);
            $filepath = new ModelsFile();
            $resume = $license = $education_certificate = $additional_certificate = $exp_certificate = '';

            if ($model2->file) {
                $resume = $filepath->getPath($model2->file);
                $resume = explode('//', $resume);
                $resume = json_decode($resume[2], true);
                $resume = $resume['path'];
                $resume = explode('storage/app/',$resume);
                $resume = Storage::path($resume[1]);
            }

            if ($model2->license) {
                $license = $filepath->getPath($model2->license);
                $license = explode('//', $license);
                $license = json_decode($license[2], true);
                $license = $license['path'];
                $license = explode('storage/app/',$license);
                $license = Storage::path($license[1]);
            }


            if ($model2->education_certificate) {

                $education_certificate = $filepath->getPath($model2->education_certificate);
                $education_certificate = explode('//', $education_certificate);
                $education_certificate = json_decode($education_certificate[2], true);
                $education_certificate = $education_certificate['path'];
                $education_certificate = explode('storage/app/',$education_certificate);
                $education_certificate = Storage::path($education_certificate[1]);
            }



            if ($model2->exp_certificate) {

                $exp_certificate = $filepath->getPath($model2->exp_certificate);
                $exp_certificate = explode('//', $exp_certificate);
                $exp_certificate = json_decode($exp_certificate[2], true);
                $exp_certificate = $exp_certificate['path'];
                $exp_certificate = explode('storage/app/',$exp_certificate);
                $exp_certificate = Storage::path($exp_certificate[1]);
            }


            if ($model2->additional_certificate) {

                $additional_certificate = $filepath->getPath($model2->additional_certificate);
                $additional_certificate = explode('//', $additional_certificate);
                $additional_certificate = json_decode($additional_certificate[2], true);
                $additional_certificate = $additional_certificate['path'];
                $additional_certificate = explode('storage/app/',$additional_certificate);
                $additional_certificate = Storage::path($additional_certificate[1]);
            }




            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'education' => $education,
                'years_of_exp' => $years_of_exp,
                'current_residence' => $current_residence,
                'job_category' => $job_category,
                'nationality' => $nationality,
                'gender' => $gender,
                'email' => $email,
                'phone' => $phone,
                'contract_type' => $contract_type,
                'city_of_employment' => $city_of_employment,
               

            ];

            $files = [
                'resume' => $resume,
                'license' => $license,
                'education_certificate' => $education_certificate,
                'exp_certificate' => $exp_certificate,
                'additional_certificate' => $additional_certificate
            ];



            Mail::send('career-mail', $data, function ($SuccessMessage) use($files) {
                $SuccessMessage->to('career@myclinic.com.sa', 'MyClinic');
                if (isset($files['resume']) && $files['resume']) {
                    $SuccessMessage->attach($files['resume']);
                }
                if (isset($files['license']) && $files['license']) {
                    $SuccessMessage->attach($files['license']);
                }
                if (isset($files['education_certificate']) && $files['education_certificate']) {
                    $SuccessMessage->attach($files['education_certificate']);
                }
                if (isset($files['exp_certificate']) && $files['exp_certificate']) {
                    $SuccessMessage->attach($files['exp_certificate']);
                }
                if (isset($files['additional_certificate']) && $files['additional_certificate']) {
                    $SuccessMessage->attach($files['additional_certificate']);
                }

            });


            return ['message' => '<p style="color:white;background-color:green">' . $successMsg . '</p>'];
   
        } catch (Exception $e) {
            return ['message' => '<p style="color:white;background-color:red">Enrollment Failed with :' . $e->getMessage() . '</p>'];
        }
    }

    public function getLocation(Request $request){
        $longitude = $request->query('longitude');
        $latitude = $request->query('latitude');

        $locations = [
            '1' => [
                'lat_min' => 21.5857,
                'lat_max' => 21.6217,
                'lon_min' => 39.1094,
                'lon_max' => 39.1501
            ],
            '2' => [
                'lat_min' => 21.5590,
                'lat_max' => 21.5925,
                'lon_min' => 39.1925,
                'lon_max' => 39.2330
            ],
            '3' => [
                'lat_min' => 21.5210,
                'lat_max' => 21.5435,
                'lon_min' => 39.1785,
                'lon_max' => 39.2100
            ],
            '4' => [
                'lat_max' => 25.161993,
                'lat_min' => 24.388764,
                'lon_min' =>  46.220637,
                'lon_max' =>  47.486904
            ]
        ];

        $locationName = null;
        foreach ($locations as $name => $bounds) {
            if (
                $latitude >= $bounds['lat_min'] && $latitude <= $bounds['lat_max'] &&
                $longitude >= $bounds['lon_min'] && $longitude <= $bounds['lon_max']
            ) {
                $locationName = $name;
                break;
            }
        }
    
        if ($locationName) {
            return response()->json(['location' => $locationName]);
        } else {
            return response()->json(['location' => 1]);
        }


    }

    public function getDoctorUrl(Request $request)
    {
        // Find the doctor based on 'doctor_app_id'
        $doctor = Doctor::where('doctor_app_id', $request->input('doctor_app_id'))->first();

        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        // Construct the URL using the doctor's ID
        $url = "/doctor-detail/" . $doctor->id;

        // Return the doctor's name, specialties, and URL in the response
        return response()->json([
            'url' => $url,
            'name' => $doctor->designation . $doctor->name, 
            'Ar_name' => $doctor->designation_ar . $doctor->name_ar,
            'specialties' => $doctor->specialty_desc,
        ], 200);
    }

}
