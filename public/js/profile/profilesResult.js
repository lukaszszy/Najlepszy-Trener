// city + discipline header


var n = decodeURI(window.location.href).split("/");

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
var disciplineSection = document.getElementById("discipline-value");
var citySection = document.getElementsByClassName("city-value");
// disciplineSection.textContent = capitalizeFirstLetter(n[n.length - 2]).replace("_", " ")
// citySection[0].textContent = capitalizeFirstLetter(n[n.length - 1]);

//cities search-input

function inputSearchCities(){
  var options = {
      types: ['(cities)'],
      componentRestrictions: {country: "pl"}
     };

  let input = document.getElementById('city-search-results');
  input.value = capitalizeFirstLetter(n[n.length - 1]);
  let autocomplete = new google.maps.places.Autocomplete(input, options);
}


//insert dysciplines to overlay from json file

var xhr1 = new XMLHttpRequest();                 
var disciplinesContent= '<select id="dyscypline-search-results" class="custom-select rounded disciplines-select">';
xhr1.onload = function() {                       
  if(xhr1.status === 200) {
    responseObject = JSON.parse(xhr1.responseText);  
    let disciplineSelect = document.getElementById("discipline-value");
    disciplinesContent+= '<option>Dyscyplina</option>';
    
    responseObject.Dysciplines.map(function(obj){
      disciplinesContent+= '<option value="'+ obj.Name +'"'
      if(obj.Name == capitalizeFirstLetter(n[n.length - 2]).replace("_", " ") ){
        disciplinesContent += ' selected';  
      }
      disciplinesContent += '>'+obj.Name+'</option>';
    })
    disciplinesContent+= '</select>'
    disciplineSelect.innerHTML = disciplinesContent;
  }
};

xhr1.open('GET', 'http://pri.me/api/dyscyplines.json', true);        
xhr1.send(null);                                 



// trainers profiles
profilePic =[];
var xhr = new XMLHttpRequest();                 

xhr.onload = function() {                       
  if(xhr.status === 200) {
    responseObject = JSON.parse(xhr.responseText);
    var content = '';
    for(var i = 0; i < responseObject.length; i++) {
      content += '<div class="single-trainer-result"';
      content += '><div class="profile-picture">';
      content += '</div><div class="profile-info">'
      content += "<p class='name-surname'>"+ responseObject[i].name + " " + responseObject[i].surname +"</p>";
      content += "<p> Opis: "+ responseObject[i].description;
      // if(responseObject[i].description.length > 280){
      //   content += '...'
      // }
      content += "</p></div><div class='right-segment'><div class='stars'>";

      for( var j = 0; j < Math.round(responseObject[i].rating) ; j++ ){
        content += '<span class="fa fa-star green-star-checked"></span>';
      }
      for(var k = 1; k <= (5-Math.round(responseObject[i].rating)); k++){
        content += '<span class="fa fa-star green-star"></span>';
      }
      content += "</div><button id='trainer_record_"+responseObject[i].id+"' type='button' class='btn green-button'>Zobacz profil</button></div></div>";

        for(var j = 0; j < responseObject[i].tr_ph.length; j++){
          if(responseObject[i].tr_ph[j].only_for_avatar === "YES" ){
            profilePic.push([" <img src=\"\/storage/trainers_photos\/"+responseObject[i].id+"\/"+responseObject[i].tr_ph[j].photo_name+"\" \/>", i]);
          }
        }

    
    }
    var trainerBox = document.getElementById("trainers-container");
    trainerBox.innerHTML = content;
    var table = []
    for(var i = 0; i < responseObject.length; i++){
      var event = document.getElementById("trainer_record_"+responseObject[i].id);
      event.addEventListener('click',function(e){
        window.location.href = 'http://pri.me/profiles/'+e.target.id.split("_")[2];},false);
    }
    let resultValue = document.getElementsByClassName('result-value');

    switch(responseObject.length){
      case 0:
        resultValue[0].textContent = '(0 wyników)'
        break;
      case 1:
        resultValue[0].textContent = '(1 wynik)'
        break;
      case 2: case 3: case 4:
        resultValue[0].textContent = '('+responseObject.length+' wyniki)';
        break;
      default:
        resultValue[0].textContent = '('+responseObject.length+' wyników)';
        break
    } 
  }else{
    let resultValue = document.getElementsByClassName('result-value');
    resultValue[0].textContent = '(0 wyników)';
  }
  if(profilePic){
    for(var k = 0; k < profilePic.length; k++ ){
      document.getElementsByClassName('profile-picture')[profilePic[k][1]].innerHTML = profilePic[k][0];
    }

  }
};

xhr.open('GET', 'http://pri.me/api/'+n[n.length - 2]+'/'+n[n.length - 1], true);        
xhr.send(null);    

 
// range slider

$( function() {
  $( "#slider-range" ).slider({
    range: true,
    min: 0,
    max: 350,
    values: [ 0, 350 ],
    slide: function( event, ui ) {
      $( "#amount" ).val("Cena:   " + ui.values[ 0 ]+"zł" + " - " + ui.values[ 1 ]+"zł" );
    }
  });
  $( "#amount" ).val("Cena:   " + $( "#slider-range" ).slider( "values", 0 )+"zł" +
    " - " + $( "#slider-range" ).slider( "values", 1 )+"zł" );
} );

$( function() {
  $( "#age-slider-range" ).slider({
    range: true,
    min: 0,
    max: 99,
    values: [ 0, 99 ],
    slide: function( event, ui ) {
      $( "#age" ).val("Wiek:   " + ui.values[ 0 ]+" lat" + " - " + ui.values[ 1 ]+" lat" );
    }
  });
  $( "#age" ).val("Wiek:   " + $( "#age-slider-range" ).slider( "values", 0 )+" lat" +
    " - " + $( "#age-slider-range" ).slider( "values", 1 )+" lat" );
} );

