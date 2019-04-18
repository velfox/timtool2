console.log('global script is loaded');

let timer = document.getElementById('timer');
let toggelBtn = document.getElementById('toggel');
let resetBtn = document.getElementById('reset-timer');
let saveBtn = document.getElementById('save-timer');

// maakt allen opdrachtgevers klikbaar
let opdrgAntaal = document.getElementsByClassName('opdrachtgever').length;
for (i = 0; i < opdrgAntaal; i++) {
    let opdrg = document.getElementsByClassName('opdrachtgever')[i];
    opdrg.addEventListener('click', loadTimer);
    console.log(opdrg);
}

let n = 0;
let setup = 0;

function loadTimer() {
    let hetid = this.id;

    //set naam van de opdrachtgever
    getname = GetOpdrachtgeverName(hetid);

    //verander timer afbeelding
    changeTimerImg(hetid);
    n = n + 1;
    let watch = [];
    // maak een nieuwe timer aan
    watch[n] = new stopwacth(timer, getname, hetid);
    console.log(n);
    //toon de volgende stap voor het opgeven van de taak beschijfing
    nextStapTask();

    //maak buttons van stopwatch klikbaar
    setup = 1;
    toggelBtn.addEventListener('click', function () {
        if (watch[n].isCounting) {
            watch[n].stop();
            toggelBtn.textContent = 'Start';
            document.getElementById("timerbox").style.backgroundImage = "url('../attributes/img/loding.gif')";
        } else {
            watch[n].start();
            toggelBtn.textContent = 'Pauze';
            document.getElementById("timerbox").style.backgroundImage = "url('../attributes/img/coins.gif ')";
        }
    });

    resetBtn.addEventListener('click', function () {
        //reset de tijd van de timer
        watch[n].reset();
        timer.textContent = '00 : 00 : 00';
    });

    saveBtn.addEventListener('click', function () {
        console.log('click');
        //save de besteede tijd aan de taak in de database
        watch[n].save();

    });
}

//verander timer afbeelding
function changeTimerImg(hetid) {
    let discid = 'd' + hetid;
    let disc = document.getElementById(discid);
    // set pad naar logo voor veranderen van logo timer
    let imgpad = disc.style.backgroundImage;
    document.getElementById("timerlogo").style.backgroundImage = imgpad;
}

//set naam van de opdrachtgever
function GetOpdrachtgeverName(hetid) {
    let nameid = 'n' + hetid;
    let name = document.getElementById(nameid);
    let getname = name.innerText;
    return getname;
}

//toon de volgende stap voor het opgeven van de taak beschijfing
function nextStapTask() {
    let element = document.getElementById("opdrachtgever");
    element.innerHTML = getname;
    var yourUl = document.getElementById("selecteer-beschijfing");
    yourUl.style.display = 'block';
    var yourUl = document.getElementById("selecteer-opdrachtgever");
    yourUl.style.display = 'none';
}

//zet de taak die word uitgevoerd bij de timer
function showTaskDiscription() {
    let task = document.getElementById("taskfield").value;
    console.log(task);
    let element = document.getElementById("taskd");
    element.innerHTML = task;
    var yourUl = document.getElementById("s3");
    yourUl.style.display = 'block';
    var yourUl = document.getElementById("s2");
    yourUl.style.display = 'none';
}

document.getElementById("taskfield").addEventListener("change", showTaskDiscription);


let harlaadtabel = document.getElementById('herlaadtabel');
harlaadtabel.addEventListener('click', loadingtabel);

function loadingtabel() {
    console.log('ladan landcdnkdf');
    herlaadTabel(3);
}

function herlaadTabel(opdrid) {
    console.log('herladen tabel');
    let uren = document.getElementById("uren-tabel");
    let params = "&opdrid=" + opdrid;

    console.log(params);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'process2.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        console.log(this.responseText);
        if (xhr.status == 200) {
            uren.innerHTML = this.responseText;
        } else {
            aside.innerHTML = "Error loading document";
        }
    }

    xhr.send(params);

};

function addOpdrachtgever() {

    console.log('trying to add');
    var form = document.querySelector('#addopdrg');
    var data = new FormData(form);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'process3.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        console.log(this.responseText);
    }

    xhr.send(data);
    this.reset();
}

// ++++++++++++++++++++++++ DEMO BOX UPLOUD PART ++++++++++++++++++++++++++++++++++++++ //

// setup demobox chek variables
var demoboxNameWaarden = ""
var demoboxBerschijfingWaarden = ""
var demoboxImgWaarden = ""
//change demo box name
document.getElementById("opdr-name").addEventListener("change", demoboxName);

function demoboxName() {
    var x = document.getElementById("opdr-name").value;
    document.getElementById("demobox-name").innerHTML = x;
    demoboxNameWaarden = x
    chekForUploudOpdrachtgever()
};
// cange demo box berschijfing 
document.getElementById("opdr-berschijfing").addEventListener("change", demoboxBerschijfing);
function demoboxBerschijfing() {
    var x = document.getElementById("opdr-berschijfing").value;
    document.getElementById("demobox-beschrijfing").innerHTML = x;
    demoboxBerschijfingWaarden = x
    chekForUploudOpdrachtgever()
};

