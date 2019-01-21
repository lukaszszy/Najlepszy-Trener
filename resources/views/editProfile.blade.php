<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{asset('css/css/buttons/bootstrap.min.css')}}" type="text/css"/>
    <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/css/fontello.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/editProfile.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/cropper/jquery.Jcrop.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/lightbox/lightbox.min.css')}}" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('js/profile/lightbox/lightbox-plus-jquery.min.js')}}"></script>
    <script src="{{asset('js/profile/jquery.scrollTo.min.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <script src="{{asset('js/profile/jquery.Jcrop.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" rel="stylesheet">
</head>

<body>
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<header>
    <nav>
        <div class="container-fluid" id="logBar">
            <div class="logo">
            </div>
            <span>
                
                <a href="/profiles/{{ Auth::user()->id }}"><i class="fas fa-user"
                                                              style='color:#5f5d5d; margin-right:5px;'></i> Profil</a>
                <a href="/editProfile"><i class="far fa-edit" style='color:#5f5d5d; margin-right:5px;'></i>Edytuj profil</a>
                <button onclick="location.href='/logout'" style="font-size:16px;" type="button" class="btn blue-button">Wyloguj się</button>
                </span>
        </div>
    </nav>
</header>

<main>
    <article>
        <div class="container-fluid edit-profile-content">

            <div class="leftColumn">

                <div class="editProfile-menu">
                    <p><span id="editMenu-option1"
                             class="editMenu-option editMenu-option-checked">Dane podstawowe</span></p>
                    <p><span id="editMenu-option2" class="editMenu-option">Dane szczegółowe</span></p>
                    <p><span id="editMenu-option3" class="editMenu-option">Kalendarz</span></p>
                    <p><span id="editMenu-option4" class="editMenu-option">Galeria zdjęć</span></p>
                    <p><span id="editMenu-option7" class="editMenu-option">Lokalizacja</span></p>
                    <p><span id="editMenu-option5" class="editMenu-option">Zmiana adresu e-mail</span></p>
                    <p><span id="editMenu-option6" class="editMenu-option">Zmiana hasła</span></p>
                </div>

            </div>
            <div class="middleColumn">
                <div class="categories">
                    <div id="basic-edit">
                        <fieldset>


                            <legend>Dane podstawowe</legend>
                            <div style="margin-left: 100px;">
                                <form id="editPrimaryInfo" action='editPrimaryInfo' method='POST'></form>
                                <form id="addCity" action='addCity' method='POST'></form>

                                <p>
                                    <label>
                                        Imię:
                                        <input class="edit-name" form="editPrimaryInfo" name='name' type='text'
                                               placeholder='{{ Auth::user()->name }}' value='{{ Auth::user()->name }}'
                                               pattern="[A-ZĄĘŹŻŚÓĆNŁ][a-ząęźżśóćńł]{2,10}"
                                               title="Pierwsza litera wielka, maksymalnie 11 znaków"
                                               minlength="3" maxlength="11">
                                    </label>
                                </p>

                                <p>
                                    <label>
                                        Nazwisko:
                                        <input class="edit-lastname" form="editPrimaryInfo" name='surname' type='text' placeholder='{{ Auth::user()->surname }}' value='{{ Auth::user()->surname }}' pattern="^[A-ZĄĘŹŻŚÓĆNŁ][a-ząęźżśóćńł]{2,14}$" title="Pierwsza litera wielka, maksymalnie 15 liter" maxlength="3" maxlength="15">

                                    </label>
                                </p>

                                <p>
                                    <label>
                                        Data urodzenia:
                                        <input  class="edit-date" form="editPrimaryInfo" name='bdate' type="date" value='{{ Auth::user()->bdate }}' max='{{ Carbon\Carbon::now()->addYears((-1)*18)->toDateString() }}' min='{{ Carbon\Carbon::now()->addYears((-1)*99)->toDateString() }}'>
                                </label  >

                                </p>

                                <p>
                                    Płeć:
                                    <span style="margin-left:104px;">
                                        <label class="container-radio">
                                        <input id="genderK" style="margin-left: 125px;" form="editPrimaryInfo"
                                               type="radio" name="gender" value="K">
                                        kobieta  <span class="checkmark-radio"></span></label>
                                        
                                        <label class="container-radio">
                                        <input id="genderM" form="editPrimaryInfo" type="radio" name="gender" value="M">    
                                        mężczyzna  <span class="checkmark-radio"></span></label>
                                    </span>
                                </p>
                                <label  >
                                    <p>
                                        Miasto:
                                        <input id="edit-cityy" class="edit-city" form="addCity" name='city' minlength="2" maxlength="40" type="text" pattern="^[A-ZĄĘŹŻŚÓĆNŁ][a-ząęźżśóćńł]+(?:[\s-][a-ząęźżśóćńłA-ZĄĘŹŻŚÓĆNŁ]+)*$" required>
                                        <input form="addCity" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="addCity" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <input class="add-city" type="submit" value="Dodaj" form="addCity">
                                    </p>
                                </label>
                                <div id="citiesContainer"></div>
                                <p>
                                <label>
                                    Telefon: 
                                    <input  class="edit-phone" form="editPrimaryInfo" name='phone' type='tel' value='{{ Auth::user()->phone }}' pattern="^(?:\(?\+?48)?(?:[-\.\(\)\s]*(\d)){9}\)?$" title="Numer w formacie 123-456-789 lub 123456789." minlength="9" maxlength="18">
                                </label>
                                </p>

                                <p>
                                <label>
                                    Instagram: 
                                    <input  class="edit-insta" form="editPrimaryInfo" name='instagram' type='text' value='{{ Auth::user()->instagram }}' pattern="^([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){2,14}))$" title="Nazwa użytkownika powinna zawierac jedynie liczby, litery, znaki: _ i ." minlength ="3" maxlength="15">
                                </label>
                                </p>

                                <p>
                                    <label>
                                        Facebook:
                                        <input class="edit-face" form="editPrimaryInfo" name='facebook' type='text'
                                               placeholder='{{ Auth::user()->facebook }}'
                                               value='{{ Auth::user()->facebook }}' pattern="^[a-z\d\.]{5,}$"
                                               title="Nazwa użytkownika. Minimum 5 znaków">
                                    </label>
                                </p>

                                <p>
                                <label  >
                                    Strona WWW: 
                                    <input class="edit-page"  form="editPrimaryInfo" name='page' type='text' value='{{ Auth::user()->page }}' pattern="^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$" minlength ="4" maxlength="150">
                                </label>
                                </p>


                                <div>
                                    <input form="editPrimaryInfo" type='hidden' name='id'
                                           value='{{ Auth::user()->id }}'/>
                                    <input form="editPrimaryInfo" type='hidden' value='{{ csrf_token() }}'
                                           name='_token'/>
                                    <input class="save-button" type="submit" value="Zapisz" form="editPrimaryInfo">
                                </div>

                                </form>
                            </div>
                        </fieldset>
                    </div>
                    <div id="specific-edit">

                        <form id="editSpecificInfo" action='editSpecificInfo' method='POST'></form>
                        <form id="addCourse" action='addCourse' enctype="multipart/form-data" method='POST'></form>
                        <form id="addUni" action='addUni' method='POST'></form>
                        <form id="addTrainerOffer" action='addTrainerOffer' method='POST'></form>
                        <form id="addTrainersPlace" action='addTrainersPlace' method='POST'></form>

                        <fieldset>
                            <legend>Dane szczegółowe</legend>
                                <p>
                                        <label >
                                        Opis:
                                        <span class="optional">(Opcjonalnie)</span>
                                        <textarea form="editSpecificInfo" class="edit-text" form="editSpecificInfo" name="description" cols="90" rows="10" maxlength="2000" minlength="5" title="Minimalna liczba znaków to 5, a maksymalna 2000 ">{{ Auth::user()->description }}</textarea>                                        <input form="editSpecificInfo" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="editSpecificInfo" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <input class="add-button" type="submit" value="Aktualizuj opis" form="editSpecificInfo" >
                                        </label>
                                </p>
                                <p style="margin-top:45px;">
                                        Dyscypliny:
                                        <div id="dyscypline-list-editprofile" >
                                            <form id='updateDisciplines' action='updateDisciplines' method='POST'>
                                            <div style="width:27%" class="dyscypline-column-editprofile">
                                            </div>
                                            <div class="dyscypline-column-editprofile">
                                            </div>
                                            <div style="width:28%" class="dyscypline-column-editprofile">
                                            </div>
                                            <div style="width:20%" class="dyscypline-column-editprofile">
                                            </div>
                                            <div class="dyscypline-column-editprofile">
                                            </div>
                                            <div style="clear:both;"></div>
                                            <input type='hidden' name='trainer_id' value='{{ Auth::user()->id }}'/>
                                            <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                            <input class="add-button" type="submit" value="Zmień dyscypliny" >
                                            </form>
                                        </div>
                                </p>
                                <br />

                            <br/>

                            <label>
                                Certyfikaty:
                                <br> </br>
                                <span id="show-course">+ Dodaj certyfikat </span> </br>

                                <div id="edit-course">
                                    <p>
                                        Nazwa placówki:
                                        <input placeholder="Podaj nazwę placówki" class="edit-place" form="addCourse"
                                               name='place' type="text" pattern=".{3,}" required
                                               title="Wprowadź co najmniej 3 znaki.">
                                    </p>
                                    <p style="display: inline-block;">
                                        Nazwa kursu:
                                        <input placeholder="Podaj nazwę kursu" class="edit-course" form="addCourse"
                                               name='name' type="text" pattern=".{3,}"
                                               title="Wprowadź co najmniej 3 znaki.">
                                    </p>
                                    <p style="display:inline-block">
                                        Data rozpoczęcia:
                                        <input class="edit-startdate" form="addCourse" name='begin_date' type="date"
                                               max="2018-12-31" min="1900-01-01">
                                    </p>
                                    <p style="margin-left:20px; display:inline-block;">
                                        Data zakończenia:
                                        <input class="edit-enddate" form="addCourse" name='end_date' type="date"
                                               max="2018-12-31" min="1900-01-01">
                                    </p>
                                    <p>
                                        Dodaj załącznik
                                        <input form="addCourse" type="file" name="zalacznik"
                                               accept="image/jpeg,image/gif,image/png,application/pdf">
                                    </p>
                                    <input type='hidden' form="addCourse" name='id' value='{{ Auth::user()->id }}'/>
                                    <input form="addCourse" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                    <div style="margin-bottom: 70px;">
                                        <input class="add-button" type="submit" value="Dodaj" form="addCourse">
                                    </div>


                                </div>
                                <div id="cer-container"></div>
                            </label>

                            <br/>

                            <label>
                                Wykształcenie:
                                <br> </br>
                                <span id="show-uni">+ Dodaj wykształcenie</span></br></br>
                                <div id="edit-uni">
                                    <p>
                                        Nazwa uczelni:
                                        <input class="edit-uni" form="addUni" name='name' type="text" pattern=".{3,}"
                                               required title="Wprowadź co najmniej 3 znaki.">
                                    </p>
                                    <p style="display: inline-block;">
                                        Kierunek:
                                        <input class="edit-spec" form="addUni" name='course' type="text" pattern=".{3,}"
                                               required title="Wprowadź co najmniej 3 znaki.">
                                    </p>
                                    <p style="display: inline-block;">
                                        Tytuł zawodowy:
                                        <input class="edit-title" form="addUni" name='degree' type="text"
                                               pattern=".{3,}" title="Wprowadź co najmniej 3 znaki.">
                                    </p>
                                    <p style="display:inline-block">
                                        Data rozpoczęcia:
                                        <input class="edit-startdate" form="addUni" name='begin_date' type="date"
                                               max="2018-12-31" min="1900-01-01">
                                    </p>
                                    <p style="margin-left:20px; display:inline-block;">
                                        Data zakończenia:
                                        <input class="edit-enddate" form="addUni" name='end_date' type="date"
                                               max="2018-12-31" min="1900-01-01">
                                    </p>
                                    <input type='hidden' form="addUni" name='id' value='{{ Auth::user()->id }}'/>
                                    <input form="addUni" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                    <div style="margin-bottom: 70px;">
                                        <input class="add-button" type="submit" value="Dodaj uczelnię wyższą"
                                               form="addUni">
                                    </div>
                                </div>
                                <div id="uni-container" style="margin-top:50px;"></div>
                            </label>

                            <br/>

                            <label>
                                Cennik:
                                <div>
                                    </br>
                                    <span id="show-price">+ Dodaj cennik</span>
                                    <div id="edit-price">
                                        <p>
                                            Nazwa zajęć:
                                            <input class="edit-lessons" form="addTrainerOffer" name='classes_name'
                                                   type="text" pattern=".{3,}" required
                                                   title="Wprowadź co najmniej 3 znaki.">
                                        </p>
                                        <p style="display:inline-block">
                                            Maksymalna liczba uczestników:
                                            <input class="edit-patric" form="addTrainerOffer" name='numbers_of_members'
                                                   type="number" min='1' max='20' required>
                                        </p>
                                        <p style="margin-left:20px; display:inline-block;">
                                            Cena:
                                            <input class="edit-price" form="addTrainerOffer" name='price' type="number"
                                                   step="0.01">
                                        </p>
                                        <input form="addTrainerOffer" type='hidden' name='id'
                                               value='{{ Auth::user()->id }}'/>
                                        <input form="addTrainerOffer" type='hidden' value='{{ csrf_token() }}'
                                               name='_token'/>
                                        <div style="margin-bottom: 70px;">
                                            <input class="add-button" type="submit" value="Dodaj ofertę do cennika"
                                                   form="addTrainerOffer">
                                        </div>
                                    </div>
                                    <div id="offers-container" style="margin-top:45px;"></div>

                                </div>
                            </label>
                        </fieldset>
                    </div>

                    <div id="calendar-edit">
                        <fieldset>
                            <legend>Mój kalendarz</legend>

                            <form id="addTraining" action='addTraining' method = 'POST'>
                            <br>
                                    <span id="show-loc">+ Dodaj trening</span></br></br>
                                   
                                    <div id="edit-loc" style='display: none; font-size:14px; margin-left: 20px;'>
                                        <p>
                                            Nazwa zajęć:
                                            <input placeholder="Podaj nazwę zajęć..." class="edit-uni" form="addTraining" name='name' type="text" minlength="3" maxlength="45">
                                        </p>
                                        <p style="display: inline-block;">
                                            Miejsce:
                                            <input placeholder="Podaj miejsce zajęć..." class="edit-loc-place" form="addTraining" name='place' type="text" pattern=".{3,}" required minlength="3" maxlength="45">
                                        </p>
                                        <p style="display:inline-block">
                                            Data:
                                            <input class="edit-startdate-loc" form="addTraining" name='date' type="date" max='{{ Carbon\Carbon::now()->addMonths(6)->toDateString() }}' min='{{ Carbon\Carbon::now()->toDateString() }}' required>
                                        </p>
                                        <p style="display:inline-block;margin-left: 10px;"> 
                                            Godzina od:
                                            <input class="edit-time" form="addTraining" name='begin_time' type="time" required>
                                        </p>
                                        <p style="display:inline-block;margin-left: 13px;">
                                            do:
                                            <input class="edit-time" form="addTraining" name='end_time' type="time" required>
                                        </p>
                                        <p style="display:inline-block;">
                                            Maks. liczba osób:
                                            <input class="edit-number" value="1" form="addTraining" name='client_limit' type="number" min="1" max="15" required>
                                        </p>
                                        <p style="display:inline-block;margin-left: 64px;">
                                            Cena zł (1 os.):
                                            <input class="edit-time" placeholder="0" style="width:83px" form="addTraining" name='price' type="number">
                                        </p><br>
                                        <span style="display:inline-block;position: relative;bottom: 182px;
">
                                            Opis:
                                        </span><p style="display:inline-block;"><textarea placeholder="Podaj opis treningu..." style="width:480px; margin-left:100px; border: 1.5px solid #dfdede;" class="edit-text" name="description" cols="90" rows="10" maxlength="500" minlength="5" title="Minimalna liczba znaków to 5, a maksymalna 500 "></textarea>                                        </p>
                                        <p>
                                            Powtórz:
                                            <input style="margin-left: 73px;" class="edit-number" value="0" form="addTraining" name='repeat' type="number" min="0" max="4">
                                            razy
                                        </p>
                                        <input type='hidden' form="addTraining" name='id' value='{{ Auth::user()->id }}'/>
                                        <input form="addTraining" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <div style="margin-bottom: 70px;">
                                        <input class="add-button" type="submit" value="Dodaj trening" style="margin-right:36px" form="addTraining" >
                                        </div>

                                    </div>

                            </form>
                            </br>
                            <h2>Zarządzaj przyszłymi treningami</h2>
                            </br>
                            <!-- training table -->
                            <div id="table-container"></div>
                            </br>
                            <h2>Zakończone treningi</h2>

                                    </br>
                                    <div><form action='deleteOldTrainings' method = 'POST'>
                                        <b style="font-size: 15px;">Usuń zakończone treningi od</b> 
                                        <input style="width: 155px;border: 1px solid lightgrey;border-radius: 5px;" type="date" name='begin_date' value='{{ Carbon\Carbon::now()->addMonths((-1)*3)->toDateString() }}' max='{{ Carbon\Carbon::now()->addDays((-1)*1)->toDateString() }}' min='{{ Carbon\Carbon::now()->addMonths((-1)*3)->toDateString() }}' required>
                                        <b style="font-size: 15px;">do</b>
                                        <input style="width: 155px;border: 1px solid lightgrey;border-radius: 5px;"  type="date" name='end_date' value='{{ Carbon\Carbon::now()->addDays((-1)*1)->toDateString() }}' max='{{ Carbon\Carbon::now()->addDays((-1)*1)->toDateString() }}' min='{{ Carbon\Carbon::now()->addMonths((-1)*3)->addDays(1)->toDateString() }}' required>
                                        <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                        <input style="margin:0px;padding: 0px;padding-left: 2px;border-radius: 7px;padding-right: 2px;width: 80px;height: 35px;margin-bottom: 11px;" class="add-button" type="submit" value="Usuń">
                                    </form></div>
</br>
                                    <div id="table-container2"><</div>


                        </fieldset>

                    </div>


                    <div id="place-edit">
                        <fieldset>
                            <legend>Lokalizacja</legend>


                            <!-- <label>
                                Miejsca treningu:
                                <div>
                                    </br>
                                 
                                    <div style="margin-bottom: 70px;">

                                        <script>
                                            function initMap() {
                                                var address = document.getElementById('locationSearch');
                                                var options = {
                                                        componentRestrictions: {country: "pl"}
                                                    };
                                                var autocomplete = new google.maps.places.Autocomplete(address, options);

                                                autocomplete.addListener('place_changed', function() {
                                                    var place = autocomplete.getPlace();
                                                    document.getElementById('location-name').value = place.name;
                                                    document.getElementById('location-latitude').value = place.geometry.location.lat();
                                                    document.getElementById('location-longitude').value = place.geometry.location.lng();
                                                });
                                            }
                                        </script>
                                        <script  type="text/javascript" async defer
                                                 src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBnYmBavIuXOjKrQflq-_CkuyIrmLpaD1Y&libraries=places&callback=initMap">
                                        </script>
                                    </div>

                                </div>
                            </label> -->


                            <div class="categories-content">
                            <h2>Dodaj lokalizację</h2>
                            <input id="locationSearch" class="place-search" type="text" size="50" />
                            <input form="addTrainersPlace" type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                            <input form="addTrainersPlace" type='hidden' value='{{ csrf_token() }}' name='_token'/>
                            <input id="location-name" name="location-name" form="addTrainersPlace" type='hidden'/>
                            <input id="location-latitude" name="location-latitude" form="addTrainersPlace" type='hidden'/>
                            <input id="location-longitude" name="location-longitude" form="addTrainersPlace" type='hidden'/>
                            <input class="add-button" type="submit" value="Dodaj lokalizację" form="addTrainersPlace">
                            <div id="map" style="    width: 100%; height: 500px;"></div>
                            <script>
                            function initMap() {
                                var options2 = {
                                            types: ['(cities)'],
                                            componentRestrictions: {country: "pl"}
                                        };

                                        let input2 = document.getElementById('edit-cityy');
                                        let autocomplete = new google.maps.places.Autocomplete( document.getElementById('edit-cityy'), options2);
                                var id = window.location.href.substring(window.location.href.lastIndexOf('/') + 1)
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                    responseObject = JSON.parse(xhttp.responseText); 
                                    console.log(responseObject)
                                    }
                                };
                                xhttp.open("GET", 'http://pri.me/api/profiles/'+id, true);
                                xhttp.send();
                                var options = {
                                    zoom: 12,
                                    center: {lat: 52.237049, lng: 21.017532}
                                }
                                var map = new google.maps.Map(
                                    document.getElementById('map'), options);

                                 var marker = new google.maps.Marker({position: options.center,
                                     map: map,
                                     draggable: true});
                                var options2 = {
                                                componentRestrictions: {country: "pl"}
                                            };

                                var searchBox = new google.maps.places.Autocomplete(document.getElementById('locationSearch'), {componentRestrictions: {country: "pl"}})
                                google.maps.event.addListener(searchBox, 'place_changed', function(){
                                    var places = searchBox.getPlace()
                                    console.log(places)
                                    document.getElementById('location-name').value = places.name;
                                    document.getElementById('location-latitude').value = places.geometry.location.lat();
                                    document.getElementById('location-longitude').value = places.geometry.location.lng();
                                    var bounds = new google.maps.LatLngBounds();
                                    // var i, place;

                                    // for(i=0; i < places.length; i++){
                                    //     place = places[i]
                                        console.log(places.geometry.location);
                                        bounds.extend(places.geometry.location);
                                        marker.setPosition(places.geometry.location)
                                    // }

                                    map.fitBounds(bounds);
                                    map.setZoom(15);
                                })
                            }

                            
                            </script>
                             <script async defer
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnYmBavIuXOjKrQflq-_CkuyIrmLpaD1Y&libraries=places&callback=initMap&region=PL">
                            </script>
							
							

                            <h2>Dodane miejsca</h2>
                            <div id="added-places"></div>
                        </div>



                        </fieldset>
                    </div>

                    <div id="gallery-edit">
                        <fieldset>
                            <legend>Galeria zdjęć</legend>
                            <div>
                                <!-- <img style="width:10%;" id="image" src="./css/images/athlete.jpg"> -->
                            </div>


                            <div id="ex2" class="modal" style="max-width: 540px; min-height: 500px;">
                                <form id="profile-pic-choose-form" action='updateProfilePicture' method='POST'>
                                    <span style="font-size:20px; font-weight:900; ">Wybierz zdjęcie profilowe</span>
                                    <div id="profilePicPick">

                                    </div>


                                    <!-- Modal HTML embedded directly into document -->

                                    <div style="margin-top:15px;" id="abc"></div>
                                    <!-- <input  value='Ustaw jako zdjęcie profilowe' name='submit'> -->

                                </form>
                                <button id="setProfilePic" style="position: absolute; bottom: 15px; right: 20px;"
                                        class="submit-b">Dalej
                                </button>
                            </div>


                            <!-- Modal HTML embedded directly into document -->
                            <div id="ex1" class="modal" style="height:600px; width: 800px;">
                                <form id="profile-pic-form" action='addProfilePicture' enctype="multipart/form-data"
                                      method='POST'>
                                    <span style="font-size:20px; font-weight:900; ">Dodaj zdjęcie</span>
                                    <input style="margin-top:20px;" type='file' name='photo_name' id='profile-img'>
                                    <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                    <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>

                                    <!-- Modal HTML embedded directly into document -->

                                    <div style="margin-top:15px;" id="xyz"></div>
                                    <input style="position: absolute; bottom: 15px; right: 20px;" class="submit-b"
                                           type='submit' value='Dodaj zdjęcie profilowe' name='submit'>

                                </form>

                            </div>

                            <div id="ex3" class="modal" style="height:600px; width: 800px;">
                                <form id="profile-pic-form-after" action='#' enctype="multipart/form-data"
                                      method='POST'>
                                    <span style="font-size:20px; font-weight:900; ">Ustaw zdjęcie</span>
                                    <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                    <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>

                                    <!-- Modal HTML embedded directly into document -->

                                    <div style="margin-top:15px;" id="qwerty"></div>
                                    <input form="profile-pic-choose-form" type='hidden' value='{{ csrf_token() }}'
                                           name='_token'/>
                                    <input form="profile-pic-choose-form"
                                           style="position: absolute; bottom: 15px; right: 20px;" class="submit-b"
                                           type='submit' value='Ustaw zdjęcie profilowe' name='submit'>

                                </form>

                            </div>
                            <br>
                            Zdjęcie profilowe
                            <br> <br>
                            <!-- Link to open the modal -->
                            <div style="display:flex; justify-content: center; align-items:center;">
                                <a style="color:#757575; width:20%; display:inline-block; text-align:center;  margin-top: 24px;"
                                   href="#ex1" rel="modal:open">
                                    <div>
                                        <p><i style=" font-size:28px" class="far fa-image"></i></p>
                                        <p>Dodaj zdjęcie profilowe</p>
                                    </div>
                                </a>
                                <a style="color:#757575; width:20%; display:inline-block; text-align:center; margin-top: 24px;"
                                   href="#ex2" rel="modal:open">
                                    <div>
                                        <p><i style=" font-size:28px" class="far fa-images"></i></p>
                                        <p>Wybierz zdjęcie z galerii</p>
                                    </div>
                                </a>
                                <a id="del-profile-pic"
                                   style="cursor:pointer; color:#757575; width:20%; display:inline-block; text-align:center;">
                                    <div>
                                        <p><i style=" font-size:28px" class="far fa-trash-alt"></i></p>
                                        <p>Usuń</p>
                                    </div>
                                </a>
                                <div class="profilePic" style="width:30%; display:inline-block;"></div>
                            </div>

                            <br>
                            <p style="width:100%;">Pozostałe zdjęcia</p><br>
                            <form action='store' enctype="multipart/form-data" method='POST'>
                                <label>Dodaj zdjęcie</label>
                                <input type='file' name='photo_name' id='file'>
                                <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                <input class="submit-b" type='submit' value='Dodaj zdjęcie' name='submit'>

                            </form>
                            <br>
                            <div id="content-gallery" class="gallery-content">

                            </div>

                        </fieldset>
                    </div>

                    <div id="email-edit">

                    <form action='editEmailInfo' method = 'POST'>
                         <fieldset>
                            <legend>Zmiana email</legend>
                            <div style="margin-left: 100px;">
                                <p>
                                <label>
                                        Aktualny adres email: 
                                        <input class="edit-email-actual" name='current_email' type='email' pattern="^[a-zA-Z0-9.!#$%’*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" minlength="5" maxlength="45" required>
                                </label>
                                </p>

                                <p>
                                <label>
                                        Nowy adres email: 
                                        <input class="edit-email" name='new_email' type='email' pattern="^[a-zA-Z0-9.!#$%’*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" minlength="5" maxlength="45" required>
                                </label>
                                </p>

                                    <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                    <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                    <input style="margin-left: 69%;" class="submit-b" type="submit" value="Zmień">
                                    </br>
                                </div>
                            </fieldset>

                        </form>
                    </div>
                    <div id="password-edit">

                        <form action='editPasswordInfo' method='POST'>
                            <fieldset>
                                <legend>Zmiana hasła</legend>
                                <div style="margin-left: 100px;">

                                    <p>
                                        <label>
                                            Aktualne hasło:
                                            <input class="edit-password-actual" name='current_password' type='password'
                                                   minlength="3" maxlength="20" required>
                                        </label>
                                    </p>

                                    <p>
                                        <label>
                                            Nowe hasło:
                                            <input class="edit-password" name='new_password' type='password'
                                                   minlength="3" maxlength="20" required>
                                        </label>
                                    </p>

                                    <input type='hidden' name='id' value='{{ Auth::user()->id }}'/>
                                    <input type='hidden' value='{{ csrf_token() }}' name='_token'/>
                                    <input style="margin-left: 69%;" class="submit-b" type="submit" value="Zmień">
                                    </br>
                                </div>
                            </fieldset>

                        </form>
                    </div>

                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    @endif

                    @foreach (['danger', 'warning', 'success', 'info'] as $key)
                        @if(Session::has($key))
                            <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                        @endif
                    @endforeach
                </div>

            </div>

            <div id="ads">
                <aside>
                </aside>
            </div>
            <div style="clear:both;"></div>

        </div>

    </article>
</main>

<input id="username-id" type="hidden" value='{{ Auth::user()->id }}'/>
<script type="text/javascript" src="{{asset('js/profile/editProfile.js')}}"></script>
<script type="text/javascript" src="{{asset('js/profile/calendarEditProfile.js')}}"></script>
</body>
</html>