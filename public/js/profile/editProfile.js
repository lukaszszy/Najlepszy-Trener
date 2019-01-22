

var option1 = document.getElementById("editMenu-option1");
var option2 = document.getElementById("editMenu-option2");
var option3 = document.getElementById("editMenu-option3");
var option4 = document.getElementById("editMenu-option4");
var option5 = document.getElementById("editMenu-option5");
var option6 = document.getElementById("editMenu-option6");
var option7 = document.getElementById("editMenu-option7");

var block1 = document.getElementById("basic-edit");
var block2 = document.getElementById("specific-edit");
var block3 = document.getElementById("calendar-edit");
var block4 = document.getElementById("gallery-edit");
var block5 = document.getElementById("email-edit");
var block6 = document.getElementById("password-edit");
var block7 = document.getElementById("place-edit");

option1.addEventListener('click',function(){show(1);},false)
option2.addEventListener('click',function(){show(2);},false)
option3.addEventListener('click',function(){show(3);},false)
option4.addEventListener('click',function(){show(4);},false)
option5.addEventListener('click',function(){show(5);},false)
option6.addEventListener('click',function(){show(6);},false)
option7.addEventListener('click',function(){show(7);},false)

csrfToken = document.getElementById('token').value


function show(a){
    switch(a){
        case 1:
            option1.classList.add("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option7.classList.remove("editMenu-option-checked");
            block1.style.display = "block";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
            block7.style.display = "none";
            break;
        case 2:
            option1.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option7.classList.remove("editMenu-option-checked");
            option2.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "block";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
            block7.style.display = "none";
            break;
        case 3:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option7.classList.remove("editMenu-option-checked");
            option3.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "block";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "none";
            block7.style.display = "none";
        break;
        case 4:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option7.classList.remove("editMenu-option-checked");
            option4.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "block";
            block5.style.display = "none";
            block6.style.display = "none";
            block7.style.display = "none";
        break;
        case 5:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option7.classList.remove("editMenu-option-checked");
            option5.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "block";
            block6.style.display = "none";
            block7.style.display = "none";
            break;
        case 6:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option7.classList.remove("editMenu-option-checked");
            option6.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block6.style.display = "block";
            block7.style.display = "none";
            break;
        case 7:
            option1.classList.remove("editMenu-option-checked");
            option2.classList.remove("editMenu-option-checked");
            option3.classList.remove("editMenu-option-checked");
            option4.classList.remove("editMenu-option-checked");
            option5.classList.remove("editMenu-option-checked");
            option6.classList.remove("editMenu-option-checked");
            option7.classList.add("editMenu-option-checked");
            block1.style.display = "none";
            block2.style.display = "none";
            block3.style.display = "none";
            block4.style.display = "none";
            block5.style.display = "none";
            block7.style.display = "block";
            block6.style.display = "none";
            break;
    }



}


// show and hide price, course and uni


var course = document.getElementById("edit-course");
var uni = document.getElementById("edit-uni");
var price = document.getElementById("edit-price");

course.style.display = "none";
uni.style.display = "none";
price.style.display = "none";

var click1 = document.getElementById("show-course");
var click2 = document.getElementById("show-uni");
var click3 = document.getElementById("show-price");
var click4 = document.getElementById("show-cities");

click1.addEventListener('click',function(){showHide(1);},false);
click2.addEventListener('click',function(){showHide(2);},false);
click3.addEventListener('click',function(){showHide(3);},false);

function showHide(a){
    switch(a){
        case 1:
            if(course.style.display=="none"){
                course.style.display = "block";
            }else{
                course.style.display = "none";
            }
            break;
        case 2:
            if(uni.style.display=="none"){
                uni.style.display = "block";
            }else{
                uni.style.display = "none";
            }
            break;
        case 3:
            if(price.style.display=="none"){
                price.style.display = "block";
            }else{
                price.style.display = "none";
            }
            break;
        case 4:
            if(cities.style.display=="none"){
                cities.style.display = "block";
            }else{
                cities.style.display = "none";
            }
            break;

    }

}


// dyscyplines from json

var xhr = new XMLHttpRequest();

xhr.onload = function() {
  if(xhr.status === 200) {
    responseObject = JSON.parse(xhr.responseText);
    var column1 ='';
    var column2 ='';
    var column3 ='';
    var column4 ='';
    var column5 ='';
    var column6 ='';
    var record = document.getElementsByClassName("dyscypline-column-editprofile");
    for (var i = 0; i < 12; i++){
        column1 += '<label class="container"><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column1 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column1 += responseObject.Dysciplines[i].Name + '<span class="checkmark"></span></label>';

    }
    for (var i = 12; i < 24; i++){
        column2 += '<label class="container"><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column2 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column2 += responseObject.Dysciplines[i].Name + '<span class="checkmark"></span></label>';
    }
    for (var i = 24; i < 36; i++){
        column3 += '<label class="container"><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column3 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column3 += responseObject.Dysciplines[i].Name + '<span class="checkmark"></span></label>';

    }
    for (var i = 36; i < responseObject.Dysciplines.length; i++){

        column4 += '<label class="container"><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
        column4 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
        column4 += responseObject.Dysciplines[i].Name + '<span class="checkmark"></span></label>';
    }

    // for (var i = 40; i < responseObject.Dysciplines.length; i++){

    //     column5 += '<label><input type="checkbox" name="'+responseObject.Dysciplines[i].Name;
    //     column5 += '" id="'+responseObject.Dysciplines[i].Name.replace(" ","_")+'">';
    //     column5 += responseObject.Dysciplines[i].Name + '</label></br>';

    // }
    record[0].innerHTML = column1;
    record[1].innerHTML = column2;
    record[2].innerHTML = column3;
    record[3].innerHTML = column4;
    // record[4].innerHTML = column5;

  }
};

xhr.open('GET', 'http://pri.me/api/dyscyplines.json', true);
xhr.send(null);

//checked dyscyplines


var xhr2 = new XMLHttpRequest();
var loggedUserId = document.getElementById("username-id").value;
xhr2.onload = function() {
    if(xhr2.status === 200) {
      responseObject2 = JSON.parse(xhr2.responseText);



    // 
    var containerPlaces = document.getElementById('added-places');
    var placesContent = '<table>';
    for(var w=0; w<responseObject2[0].tr_pl.length; w++){
        placesContent += '<tr class="placeRow"><td><b>'+responseObject2[0].tr_pl[w].place+'</b></td>';
        placesContent += '<td style="text-align:center;"><a style="cursor:pointer;text-decoration:none;" id="deleteTraining-'+responseObject2[0].tr_pl[w].id+'">Usuń</a></td></tr>';

    }
    placesContent += '</table>';
    containerPlaces.innerHTML = placesContent

    for(var x=0; x<responseObject2[0].tr_pl.length; x++){
        document.getElementById('deleteTraining-'+responseObject2[0].tr_pl[x].id).addEventListener('click',function(e) {
            let idSplit2 = event.target.id.split("-");
            var splited = idSplit2[1];
            $.confirm({
                boxWidth: '30%',
                useBootstrap: false,
                title: 'Usuwanie',
                content: 'Czy na pewno chcesz usunąć lokalizację ?',
                buttons: {
                    usuń: {
                        btnClass: 'btn-blue',
                        action: function () {
                        var t = e.target;
                        $.ajax({
                            data: {
                                "_token": $('#token').val()
                                },
                            method: "POST",
                            url: "/destroyTrainersPlace/"+ splited,
                            }).done(function( msg ) {
                            if(msg.error == 0){
                                window.location.reload()
                            }else{
                                window.location.reload()
                            }
                        });
                    }},
                    cofnij: function () {
                    }
                }
            })
    
    }
    ,false );
    }




    var contCities = document.getElementById('citiesContainer');
    var contSwap = '';
    console.log(responseObject2)
    for(var i=0 ; i < responseObject2[0].tr_loc.length; i++){
        contSwap += "<div style='margin-bottom: 7px;margin-left: 163px;font-size: 15px;width: 251px;'>"
        contSwap += responseObject2[0].tr_loc[i].city;
        contSwap += "<a id='deleteCity-"+responseObject2[0].tr_loc[i].id+"' style='text-decoration: none;cursor: pointer;float: right;font-size: 15px;'>Usuń</a></div>"
    }

    contCities.innerHTML = contSwap;


    for(var x=0; x<responseObject2[0].tr_loc.length; x++){
        document.getElementById('deleteCity-'+responseObject2[0].tr_loc[x].id).addEventListener('click',function(e) {
            let idSplit2 = event.target.id.split("-");
            var splited = idSplit2[1];
            $.confirm({
                boxWidth: '30%',
                useBootstrap: false,
                title: 'Usuwanie',
                content: 'Czy na pewno chcesz usunąć miasto ?',
                buttons: {
                    usuń: {
                        btnClass: 'btn-blue',
                        action: function () {
                        var t = e.target;
                        $.ajax({
                            data: {
                                "_token": $('#token').val()
                                },
                            method: "POST",
                            url: "/destroyCity/"+ splited,
                            }).done(function( msg ) {
                            if(msg.error == 0){
                                window.location.reload()
                            }else{
                                window.location.reload()
                            }
                        });
                    }},
                    cofnij: function () {
                    }
                }
            })
    
    }
    ,false );
    }
















      for(var i = 0; i < responseObject2[0].tr_disc.length; i++ ){

          var dysciplineName = responseObject2[0].tr_disc[i].discipline_name.replace(" ","_");
          if(document.getElementById(dysciplineName)){
            document.getElementById(dysciplineName).checked = true;
          }
            if(responseObject2[0].avatar){
            for(j=0; j < responseObject2[0].tr_ph.length; j++){
                if(responseObject2[0].tr_ph[j].only_for_avatar == "YES"){
                    if(responseObject2[0].tr_ph[j].id === parseInt(responseObject2[0].avatar)){
                        var profilePic = ''
                        profilePic += " <img src=\"\/storage/trainers_photos\/"+responseObject2[0].id+"\/";
                        profilePic += responseObject2[0].tr_ph[j].photo_name+"\" \/>"
                        $(".profilePic").html(profilePic);
                    }
                }

            };
        }
      }


//show offers

        var offers = '';
       for(var i = 0; i<responseObject2[0].tr_off.length; i++){
          offers += '<div id="single-ofert'+responseObject2[0].tr_off[i].id+'"><i class="fas fa-shopping-bag edit-icon"></i>'
          offers +=  "<div class='single-ofert'><div>";
          offers +=  responseObject2[0].tr_off[i].name+"</br><div style='font-size: 13px;'> ";
          if(responseObject2[0].tr_off[i].price){offers +=  responseObject2[0].tr_off[i].price+"zł </br> ";}
          else{offers +=  "Brak danych </br> ";}
          offers +=  "Maks. liczba klientów: "+responseObject2[0].tr_off[i].max_no_of_clients+ "</div></div>";
          offers +=  "<div class='edit-delete-section'>";
          offers +=  "<span class='pointer' id='single-ofert-"+responseObject2[0].tr_off[i].id+"'>Edytuj</span>";
          offers +=  "</br><span  id='off"+responseObject2[0].tr_off[i].id+"'>Usuń</span></div></div></div>";
          offers += "<div class='edit-single-ofert' id='edit-single-ofert-"+responseObject2[0].tr_off[i].id;
          offers += "'><form class='editTrainerOffer' action='editTrainerOffer' method='POST'>";
          offers += "<p  style='display: inline-block;'><label>Nazwa zajęć: <input value='"+responseObject2[0].tr_off[i].name+"'class='edit-lessons' type='text' name='classes_name' pattern='.{3,}' required title='Wprowadź co najmniej 3 znaki.'></label></p>";
          offers += "<p style='display:inline-block;'><label>Maksymalna liczba osób: <input value='"+responseObject2[0].tr_off[i].max_no_of_clients+"' style='width:180px;' class='edit-patric' type='text' name='numbers_of_members' type='number' min='1' max='20' required ></label></p>";
          offers += "<p style='margin-left:20px; display:inline-block;'><label>Cena: <input value='"+responseObject2[0].tr_off[i].price+"' style='width:180px;' class='edit-price' type='text' name='price' name='price'  type='number' step='0.01'></label></p>";
          offers += "<label><input type='hidden' value='"+csrfToken+"' name='_token'/></label>";
          offers += "<label><input name='id' type='hidden' value='"+responseObject2[0].tr_off[i].id+"'></label></label>"

          offers += "<div style='margin-left: 78%;'> <a class='a-decoration' id='single-ofert-back-"+responseObject2[0].tr_off[i].id+"' >Wróć</a><input class='single-add-button' type='submit' value='Edytuj'></div></div></form></div>";
      }
      var offersContainer = document.getElementById("offers-container");
      offersContainer.innerHTML = offers;



   for(var i = 0; i<responseObject2[0].tr_off.length; i++){
    document.getElementById('off'+responseObject2[0].tr_off[i].id).addEventListener('click',function(e) {
        $.confirm({
            boxWidth: '30%',
            useBootstrap: false,
            title: 'Usuwanie',
            content: 'Czy na pewno chcesz usunąć ofertę ?',
            buttons: {
                usuń: {
                    btnClass: 'btn-blue',
                    action: function () {
                    var t = e.target;
                    $.ajax({
                        data: {
                            "_token": $('#token').val()
                            },
                        method: "POST",
                        url: "/destroyOffer/"+t.id.substring(3),
                        }).done(function( msg ) {
                        if(msg.error == 0){
                            window.location.reload()
                        }else{
                            window.location.reload()
                        }
                    });
                }},
                cofnij: function () {
                }
            }
        })

}
,false );
}


    //hide edit offers
    var y = document.getElementsByClassName("single-ofert");

    for(var i=0; i<y.length;i++){
        document.getElementsByClassName("edit-single-ofert")[i].style.display="none";
    }

     //show edit offers

    for(var i=0; i<y.length;i++){
        document.getElementById("single-ofert-"+responseObject2[0].tr_off[i].id).addEventListener('click',function(){
                let idSplit = event.target.id.split("-");
                if(document.getElementById("edit-single-ofert-"+idSplit[2])){
                        document.getElementById("edit-single-ofert-"+idSplit[2]).style.display = "block";
                        document.getElementById("single-ofert"+idSplit[2]).style.display = "none";
                }

        },false);
        document.getElementById("single-ofert-back-"+responseObject2[0].tr_off[i].id).addEventListener('click',function(){
            var idSplitCer3 = event.target.id.split("-");
           document.getElementById("edit-single-ofert-"+idSplitCer3[3]).style.display = "none";
           document.getElementById("single-ofert"+idSplitCer3[3]).style.display = "block";

        },false);
    }

/// UNI

    var unis = '';
    for(var i = 0; i<responseObject2[0].tr_uni.length; i++){
       unis += '<div id="single-uni'+responseObject2[0].tr_uni[i].id+'"><i class="fas fa-graduation-cap edit-icon-uni"></i>'
       unis +=  "<div class='single-uni' ><div>";
       unis +=  responseObject2[0].tr_uni[i].university+"<br><div style='font-size: 13px;'>"+ responseObject2[0].tr_uni[i].course+" - ";
       if(responseObject2[0].tr_uni[i].degree){unis +=  responseObject2[0].tr_uni[i].degree+"</br> ";}
        else{unis +=  "Brak danych </br> "; }
       if(responseObject2[0].tr_uni[i].begin_date){
         unis+=responseObject2[0].tr_uni[i].begin_date;
       }
       else{ unis+="Brak danych ";}
       if(responseObject2[0].tr_uni[i].end_date){ unis += " - "+responseObject2[0].tr_uni[i].end_date+"</div></div>" }
        else{ unis += " - Brak danych</div></div>"}
       
       unis +="<div class='edit-delete-section'><span class='pointer' id='single-uni-"+responseObject2[0].tr_uni[i].id+"'>Edytuj</span></br><span id='uni"+responseObject2[0].tr_uni[i].id+"'>Usuń</span></div></div>";
       unis += "</div><div class='edit-single-uni' id='edit-single-uni-"+responseObject2[0].tr_uni[i].id;
       unis += "'><form  action='editUni' method='POST'>";
       unis += "<p><label>Nazwa uczelni: <input value='"+responseObject2[0].tr_uni[i].university+"' class='edit-uni' type='text' name='university' pattern='.{3,}' required title='Wprowadź co najmniej 3 znaki.'></label></p>";
       unis += "<p style='display: inline-block;'><label>Kierunek: <input value='"+responseObject2[0].tr_uni[i].course+"' class='edit-spec' type='text' name='course' pattern='.{3,}' required title='Wprowadź co najmniej 3 znaki.'></label></p>";
       unis += "<p  style='display: inline-block;'><label>Tytuł: <input style='margin-left: 106px;' value='"+responseObject2[0].tr_uni[i].degree+"' class='edit-title' type='text' name='degree' pattern='.{3,}' title='Wprowadź co najmniej 3 znaki.'></label></p>";
       unis += "<p style='display:inline-block'><label>Data rozpoczęcia: <input value='"+responseObject2[0].tr_uni[i].begin_date+"' class='edit-startdate' type='date' name='begin_date' max='2018-12-31' min='1900-01-01'></label></p>";
       unis += "<p style='margin-left:20px; display:inline-block;'><label>Data zakończenia: <input value='"+responseObject2[0].tr_uni[i].end_date+"' class='edit-enddate' type='date' name='end_date' max='2018-12-31' min='1900-01-01'></label></p>";
       unis += "<label><input type='hidden' value='"+csrfToken+"' name='_token'/></label>";
       unis += "<label><input name='id' type='hidden' value='"+responseObject2[0].tr_uni[i].id+"'></label></label>";
       unis += "<div style='margin-left: 76%;'><a class='a-decoration' id='single-uni-back-"+responseObject2[0].tr_uni[i].id+"' >Wróć</a>"
       unis += "<input type='submit' class='single-add-button' value='Edytuj'></div></form></div>";

   }
   var uniContainer = document.getElementById("uni-container");
   uniContainer.innerHTML = unis;


   for(var i = 0; i<responseObject2[0].tr_uni.length; i++){
    document.getElementById('uni'+responseObject2[0].tr_uni[i].id).addEventListener('click',function(e) {
        $.confirm({
            boxWidth: '30%',
            useBootstrap: false,
            title: 'Usuwanie',
            content: 'Czy na pewno chcesz usunąć uniwersytet ?',
            buttons: {
                usuń: {
                    btnClass: 'btn-blue',
                    action: function () {
                    var t = e.target;
                    $.ajax({
                        data: {
                            "_token": $('#token').val()
                            },
                        method: "POST",
                        url: "/destroyUni/"+t.id.substring(3),
                        }).done(function( msg ) {
                        if(msg.error == 0){
                            window.location.reload()
                        }else{
                            window.location.reload()
                        }
                    });
                }},
                cofnij: function () {
                }
            }
        })
}
,false );
}

 //hide edit uni
 var yy = document.getElementsByClassName("single-uni");

 for(var i=0; i<yy.length;i++){
     document.getElementsByClassName("edit-single-uni")[i].style.display="none";
 }
  //show edit uni


 for(var i=0; i<yy.length;i++){
     document.getElementById("single-uni-"+responseObject2[0].tr_uni[i].id).addEventListener('click',function(){
             var idSplitUni = event.target.id.split("-");
            if(document.getElementById("edit-single-uni-"+idSplitUni[2])){
                if(document.getElementById("edit-single-uni-"+idSplitUni[2]).style.display == "none"){
                    document.getElementById("edit-single-uni-"+idSplitUni[2]).style.display = "block";

                    document.getElementById("single-uni"+idSplitUni[2]).style.display = "none";
                }else{
                    document.getElementById("edit-single-uni-"+idSplitUni[2]).style.display = "none";
                }
            }
     },false);
     document.getElementById("single-uni-back-"+responseObject2[0].tr_uni[i].id).addEventListener('click',function(){
        var idSplitCer4 = event.target.id.split("-");
       document.getElementById("edit-single-uni-"+idSplitCer4[3]).style.display = "none";
       document.getElementById("single-uni"+idSplitCer4[3]).style.display = "block";

},false);
 }

 //gallery

 //profilePic

 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);

        }
        reader.readAsDataURL(input.files[0]);
    }

}
$("#profile-img").change(function(){
    document.getElementById('xyz').innerHTML = "<div id='getheight'> <img id='profile-img-tag' style='width: 400px;' /></div>"
    readURL(this);
    var pickedPhoto = document.getElementById('getheight');
    $("#profile-img-tag").on('load',function(){
        $('#profile-img-tag').Jcrop({
            aspectRatio: 1,
            setSelect: [0, 0, 200, 200],
            onSelect : function (c) {
                var coordinates = '';
                coordinates +="<input id='widthPic' type='hidden' value='"+$('#profile-img-tag').width()+"' name='widthPic'/>";
                coordinates +="<input id='heightPic' type='hidden' value='"+$('#profile-img-tag').height()+"' name='heightPic'/>";
                coordinates +="<input id='coordX' type='hidden' value='"+c.x+"' name='coordX'/>";
                coordinates +="<input id='coordY' type='hidden' value='"+c.y+"' name='coordY'/>";
                coordinates +="<input id='coordW' type='hidden' value='"+c.w+"' name='coordW'/>";
                coordinates +="<input id='coordH' type='hidden' value='"+c.h+"' name='coordH'/>";
                if(document.getElementById('coordX')){
                    var element1 = document.getElementById('coordX');
                    element1.parentNode.removeChild(element1);
                    var element2 = document.getElementById('coordY');
                    element2.parentNode.removeChild(element2);
                    var element3 = document.getElementById('coordW');
                    element3.parentNode.removeChild(element3);
                    var element4 = document.getElementById('coordH');
                    element4.parentNode.removeChild(element4);
                    var element5 = document.getElementById('widthPic');
                    element5.parentNode.removeChild(element5);
                    var element6 = document.getElementById('heightPic');
                    element6.parentNode.removeChild(element6);
                }
                $('#profile-pic-form').prepend(coordinates);
            }
        });})

});

