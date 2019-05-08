// GLOBAL VERIABLES
const yearGregorian = 2019;
const yearHijri = 1440;
const iFitre = 23;

function runTime() {
    let t = new Date();
    return t.getFullYear()+'-'+(t.getMonth()+1)+'-'+t.getDate()+' '+t.getHours()+':'+t.getMinutes()+':'+t.getSeconds();
}

function loadStates() {
    console.log(runTime()+" Loaded Function : loadStates()");
    $.get(_QueryUrl+"loadStates", function (response) {
        let stateItem = $("#state");
        stateItem.empty().append('<option>Şehir Seçiniz...</option>');
        for(let key in response){
            let jState = response[key];
            stateItem.append('<option value="'+jState.StateID+'">'+jState.StateName+'</option>');
        }
    },"json");
}

function loadCities() {
    console.log(runTime()+" Loaded Function : loadCities()");
    let stateID = $("#state").val();
    if(stateID>0){
        $('#loader').fadeIn();
        $('#loader-wrapper').fadeIn('fast');
        $('body').css({'overflow-y':'hidden'});

        $.post(_QueryUrl+"loadCities", {stateID:stateID}, function (response) {
            let cityItem = $("#city");
            cityItem.empty().append('<option>İlçe Seçiniz...</option>');
            for(let key in response){
                let jCity = response[key];
                cityItem.append('<option value="'+jCity.CityID+'">'+jCity.CityName+'</option>');
            }
            $('#btnView').removeClass("disabled");
            $('#loader').fadeOut();
            $('#loader-wrapper').delay(350).fadeOut('slow');
            $('body').delay(350).css({'overflow-y':'visible'});
        },"json");
    }
}

function getImsakiye() {
    let iCountry = "2";
    let iState = $('#state').val();
    let iCity = $('#city').val();

    $.post(_QueryUrl+"generateImsakiye", {iCountry:iCountry,iState:iState,iCity:iCity,yearGregorian:yearGregorian,yearHijri:yearHijri,iFitre:iFitre}, function (response) {
        let vLoader = $('#loader');
        let vLoaderWrapper = $('#loader-wrapper');
        let vBody =$('body');
        let vIms = $("#ims");
        let vOutView = $("#outView");
        let vOutViewPanel = $("#outViewPanel");
        let iCity = $('#city option:selected').text();

        vLoader.fadeIn();
        vLoaderWrapper.fadeIn('fast');
        vBody.css({'overflow-y':'hidden'});
        setTimeout(function(){
            vIms.empty().append(response);
            vOutView.removeClass("gizle");
            vIms.css("display","block");
            html2canvas(document.getElementById("ims")).then(function(canvas) {
                vOutViewPanel.empty().append(canvas).append('<br><span class="btn btn-success" id="downImsakiye">İmsakiye İndir</span>');
                document.getElementById("downImsakiye").onclick = function() {
                    download(canvas.toDataURL("image/jpeg"),yearGregorian+" "+iCity+" IMSAKİYESI.jpg","image/jpg");
                };
                vIms.css("display","none");
                vLoader.delay(1).fadeOut();
                vLoaderWrapper.delay(1).fadeOut('slow');
                vBody.delay(1).css({'overflow-y':'visible'});
            });
        }, 1000);
    });
}

loadStates();
//<![CDATA[
$(window).load(function() { // makes sure the whole site is loaded
    $('#loader').fadeOut(); // will first fade out the loading animation
    $('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({'overflow-y':'visible'});
})
//]]>



