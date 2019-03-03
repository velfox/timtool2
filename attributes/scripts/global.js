console.log('global script is loaded');

let timer = document.getElementById('timer');
let toggelBtn = document.getElementById('toggel');
let resetBtn = document.getElementById('reset-timer');
let saveBtn = document.getElementById('save-timer');



// maakt allen opdrachtgevers klikbaar
let opdrgAntaal = document.getElementsByClassName('opdrachtgever').length;
for(i = 0 ; i < opdrgAntaal; i++){
    let opdrg = document.getElementsByClassName('opdrachtgever')[i];
    opdrg.addEventListener('click', loadTimer);
    console.log(opdrg);
}

function loadTimer(){
    let hetid = this.id;

    //set naam van de opdrachtgever
    getname = GetOpdrachtgeverName(hetid);
    
    //verander timer afbeelding
    changeTimerImg(hetid);
    
    // maak een nieuwe timer aan
    let watch = new stopwacth(timer, getname,hetid);

    //toon de volgende stap voor het opgeven van de taak beschijfing
    nextStapTask();

    //maak buttons van stopwatch klikbaar
    toggelBtn.addEventListener('click', function(){
        if (watch.isCounting){
            watch.stop();
            toggelBtn.textContent = 'Start';
            document.getElementById("timerbox").style.backgroundImage = "url('../attributes/img/loding.gif')";
        } else {
            watch.start();
            toggelBtn.textContent = 'Pauze';
            document.getElementById("timerbox").style.backgroundImage = "url('../attributes/img/coins.gif ')";
        }
    });
    

    resetBtn.addEventListener('click' , function(){
        //reset de tijd van de timer
        watch.reset();
        timer.textContent = '00 : 00 : 00';
    });
    
    saveBtn.addEventListener('click' , function(){
        console.log('click');
        //save de besteede tijd aan de taak in de database
        watch.save();
    
    });
  }

  //verander timer afbeelding
  function changeTimerImg(hetid){
    let discid = 'd' + hetid;
    let disc = document.getElementById(discid);
    // set pad naar logo voor veranderen van logo timer
    let imgpad = disc.style.backgroundImage;
    document.getElementById("timerlogo").style.backgroundImage = imgpad;
  }

  //set naam van de opdrachtgever
  function GetOpdrachtgeverName(hetid){
    let nameid = 'n' + hetid;
    let name = document.getElementById(nameid);
    let getname = name.innerText;
    return getname;
  }

  //toon de volgende stap voor het opgeven van de taak beschijfing
  function nextStapTask(){
    let element = document.getElementById("opdrachtgever");
    element.innerHTML = getname;
    var yourUl = document.getElementById("selecteer-beschijfing");
    yourUl.style.display = 'block';
    var yourUl = document.getElementById("selecteer-opdrachtgever");
    yourUl.style.display = 'none';
  }

  //zet de taak die word uitgevoerd bij de timer
  function showTaskDiscription(){
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