//del profile pic

document.getElementById('del-profile-pic').addEventListener('click',function(e) {
    $.confirm({
        boxWidth: '30%',
        useBootstrap: false,
        title: 'Usuwanie',
        content: 'Czy na pewno chcesz usunąć zdjęcie profilowe ?',
        buttons: {
            usuń: {
                btnClass: 'btn-blue',
                action: function () {
                var t = e.target;
                $.ajax({
                    data: {
                        "_token": $('#token').val()
                        },
                    method: "POST",
                    url: "/destroyProfilePicture",
                    }).done(function( msg ) {
                    if(msg.error == 0){
                        window.location.reload()
                    }else{
                        window.location.reload()
                    }
                });
            }},
            cofnij: function () {
            }
        }
    })
})


//rest
var delUrl = [];
var photos ='';
var photosForProfilePic = '';
var gt = '>';
for(var i = 0; i<responseObject2[0].tr_ph.length; i++){
    if(responseObject2[0].tr_ph[i].only_for_avatar == "NO"){
        photosForProfilePic += "<input id='pic"+responseObject2[0].tr_ph[i].id+"' type='radio' class='radio-photo' name='id'";
        photosForProfilePic += "' value='"+responseObject2[0].tr_ph[i].id+"'/>";
        photosForProfilePic += "<label style='cursor:pointer' for='pic"+responseObject2[0].tr_ph[i].id+"'><div class='pickProfilePicture"+responseObject2[0].tr_ph[i].id+" gallery-photo'>";
        photosForProfilePic += " <img src=\"\/storage/trainers_photos\/"+responseObject2[0].id+"\/";
        photosForProfilePic += responseObject2[0].tr_ph[i].photo_name+"\" \/></div>";
        photosForProfilePic += '<meta name="_token" content="'+csrfToken+'"></label>';
    }
 }
 for(var i = 0; i<responseObject2[0].tr_ph.length; i++){
    if(responseObject2[0].tr_ph[i].only_for_avatar == "NO"){
        delUrl.push("/public/"+responseObject2[0].id+'/'+responseObject2[0].tr_ph[i].photo_name);
        photos += "<div class='gallery-photo'><span class='delete'><i id='pho"+responseObject2[0].tr_ph[i].id+"'class='far fa-trash-alt'></i></span><a href=\"";
        photos += "\/storage/trainers_photos\/"+responseObject2[0].id+"\/"+ responseObject2[0].tr_ph[i].photo_name+"\" data-lightbox=\"my-gallery\" >"
        photos += " <img src=\"\/storage/trainers_photos\/"+responseObject2[0].id+"\/";
        photos += responseObject2[0].tr_ph[i].photo_name+"\" \/></a></div>";
        photos += '<meta name="_token" content="'+csrfToken+'">'
    }
 }


