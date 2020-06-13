@extends('layouts.app')

@section('content')
<div class="col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
    <div class="about">
        <img class="img-fluid" src="storage/images/cheromoretz-main.jpg" alt="Клуб-Чероморец">
        <p>
            Клуб по спортна акробатика и спортна гимнастика "Черноморец" е създаден през 2017 година.
            Вече няколко години треньорите на клуба, работят за популяризирането на гимнастическите спортове
            в град Бургас.
        </p>
        <p>
            Състезателите на клуба имат завоювани множество призови места от държавни първенства и турнири
            по спортна акробатика и гимнастика.
        </p>
        <p>
            Клуба е организатор и на Международен турнир по акробатика "Acro Cup Burgas", който се организира
            всяка година в град Бургас, съвместно с Община Бургас и Българска Федерация по Спортна акробатика.
        </p>
    </div>
    <div class="team">
        <div class="trainer">
            <div class="trainer-photo">
                <img class="img-fluid" src="storage/images/Atanas Plamenov.jpg" alt="Атанас Пламенов">
            </div>
            <p class="trainer-bio">
                Атанас Пламенов е треньор по акробатика от 2014 година. В ранна детска възраст тренира спортна гимнастика в град Карнобат. По-късно , като ученик в Спортно училище "Юрий Гагарин" , започва да тренира акробатика. Става състезател на КСА "Лукойл Нефтохимик" Бургас с треньори Гергана Денева и Радослав Александров. Завършва Спортно училище с профил Акробатика , а след това получава бакалавърска степен "Учител по Физическо възпитание и спорт и треньор по акробатика" в Национална Спортна Академия "Васил Левски" град София. Записва магистърска степен в същата акдемия - Спорт за високи постижения с профил Спортна гимнастика. В началото на 2018г. създава КГС "Черноморец" , като става негов председател и старши треньор.
            </p>
        </div>
        <div class="trainer">
            <div class="trainer-photo">
                <img class="img-fluid" src="storage/images/Monika Atanasova.jpg" alt="Моника Атанасова">
            </div>
            <p class="trainer-bio">
                Моника Атанасова е треньор по спортна акробатика от 2014 година. Състезателната и дейност започва в ранна детска възраст в КСА "Лукойл Нефтохимик" Бургас , с треньори Кристина Михова и  Надежда Цонева. Завършва Спортно училище "Юрий Гагарин" град Бургас с профил Акробатика. Има бакалавърска степен "Треньор по Акробатика" в Национална Спортна Академия " Васил Левски" София.
            </p>
        </div>
        <div class="trainer">
            <div class="trainer-photo">
                <img class="img-fluid" src="storage/images/Plamena Zaikova.jpg" alt="Пламена Зайкова">
            </div>
            <p class="trainer-bio">
                Пламена Зайкова е хореограф в КГС "Черноморец Бургас". Била е състезателка по акробатика в "Тунджа" Ямбол. Нейн треньор е бил Димитър Плочев. Завършва спортно училище в град Ямбол, а висшето си образование получава в Пловдивски Университет "Паисий Хилендарски" , специалност "Учител по Физическо възпитание и спорт". Професионално се развива в танцовото изкуство и натрупва сериозен опит в спортната хореография. Работи с всички състезатели в Клуб по гимнастически спортове "Черноморец Бургас".
            </p>
        </div>
    <!--         <div class="trainer">
            <div class="trainer-photo">
                <img class="img-fluid" src="storage/images/Plamena Zaikova.jpg" alt="Мария Кьосева">
            </div>
            <p class="trainer-bio">
                Пламена Зайкова е хореограф в КГС "Черноморец Бургас". Била е състезателка по акробатика в "Тунджа" Ямбол. Нейн треньор е бил Димитър Плочев. Завършва спортно училище в град Ямбол, а висшето си образование получава в Пловдивски Университет "Паисий Хилендарски" , специалност "Учител по Физическо възпитание и спорт". Професионално се развива в танцовото изкуство и натрупва сериозен опит в спортната хореография. Работи с всички състезатели в Клуб по гимнастически спортове "Черноморец Бургас".
            </p>
        </div>    -->
    </div>
    <div class="schedule my-3 py-3">
        <h2>График</h2>
        <div class="text-center">
 {{--              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="competitors" name="schedule" class="custom-control-input">
                <label class="custom-control-label" for="competitors">Състезатели</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="preparatory" name="schedule" class="custom-control-input">
                <label class="custom-control-label" for="preparatory">Начинаещи</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="school" name="schedule" class="custom-control-input">
                <label class="custom-control-label" for="school">Спортно училище</label>
            </div> --}}
            <select class="custom-select mb-2">
                <option value="competitors" selected>Състезатели</option>
                <option value="preparatory">Начинаещи</option>
                <option value="school">Спортно училище</option>
            </select>
        </div>
        <div class="competitors schedule-group">
            <div class="day">
                <h5>Понеделник</h5>
                <p>18:00 - 20:00</p>
            </div>
            <div class="day">
                <h5>Вторник</h5>
                <p>18:00 - 20:00</p>
            </div>
            <div class="day">
                <h5>Сряда</h5>
                <p>18:00 - 20:00</p>
            </div>
            <div class="day">
                <h5>Четвъртък</h5>
                <p>18:00 - 20:00</p>
            </div>
            <div class="day">
                <h5>Петък</h5>
                <p>18:00 - 20:00</p>
            </div>
        </div>
        <div class="preparatory schedule-group">
            <div class="day">
                <h5>Понеделник</h5>
                <p>18:30 - 20:00</p>
            </div>
            <div class="day">
            </div>
            <div class="day">
                <h5>Сряда</h5>
                <p>18:30 - 20:00</p>
            </div>
            <div class="day">
            </div>
            <div class="day">
                <h5>Петък</h5>
                <p>18:30 - 20:00</p>
            </div>
        </div>
        <div class="school schedule-group">
            <div class="day">
                <h5>Понеделник</h5>
                <p>10:30 - 12:00</p>
                <p>16:30 - 18:00</p>
            </div>
            <div class="day">
                <h5>Вторник</h5>
                <p>10:30 - 12:00</p>
                <p>16:30 - 18:00</p>
            </div>
            <div class="day">
                <h5>Сряда</h5>
                <p>10:30 - 12:00</p>
                <p>16:30 - 18:00</p>
            </div>
            <div class="day">
                <h5>Четвъртък</h5>
                <p>10:30 - 12:00</p>
                <p>16:30 - 18:00</p>
            </div>
            <div class="day">
                <h5>Петък</h5>
                <p>10:30 - 12:00</p>
                <p>16:30 - 18:00</p>
            </div>
        </div>
    </div>
    <div class="contacts my-3 py-3">
        <h2 class="pt-3 text-center">Контакти</h2>
        <div id="google-maps">
            <a href="https://www.google.com/maps/place/%D0%A1%D0%BF%D0%BE%D1%80%D1%82%D0%BD%D0%B0+%D0%B7%D0%B0%D0%BB%D0%B0+%D0%9D%D0%B5%D1%84%D1%82%D0%BE%D1%85%D0%B8%D0%BC%D0%B8%D0%BA/@42.5122628,27.4662655,17z/data=!3m1!4b1!4m5!3m4!1s0x40a694846848bdbf:0xc44b47b0330a47d6!8m2!3d42.5122628!4d27.4684542" target="_blank">
                <img class="img-fluid" src="storage/images/google_maps.jpg" alt="Клуб-Чероморец адрес">
            </a>
        </div>
        <div class="contacts-information">
            <div>Е-поща: chernomoretz_gym@abv.bg</div>
            <div>Телефон: <a href="tel:0896787919">0896787919</a> / <a href="tel:0888337777">0888337777</a></div>
            <div>Адрес: Спортна зала "Нефтохимик"</div>
        </div>
    </div>
    <div class="footer">
        <div class="partners my-3 py-3">
            <h2>Партньори</h2>
            <img class="img-fluid" src="storage/images/BFG.jpg" alt="Българска федерация по спортна гимнастика">
            <img class="img-fluid" src="storage/images/obshtina burgas.jpg" alt="Община Бургас">
            <img class="img-fluid" src="storage/images//logo-BFSA.jpg" alt="Българска федерация по спортна акробатика">
            <img class="img-fluid" src="storage/images/ministerstvo na mladejta i sporta.jpg" alt="Министерството на младежтта и спорта">
            <img class="img-fluid" src="storage/images/digital.jpg" alt="Копирен център дигитал">
        </div>
        <div class="rights">&#9400;opyrights 2017</div>
    </div>
</div>
@endsection
