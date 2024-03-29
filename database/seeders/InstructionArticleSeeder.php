<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class InstructionArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create(['user_id' => 2,
                        'rubrics_combination_id' => 256,
                        'header' => "Нажми на меня! Как работает это веб-приложение.",
                        'body' => "Brief News -  веб-приложение новостей в кратком и беспристрастном изложении со ссылками на источники.

                                    На Главной странице отображены заголовки тестовых статей. Нажав на любой заголовок Вы увидите: саму статью, ссылки на источники и псевдоним автора. Свернуть статью можно нажав ещё раз на её заголовок или кнопкой \"Свернуть\" внизу статьи.

                                    Каждая статья принадлежит к одной или нескольким рубрикам (Политика, Экономика, Наука, Технологии, Спорт, Остальные) и локали (Мировые, Локальные). При помощи \"Панели сортировки статей по рубрикам и локали\" можно отобразить только интересующие пользователя статьи, например: Наука и Технологи в Мире.

                                    В веб-приложении реализовано разграничения прав пользователей при помощи библиотеки Laravel/ui и политик Laravel:

                                    Неаутентифицированный - может читать статьи и использовать \"Панелью сортировки статей по рубрикам и локали\", которая запоминает выбранные пункты до закрытия веб-приложения, аутентифицироваться или зарегистрироваться.

                                    Читатель (Reader) - может изменить некоторые данные своего профиля: Email, Имя, Фамилию, Псевдоним, Пароль и выбрать сочетание Рубрик и Локали отображаемых при аутентификации.

                                    Писатель (Writer) - может создать статью на соответствующей странице и редактировать только свои статьи, на \"Главной\" странице статьи текущего писателя имеют кнопку \"Редактировать\", а на странице \"Мои статьи\" отображаются только статьи текущего писателя.

                                    Администратор (Admin) - может создать новый профиль на соответствующей странице, редактировать любой профиль изменяя роль (Admin, Writer, Reader), статус (Активен, Бан), Имя, Фамилию, Псевдоним, Email, Пароль, пользовательские Рубрики и Локали, удалять профиль (Soft delete), восстанавливать удаленные профили; создавать, редактировать, удалять (Soft delete) и восстанавливать любую статью; из статьи по псевдониму автора переходить на страницу профиля автора.

                                    root - первый Администратор веб-приложения, может изменить данные своего профиля: Имя, Фамилию, Псевдоним, Email, Пароль и выбрать сочетание Рубрик и Локали отображаемых при аутентификации; не подлежит смене роли, статуса, удалению; не подлежит редактированию другими пользователями.

                                    Бан - писатель с таким статусом не может создавать новые статьи.
                                    Удаленный пользователь - не может аутентифицироваться в веб-приложении и создать новый аккаунт с таким-же Email.

                                    Протестировать работу веб-приложения Вы можете аутентифицировавшись пользователями с разными ролями:

                                    Читатель:
                                    login: reader1@gmail.com
                                    password: 1077

                                    Писатель (Активен):
                                    login c: writer1@gmail.com
                                    login по: writer200@gmail.com
                                    password: 1077

                                    Писатель (Бан):
                                    login: bannedWriter1@gmail.com
                                    password: 1077

                                    Администратор:
                                    login: admin1@gmail.com
                                    password: 1077

                                    root:
                                    login: root@gmail.com
                                    password: 1077",
                        'created_at' => '2038-01-19 00:00:00',
                        'updated_at' => '2038-01-19 00:00:00',
        ]);
    }
}