var pickProfilePic = document.getElementById('profilePicPick');
pickProfilePic.innerHTML = photosForProfilePic;
for(var i = 0; i<responseObject2[0].tr_ph.length; i++){
    if(responseObject2[0].tr_ph[i].only_for_avatar == "NO"){
        document.getElementById('pic'+responseObject2[0].tr_ph[i].id).addEventListener('click',function(e){
            var target = e.target;
            var x = document.getElementsByClassName('gallery-photo');
            for(var q=0;q<x.length;q++){
                x[q].classList.remove('checked-pic')
            }
            document.getElementsByClassName('pickProfilePicture'+target.id.substring(3))[0].classList.add("checked-pic");
        })
    }

}


var photContainer = document.getElementsByClassName("gallery-content")[0];
photContainer.innerHTML = photos;

for(var i = 0; i<responseObject2[0].tr_ph.length; i++){
    if(responseObject2[0].tr_ph[i].only_for_avatar == "NO"){
    document.getElementById('pho'+responseObject2[0].tr_ph[i].id).addEventListener('click',function(e) {
        $.confirm({
            boxWidth: '30%',
            useBootstrap: false,
            title: 'Usuwanie',
            content: 'Czy na pewno chcesz usunąć zdjęcie ?',
            buttons: {
                usuń: {
                    btnClass: 'btn-blue',
                    action: function () {
                    var t = e.target;
                    $.ajax({
                        data: {
                            "_token": $('#token').val()
                            },
                        method: "POST",
                        url: "/destroy/"+t.id.substring(3),
                        }).done(function( msg ) {
                        if(msg.error == 0){
                            window.location.reload()
                        }else{
                            window.location.reload()
                        }
                    });
                }},
                cofnij: function () {
                }
            }
        })
}
,false );
}
}