//chek of allen stappen zijn afgerond voor uplouden
function chekForUploudOpdrachtgever() {
    function isEmpty(val) {
        if (val === "") {
            error = true;
        }
    }
    var error = false;
    isEmpty(demoboxNameWaarden);
    isEmpty(demoboxBerschijfingWaarden);
    isEmpty(demoboxImgWaarden);

    if (error == false) {
        var nextbutton = document.getElementById('opdrachtgevertoevoegen');
        nextbutton.style.display = 'block';
        document.getElementById("uploudopdrachtgeveruitvoeren").addEventListener("click", doneUploudOpdrachtgever);
        return console.log("lets uploud opdr");
    } else {
        return console.log("not yet");
    }
}

function doneUploudOpdrachtgever() {
    console.log("uploud in progress");
    let task = document.getElementById("taskd").innerHTML;
    let params = "demoboxNameWaarden=" + demoboxNameWaarden + "&demoboxBerschijfingWaarden=" + demoboxBerschijfingWaarden + "&demoboxImgWaarden=" + demoboxImgWaarden;
    console.log(params);
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'process5.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        console.log(this.responseText);
    }

    xhr.send(params);
}

//uploud only logo
document.getElementById("fileToUpload").addEventListener("change", logoopdr);

function logoopdr() {
    console.log("function started")
    const url = 'process4.php';
    const form = document.getElementById('addopdrg');
    var x = document.getElementById("fileToUpload");

    const files = document.getElementById("fileToUpload").files;
    const formData = new FormData();

    function uploudlogo() {
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            formData.append('files[]', file);
        }
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(response => {
            console.log(response);
            uloudchek()
        });
    }

    var txt = "";
    var pad = "";
    if ('files' in x) {
        if (x.files.length == 0) {
            txt = "Selecteer een afbeelding.";
        } else {
            if (x.files.length > 1) {
                txt = "je hebt te veel bestanden geselecteerd.";
            } else {
                for (var i = 0; i < x.files.length; i++) {
                    var file = x.files[i];
                    if ('name' in file) {
                        txt = "";
                        pad = "./attributes/img/logo/" + file.name
                        var filenaampad = file.name
                        uploudlogo()
                    }
                    if ('size' in file) {
                        console.log("size: " + file.size + " bytes <br>")
                    }
                }
            }
        }
    }
    else {
        if (x.value == "") {
            txt += "Select one or more files.";
        } else {
            txt += "The files property is not supported by your browser!";
            txt += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
        }
    }


    // chek of foto geuploud is
    function UrlExists(url) {
        var http = new XMLHttpRequest();
        http.open('HEAD', url, false);
        http.send();
        return http.status != 404;
    }

    function uloudchek() {
        var logoprevieuw = document.getElementById("logodemo")
        logoprevieuw.style.backgroundImage = "url('./attributes/img/laden.gif')";
        for (var i = 1; i <= 20; i++) {
            var tick = function (i) {
                return function () {
                    if (UrlExists(pad) == true) {
                        document.getElementById("logodemo").innerHTML = txt;
                        logoprevieuw.style.backgroundImage = "url(" + pad + ")";
                        demoboxImgWaarden = filenaampad;
                        chekForUploudOpdrachtgever()
                    } else {
                        document.getElementById("logodemo").innerHTML = "laden..";
                    }
                    if (i == 20 && UrlExists(pad) == false) {
                        document.getElementById("logodemo").innerHTML = "Probeer een ander bestand deze werkt niet :C";
                        logoprevieuw.style.backgroundImage = "unset";
                        demoboxImgWaarden = "";
                    }
                }
            };

            setTimeout(tick(i), 500 * i);

        }
    }
    //end of function
}

// laden van blokken homepage user

function loadShowAddOpdrachtgever() {
    var button = document.getElementById("button-opdrachtgever")
    var yourUl = document.getElementById("selecteer-beschijfing");
    yourUl.style.display = 'block';
    var yourUl = document.getElementById("selecteer-opdrachtgever");
    yourUl.style.display = 'none';
}

// add click eventlistner to menu with main options
let menuboxes = ["button-boxmenu-1","button-boxmenu-2","button-boxmenu-3"]

for(let i=0;  i < menuboxes.length; i++){
    let Clientbox = document.getElementById(''+menuboxes[i]+'');
    Clientbox.addEventListener('click', switchMenuBox)
    console.log(menuboxes[i]);
}

// function that show's and hide's the main menu bloks
function switchMenuBox(event) {
    let id = event.currentTarget.id
    console.log("je klikte op " + event.target.id)
    console.log("de listener hangt aan " + event.currentTarget.id) 

    let box1 = document.getElementById('urenoverzicht');
    let box2 = document.getElementById('s2');
    let box3 = document.getElementById('addopdrachgever');
    let mainbox = document.getElementById('s1');

    if (id == 'button-boxmenu-1') {
        HideAllBoxes()
        mainbox.style.display = 'flex';
        box1.style.display = 'block';
    } else if (id == 'button-boxmenu-2') {
        HideAllBoxes()
        box2.style.display = 'block';
    } else if (id == 'button-boxmenu-3') {
        HideAllBoxes()
        mainbox.style.display = 'flex';
        box3.style.display = 'block';
    } else {
        console.log("menu box item not found")
    }

    function HideAllBoxes(){
        box1.style.display = 'none';
        box2.style.display = 'none';
        box3.style.display = 'none';
        mainbox.style.display = 'none';
    }

}


  // wissel tussen 