// Clear all

clearButton = document.getElementById('clearAll');

clearButton.addEventListener('click',clearFilter)

function clearFilter(){
  document.getElementById('age').value = "Wiek:   " +0+" lat" + " - " +99+" lat";
  $( "#age-slider-range" ).slider( "values", 0, 0 );
  $( "#age-slider-range" ).slider( "values", 1, 99 );
  document.getElementById('amount').value = "Cena:   " +0+"zł" + " - " +350+"zł";
  $( "#slider-range" ).slider( "values", 0, 0);
  $( "#slider-range" ).slider( "values", 1, 350 );
  document.getElementById('training-place').value = 'Miejsce';
  document.getElementById('trainer-sex').value = 'Płeć';
  document.getElementById('city-search-results').value = capitalizeFirstLetter(n[n.length - 1]);
  document.getElementsByClassName('disciplines-select')[0].value = capitalizeFirstLetter(n[n.length - 2]).replace("_", " ");
}



// filtr

document.getElementById('filter-button').addEventListener('click', function(){
  



  let dysc = document.getElementById('dyscypline-search-results').value;
  let city = document.getElementById('city-search-results').value;
  let place = document.getElementById('training-place').value;
  let ageMin = $( "#age-slider-range" ).slider( "values", 0 );
  if(ageMin === 0){
    ageMin = ''
  }
  let ageMax = $( "#age-slider-range" ).slider( "values", 1 );
  if(ageMax === 99){
    ageMax = ''
  }
  let sex = document.getElementById('trainer-sex').value;
  let priceMin = $( "#slider-range" ).slider( "values", 0 );
  if(priceMin === 0){
    priceMin = ''
  }
  let priceMax = $( "#slider-range" ).slider( "values", 1 );
  if(priceMax === 350){
    priceMax = ''
  }

  var project = document.querySelector('#trainers-container');
  project.style.opacity = 0;

    let url  = "http://pri.me/api/";
    url  += dysc.replace(" ", "_")+"/";
    url  += city.replace(" ", "_")+"?place=";
    url  += "&minAge=";
    url  += ageMin+"&maxAge=";
    url  += ageMax+"&gender=";
    if(sex=='Kobieta'){
      url+= "k&minPrice=";
    }else if(sex=='Mężczyzna') {
      url+= "m&minPrice=";
    }else{
      url+= "&minPrice=";
    }
    url  += priceMin+"&maxPrice=";
    url  += priceMax;
    var xhr5  = new XMLHttpRequest()
    xhr5.open('GET', url, true)
    xhr5.onload = function () {
      if(xhr5.status === 200) {
        responseObject = JSON.parse(xhr5.responseText);
        var content = '';
        for(var i = 0; i < responseObject.length; i++) {
          content += '<div class="single-trainer-result"' ;
          content += '><div class="profile-picture">';
          content += '</div><div class="profile-info">'
          content += "<p class='name-surname'>"+ responseObject[i].name + " " + responseObject[i].surname +"</p>";
          content += "<p> Opis: "+ responseObject[i].description;
          // if(responseObject[i].description.length > 280){
          //   content += '...'
          // }
          content += "</p></div><div class='right-segment'><div class='stars'>";
          for( var j = 0; j < Math.round(responseObject[i].rating) ; j++ ){
            content += '<span class="fa fa-star green-star-checked"></span>';
          }
          for(var k = 0; k < (5-Math.round(responseObject[i].rating)); k++){
            content += '<span class="fa fa-star green-star"></span>';
          }
          content += "</div><button type='button' id='trainer_record_"+responseObject[i].id+"' class='btn green-button'>Zobacz profil</button></div></div>";
    

        for(var j = 0; j < responseObject[i].tr_ph.length; j++){
          if(responseObject[i].tr_ph[j].only_for_avatar === "YES" ){
            profilePic.push([" <img src=\"\/storage/trainers_photos\/"+responseObject[i].id+"\/"+responseObject[i].tr_ph[j].photo_name+"\" \/>", i]);
          }
        }
        
        }
        var trainerBox = document.getElementById("trainers-container");
        trainerBox.innerHTML = content;

        for(var i = 0; i < responseObject.length; i++){
          var event = document.getElementById("trainer_record_"+responseObject[i].id);
          if(event){
            event.addEventListener('click',function(e){ window.location.href = 'http://pri.me/profiles/'+e.target.id.split("_")[2]},false);
          }

        }
        let resultValue = document.getElementsByClassName('result-value');
    
        switch(responseObject.length){
          case 0:
            resultValue[0].textContent = '(0 wyników)'
            break;
          case 1:
            resultValue[0].textContent = '(1 wynik)'
            break;
          case 2: case 3: case 4:
            resultValue[0].textContent = '('+responseObject.length+' wyniki)';
            break;
          default:
            resultValue[0].textContent = '('+responseObject.length+' wyników)';
            break
        } 
      }else{
        let resultValue = document.getElementsByClassName('result-value');
        resultValue[0].textContent = '(0 wyników)';
      }
      console.log(profilePic)
      if(profilePic){
        for(var k = 0; k < profilePic.length; k++ ){
          document.getElementsByClassName('profile-picture')[profilePic[k][1]].innerHTML = profilePic[k][0];
        }
    
      }
      project.style.opacity = 1;
      profilePic = [];
}
xhr5.send(null);

},false)





//logo
if(document.getElementsByClassName('logo')){
  document.getElementsByClassName('logo')[0].addEventListener('click',function(){
      location.href = "//pri.me";
  },false)
}