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

let n = 0;
let setup = 0;



function loadTimer(){
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
    toggelBtn.addEventListener('click', function(){
        if (watch[n].isCounting){
            watch[n].stop();
            toggelBtn.textContent = 'Start';
            document.getElementById("timerbox").style.backgroundImage = "url('../attributes/img/loding.gif')";
        } else {
            watch[n].start();
            toggelBtn.textContent = 'Pauze';
            document.getElementById("timerbox").style.backgroundImage = "url('../attributes/img/coins.gif ')";
        }
    });
    

    resetBtn.addEventListener('click' , function(){
        //reset de tijd van de timer
        watch[n].reset();
        timer.textContent = '00 : 00 : 00';
    });
    
    saveBtn.addEventListener('click' , function(){
        console.log('click');
        //save de besteede tijd aan de taak in de database
        watch[n].save();
    
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


//   window.onload = function(){
//     uren = document.getElementById("uren-tabel");
//     aside.innerHTML="<img src='loadingImage.gif'>";
//     if(XMLHttpRequest) var x = new XMLHttpRequest();
//     else var x = new ActiveXObject("Microsoft.XMLHTTP");
//     x.open("GET", "other_content_1.php", true);
//     x.send();
//     x.onreadystatechange = function(){
//         if(x.readyState == 4){
//             if(x.status == 200) aside.innerHTML = x.responseText;
//             else aside.innerHTML = "Error loading document";
//             }
//         }
//     }
        let harlaadtabel = document.getElementById('herlaadtabel');
        harlaadtabel.addEventListener('click', loadingtabel);

        function loadingtabel(){
            console.log('ladan landcdnkdf');
            herlaadTabel(3);
        }

        function herlaadTabel(opdrid){
        console.log('herladen tabel');
        let uren = document.getElementById("uren-tabel");
        let params = "&opdrid="+ opdrid;
        
        console.log(params);
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'process2.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
        xhr.onload = function(){
          console.log(this.responseText);
          if(xhr.status == 200){
            uren.innerHTML = this.responseText;
          } else {
           aside.innerHTML = "Error loading document";
        }
    }
  
        xhr.send(params);

      };

      function addOpdrachtgever() {

            console.log('trying to add');
            var form = document.querySelector('form');
            var data = new FormData(form);
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'process3.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      
            xhr.onload = function(){
              console.log(this.responseText);
            }
      
            xhr.send(data);
            this.reset();
      }