// go to crop after pick

document.getElementById('setProfilePic').addEventListener('click',function(){
    for(var r = 0; r<responseObject2[0].tr_ph.length; r++){
        if(responseObject2[0].tr_ph[r].only_for_avatar == "NO"){
        if(document.getElementById("pic"+responseObject2[0].tr_ph[r].id).checked){
            let contentPic ="<div id='getheight-after'> <img id='profile-img-tag-after' style='width: 400px;'";
            contentPic += " src=\"\/storage/trainers_photos\/"+responseObject2[0].id+"\/";
            contentPic +=  responseObject2[0].tr_ph[r].photo_name+"\"";
            contentPic += "/></div>"
            document.getElementById('qwerty').innerHTML = contentPic;
            
            $("#profile-img-tag-after").on('load',function(){
                $('#profile-img-tag-after').Jcrop({
                    aspectRatio: 1,
                    setSelect: [0, 0, 200, 200],
                    onSelect : function (c) {
                        var coordinates = '';
                        coordinates +="<input form='profile-pic-choose-form' id='widthPicA' type='hidden' value='"+$('#profile-img-tag-after').width()+"' name='widthPic'/>";
                        coordinates +="<input form='profile-pic-choose-form' id='heightPicA' type='hidden' value='"+$('#profile-img-tag-after').height()+"' name='heightPic'/>";
                        coordinates +="<input form='profile-pic-choose-form' id='coordXA' type='hidden' value='"+c.x+"' name='coordX'/>";
                        coordinates +="<input form='profile-pic-choose-form' id='coordYA' type='hidden' value='"+c.y+"' name='coordY'/>";
                        coordinates +="<input form='profile-pic-choose-form' id='coordWA' type='hidden' value='"+c.w+"' name='coordW'/>";
                        coordinates +="<input form='profile-pic-choose-form' id='coordHA' type='hidden' value='"+c.h+"' name='coordH'/>";
                        if(document.getElementById('coordXA')){
                            var element1 = document.getElementById('coordXA');
                            element1.parentNode.removeChild(element1);
                            var element2 = document.getElementById('coordYA');
                            element2.parentNode.removeChild(element2);
                            var element3 = document.getElementById('coordWA');
                            element3.parentNode.removeChild(element3);
                            var element4 = document.getElementById('coordHA');
                            element4.parentNode.removeChild(element4);
                            var element5 = document.getElementById('widthPicA');
                            element5.parentNode.removeChild(element5);
                            var element6 = document.getElementById('heightPicA');
                            element6.parentNode.removeChild(element6);
                        }
                        $('#profile-pic-form-after').prepend(coordinates);
                    }
                });})
                $('#ex3').modal('show'); 
        }
}}
},false)







