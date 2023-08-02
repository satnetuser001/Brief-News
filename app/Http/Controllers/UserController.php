<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Traits\IdRubricsCombination;

/**
 * This controller is responsible for user settings.
 */
class UserController extends Controller
{
    use IdRubricsCombination;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the 'My profile' page of the user
     */
    public function myProfile()
    {
        $objUser = User::with('rubricsCombination')->find(Auth::id());
        return view('users.myProfile', ['context' => $objUser]);
    }

    /**
     * Update user in DB.
     */
    public function update(Request $request, User $user)
    {
        //Validation rules and messages
        define('VALIDATOR_RULS', ['arrRubricsCombination' => "required_without_all:arrRubricsCombination.*",
                                'arrLocaleCombination' => "required_without_all:arrLocaleCombination.*",
                                'email' => 'required|email|max:255',
                                'name' => 'required|max:255',
                                'surname' => 'required|max:255',
                                'nickname' => 'required|max:255',
                                ]
                );
        define('VALIDATOR_MESSAGES', ['arrRubricsCombination' => 'Выберете хотябы одну рубрику',
                                    'arrLocaleCombination' => 'Выберете хотябы одну локаль',
                                    'email.required' => 'Email не должен быть пустым',
                                    'email.email' => 'Неверный формат адреса электронной почты',
                                    'email.max' => 'Email не должен содержать больше 255 символов',
                                    'name.required' => 'Имя не должно быть пустым',
                                    'name.max' => 'Имя не должно содержать больше 255 символов',
                                    'surname.required' => 'Фамилия не должна быть пустой',
                                    'surname.max' => 'Фамилия не должна содержать больше 255 символов',
                                    'nickname.required' => 'Псевдоним не должен быть пустым',
                                    'nickname.max' => 'Псевдоним не должен содержать больше 255 символов',
                                        ]
                );

        //user data validation
        $validated = $request->validate(VALIDATOR_RULS, VALIDATOR_MESSAGES);

        //define rubrics combination id of edited user
        $idRubricsCombination = $this->idRubricsCombination(
                                            $validated['arrRubricsCombination'],
                                            $validated['arrLocaleCombination'],
                                );

        //save edited user
        $user->fill(['rubrics_combination_id' => $idRubricsCombination,
                     'email' => $validated['email'],
                     'name' => $validated['name'],
                     'surname' => $validated['surname'],
                     'nickname' => $validated['nickname'],
                    ]);
        $user->save();

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the password.
     */
    public function editPassword()
    {
        $objUser = Auth::user();
        return view('users.editPassword', ['context' => $objUser]);
    }

    /**
     * Update the password in DB.
     */
    public function updatePassword(Request $request, User $user)
    {

        //Validation rules and messages
        define('VALIDATOR_RULS', ['currentPassword' => 'required',
                                'newPassword' => 'required|min:8|max:255',
                                'сonfirmNewPassword' => 'same:newPassword',
                                ]
                );
        define('VALIDATOR_MESSAGES', ['currentPassword' => 'Текущий пароль не должен быть пустым',
                                    'newPassword.required' => 'Новый пароль не должен быть пустым',
                                    'newPassword.min' => 'Новый пароль не должен содержать менее 8 символов',
                                    'newPassword.max' => 'Новый пароль не должен содержать больше 255 символов',
                                    'сonfirmNewPassword' => 'Повторно введенный пароль отличается от нового пароля',
                                    ]);

        //edited data validation
        $validated = $request->validate(VALIDATOR_RULS, VALIDATOR_MESSAGES);

        //if the current password doesn't match
        if (!Hash::check($validated['currentPassword'], $user->password)) {
            return redirect()->route('users.editPassword')->
                    withErrors(['currentPassword' => 'Текущий пароль введен не верно']);
        
        //save new user password
        } else {
            $user->fill(['password' => Hash::make($validated['newPassword'])]);
            $user->save();

            return redirect()->route('users.myProfile');
        }
    }
}