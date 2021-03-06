<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
class UserController extends Controller 
{
public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            
            //$success['name'] = $user->name;
            //$success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $userA = array(
            'name'=>$user->name,  
            'token'=>$user->createToken('MyApp')-> accessToken,
            );
            $success['error'] = false;
            $success['message'] = "Successfully Authenticated";
            $success['user'] = $userA;
            return response()->json($success, $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
$input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input);

        $userA = array(
            'name'=>$user->name,  
            'token'=>$user->createToken('MyApp')-> accessToken,
            );

        $success['error'] = false;
        $success['message'] = 'User registered successfully';
        //$success['token'] =  $user->createToken('MyAppaccessToken; 
        $success['user'] =  $userA;
        //return json_encode($success);
        return response()->json($success, $this-> successStatus); 
    }
/** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}