/// CER

var cers = '';
for(var i = 0; i<responseObject2[0].tr_cert.length; i++){
    cers += '<div id="single-cer'+responseObject2[0].tr_cert[i].id+'"><i class="far fa-file-alt edit-icon" ></i>'
    cers +=  "<div class='single-cer single-cer-count'><div>";
    cers +=  responseObject2[0].tr_cert[i].name_of_institution+"</br><div style='font-size: 13px;'>"+ responseObject2[0].tr_cert[i].name_of_course;
    if(responseObject2[0].tr_cert[i].begin_date){cers +=  "</br>"+responseObject2[0].tr_cert[i].begin_date;}
    else{cers +=  "</br>Brak danych"}
    if(responseObject2[0].tr_cert[i].end_date){ cers += " - "+responseObject2[0].tr_cert[i].end_date+"</div></div><div class='edit-delete-section'>"}
    else{ cers += " - Brak danych</div></div><div class='edit-delete-section'>"}
   
    cers += "<span class='pointer' id='single-cer-"+responseObject2[0].tr_cert[i].id+"'>Edytuj</span></br><span class='pointer' id='cer"+responseObject2[0].tr_cert[i].id+"'>Usuń</span></div></div>";
    cers += "</div><div class='edit-single-cer' id='edit-single-cer-"+responseObject2[0].tr_cert[i].id;
    cers += "'><form  action='editCourse' enctype='multipart/form-data' method='POST'>";
    cers += "<p><label>Nazwa placówki: <input class='edit-place' value='"+responseObject2[0].tr_cert[i].name_of_institution+"' type='text' name='name_of_institution'  pattern='.{3,}' required title='Wprowadź co najmniej 3 znaki.'></label></p>";
    cers += "<p  style='display: inline-block;' ><label>Nawa kursu: <input style='margin-left: 56px;' class='edit-course' value="+responseObject2[0].tr_cert[i].name_of_course+" type='text' name='name_of_course' pattern='.{3,}' title='Wprowadź co najmniej 3 znaki.'></label></p>";
    cers += "<p style='display:inline-block'><label>Data rozpoczęcia: <input class='edit-startdate' value="+responseObject2[0].tr_cert[i].begin_date+" type='date' name='begin_date' max='2018-12-31' min='1900-01-01' ></label></p>";
    cers += "<p style='margin-left:20px; display:inline-block;'><label>Data zakończenia: <input class='edit-enddate' value="+responseObject2[0].tr_cert[i].end_date+" type='date' name='end_date' max='2018-12-31' min='1900-01-01'></label></p>";
    cers += "<p style='display: inline-block;'><label >Dodany załącznik: <a href='\/storage\/trainers_certificates\/"+responseObject2[0].tr_cert[i].trainer_id+"\/"+responseObject2[0].tr_cert[i].zalacznik+"' target='_blank'>Zobacz</a></label></p>";
    cers += "<p>Zastąp załącznik<input type='file' name='zalacznik' accept='image/jpeg,image/gif,image/png,application/pdf' ></p>";
    cers += "<label><input type='hidden' value='"+csrfToken+"' name='_token'/></label>";
    cers += "<div style='margin-left: 76%;'><a class='a-decoration' id='single-cer-back-"+responseObject2[0].tr_cert[i].id+"' >Wróć</a>"
    cers += "<label><input name='id' type='hidden' value='"+responseObject2[0].tr_cert[i].id+"'></label></label><input class='single-add-button' type='submit' value='Edytuj'>"
    cers += "</div></form></div></br>";

}
var cerContainer = document.getElementById("cer-container");
cerContainer.innerHTML = cers;



