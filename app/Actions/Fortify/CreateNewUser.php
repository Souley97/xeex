<?php

namespace App\Actions\Fortify;

use App\Models\Referral;
use App\Models\Roles;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:13'],
            'points' => ['', 'integre'],
            'payment' => ['', 'string', 'max:20'],

            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ])->validate();
        // $referralCode = Str::random(6);
        //       // Assurez-vous qu'il n'y a pas de doublons
        //       while (Referral::where('code', $referralCode)->exists()) {
        //         $referralCode = Str::random(6);
        //     }
        //     Referral::create([
        //         'user_id' => $user->id,
        //         'code' => $referralCode,
        //     ]);


        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'points' => 0,
                'payment' => 'Wave',
                'phone' => $input['phone'],


            ]), function (User $user) {
                $this->createTeam($user);

                // roles
                $role = Roles::select('id')->where('name', 'User')->first();
                $user->roles()->attach($role);
                //                 $token = $user->createToken('NomDeVotreClient')->plainTextToken;
                // $user->tokens()->save($token);
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Jetstream',
                ]);
            });
        });
    }

    protected function createReferral(User $user): void
    {
        $referralCode = Str::random(6);
        //       // Assurez-vous qu'il n'y a pas de doublons
        while (Referral::where('code', $referralCode)->exists()) {
            $referralCode = Str::random(6);
        }
        Referral::create([
            'user_id' => $user->id,
            'code' => $referralCode,
        ]);
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
