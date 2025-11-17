<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class UserController extends Controller
{

    public function login(LoginUserRequest $request)
    {
        //Eltároljuk az adatokat változókba
        $email = $request->input(('email'));
        $password = $request->input(('password'));

        //Az email alapján megkeressük a usert
        $user = User::where('email', $email)->first();

        //Stimmel-e az email és a jelszó?
        if (!$user || !Hash::check($password, $password ? $user->password : '')) {
            return response()->json([
                'message' => 'invalid email or password'
            ], 401);
        }

        //Jó az email és a jelszó
        //Kitöröljük az esetleges tokenjeit
        //$user->tokens()->delete();

        //itt adjuk az új tokent időkorlát nélkül
        //$user->token = $user->createToken('access')->plainTextToken;

        //Lejárati idővel
        $expirationTime = Carbon::now()->addSeconds(20);
        $name = "20sec";
        // $expirationTime = Carbon::now()->addMinutes(30);
        // $name ="30min";
        // $expirationTime = Carbon::now()->addHours(4);;
        // $name ="4hours";
        // $expirationTime = Carbon::now()->addDays(1);
        // $name ="1day";
        $abilities = ['*'];

        $user->token = $user->createToken(
            $name,
            $abilities,
            $expirationTime
        )->plainTextToken;

        //visszaadjuk a usert, ami a tokent is tartalmazni fogja
        $data = [
            'message' => 'ok',
            'data' => $user
        ];
        $status = 200;

        //visszaadjuk a usert, ami a tokent is tartalmazni fogja
        return response()->json($data, $status, options: JSON_UNESCAPED_UNICODE);
    }

    public function logout(Request $request)
    {
        // Minden tokent töröl (en nem jó, mert egy másik bejelntkezést is kivégez)
        //---------------------
        // // Az $request->user() segítségével hozzáférünk a bejelentkezett felhasználóhoz
        // $user = $request->user();

        // // Töröljük a felhasználó összes tokenjét
        // $user->tokens()->delete();

        // return response()->json(['message' => 'Successfully logged out']);


        //Egy mási módszer
        // Megkeresi a tokent és törli ---------------------
        $token = $request->bearerToken(); // Kivonjuk a bearer tokent a kérésből

        // Megkeressük a token modellt
        $personalAccessToken = PersonalAccessToken::findToken($token);

        if ($personalAccessToken) {
            $personalAccessToken->delete();
            $data = [
                'message' => 'ok',
                'data' => []
            ];
        } else {
            $data = [
                'message' => 'Token not found',
                'data' => []
            ];
        }
        return response()->json($data, options: JSON_UNESCAPED_UNICODE);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