for(var i = 0; i<responseObject2[0].tr_cert.length; i++){
    document.getElementById('cer'+responseObject2[0].tr_cert[i].id).addEventListener('click',function(e) {
        $.confirm({
            boxWidth: '30%',
            useBootstrap: false,
            title: 'Usuwanie',
            content: 'Czy na pewno chcesz usunąć certyfikat ?',
            buttons: {
                usuń: {
                    btnClass: 'btn-blue',
                    action: function () {
                    var t = e.target;
                    $.ajax({
                        data: {
                            "_token": $('#token').val()
                            },
                        method: "POST",
                        url: "/destroyCourse/"+t.id.substring(3),
                        }).done(function( msg ) {
                        if(msg.error == 0){
                            window.location.reload()
                        }else{
                            window.location.reload()
                        }
                    });
                }},
                cofnij: function () {
                }
            }
        })
}
,false );
}
if(responseObject2[0].gender == "K"){
    document.getElementById("genderK").checked = true;
}else if(responseObject2[0].gender == "M"){
    document.getElementById("genderM").checked = true;
}

//hide edit cer
var yyy = document.getElementsByClassName("single-cer-count");

for(var i=0; i<yyy.length;i++){
 document.getElementsByClassName("edit-single-cer")[i].style.display="none";
}
//show edit cer


