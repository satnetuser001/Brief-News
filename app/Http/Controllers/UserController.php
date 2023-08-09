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

    /**
     * Controller settings
     */
    protected $profilesPerPage = 15;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin')->only(['allProfiles']);
        //$this->middleware('isNotRoot')->only('editUserProfile', 'editUserProfile', ...); //it's need to do
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
    public function updateMyProfile(Request $request, User $user)
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

        //edited user data validation
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

    /**
     * Show all users profiles to the admin.
     */
    public function allProfiles()
    {
        $context = User::latest('id')->paginate($this->profilesPerPage);

        return view('users.allProfiles', ['context' => $context]);
    }

    /**
     * Show the user profile to the admin.
     */
    public function editUserProfile(User $user)
    {
        $user->load('rubricsCombination');
        return view('users.editUserProfile', ['context' => $user]);
    }

    /**
     * Update user data in DB.
     */
    public function updateUserProfile(Request $request, User $user)
    {
        //Validation rules and messages
        define('VALIDATOR_RULS', ['arrRubricsCombination' => "required_without_all:arrRubricsCombination.*",
                                'arrLocaleCombination' => "required_without_all:arrLocaleCombination.*",
                                'role' => 'required|in:root,admin,writer,reader',
                                'status' => 'required|in:active,ban',
                                'name' => 'required|max:255',
                                'surname' => 'required|max:255',
                                'nickname' => 'required|max:255',
                                'email' => 'required|email|max:255',
                                'newPassword' => $request->input('editPassword') ? 'required|min:4|max:255' : 'size:0',
                                ]
                );
        define('VALIDATOR_MESSAGES', ['arrRubricsCombination' => 'Выберете хотябы одну рубрику',
                                    'arrLocaleCombination' => 'Выберете хотябы одну локаль',
                                    'role' => 'Несовпадение значения при выборе Роли, сообщите Администратору об ошибке в работе сайта',
                                    'status' => 'Несовпадение значения при выборе Статуса, сообщите Администратору об ошибке в работе сайта',
                                    'email.required' => 'Email не должен быть пустым',
                                    'name.required' => 'Имя не должно быть пустым',
                                    'name.max' => 'Имя не должно содержать больше 255 символов',
                                    'surname.required' => 'Фамилия не должна быть пустой',
                                    'surname.max' => 'Фамилия не должна содержать больше 255 символов',
                                    'nickname.required' => 'Псевдоним не должен быть пустым',
                                    'nickname.max' => 'Псевдоним не должен содержать больше 255 символов',
                                    'email.email' => 'Неверный формат адреса электронной почты',
                                    'email.max' => 'Email не должен содержать больше 255 символов',
                                    'newPassword.required' => 'Новый пароль не должен быть пустым',
                                    'newPassword.min' => 'Новый пароль не должен содержать менее 4 символов',
                                    'newPassword.max' => 'Новый пароль не должен содержать больше 255 символов',
                                    'newPassword.size' => 'Без галочки "Изменить пароль" поле должено быть пустым',
                                        ]
                );

        //edited user data validation
        $validated = $request->validate(VALIDATOR_RULS, VALIDATOR_MESSAGES);

        //'set root role' selector hack protection
        if ($validated['role'] == 'root' and $user->role != 'root') {
            return response('we will arrest you!!!');
            //Of course, it is for fun. Here need to throw an exception. It will be done in the future.
        }

        //define rubrics combination id of edited user
        $idRubricsCombination = $this->idRubricsCombination(
                                            $validated['arrRubricsCombination'],
                                            $validated['arrLocaleCombination'],
                                );

        //add edit user data to the object
        $user->fill(['rubrics_combination_id' => $idRubricsCombination,
                     'role' => $validated['role'],
                     'status' => $validated['status'],
                     'name' => $validated['name'],
                     'surname' => $validated['surname'],
                     'nickname' => $validated['nickname'],
                     'email' => $validated['email'],
                    ]);
            //if the password is changed
        if ($request->editPassword == true) {
            $user->fill(['password' => Hash::make($validated['newPassword'])]);
        }
            //newly appointed admin can have only active status
        if ($validated['role'] == "admin") {
            $user->fill(['status' => 'active']);
        }

        $user->save();
        return redirect()->route('users.allProfiles');
    }
    //return view('test', ['context' => $user->toArray()]);
}