for(var i=0; i<yyy.length;i++){
 document.getElementById("single-cer-"+responseObject2[0].tr_cert[i].id).addEventListener('click',function(){
         var idSplitCer = event.target.id.split("-");

         if(document.getElementById("edit-single-cer-"+idSplitCer[2])){
            if(document.getElementById("edit-single-cer-"+idSplitCer[2]).style.display == "none"){
                document.getElementById("edit-single-cer-"+idSplitCer[2]).style.display = "block";
                document.getElementById("single-cer"+idSplitCer[2]).style.display = "none";
            }else{
                document.getElementById("edit-single-cer-"+idSplitCer[2]).style.display = "none";
            }
         }

 },false);
 document.getElementById("single-cer-back-"+responseObject2[0].tr_cert[i].id).addEventListener('click',function(){
            var idSplitCer2 = event.target.id.split("-");
           document.getElementById("edit-single-cer-"+idSplitCer2[3]).style.display = "none";
           document.getElementById("single-cer"+idSplitCer2[3]).style.display = "block";

},false);


}


  }
};

xhr2.open('GET', 'http://pri.me/api/profiles/'+loggedUserId, true);
xhr2.send(null);


//logo
if(document.getElementsByClassName('logo')){
    document.getElementsByClassName('logo')[0].addEventListener('click',function(){
        location.href = "//pri.me";
    },false)
  }


//profile pic del icon active
if(document.getElementById('profile-img-tag') === null){
    document.getElementById('del-profile-pic').style.opacity = '0.6';
    document.getElementById('del-profile-pic').style.cursor = 'auto';
}
