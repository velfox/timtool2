console.log('stopwacth-loaded');

function stopwacth(display, getname, hetid) {
    let time = 0;
    let userid = 1;
    let opdrid = hetid;
    let interval;
    let offset;
    this.isCounting = false;
    console.log("new timer made for: " + getname);

    function update(){
        if (this.isCounting == true){
            time += timeCalculator();
            let formattedTime = timeformat(time);
            display.textContent = formattedTime;
        }

    };
    function timeCalculator(){
        let now = Date.now();
        let timePassed = now - offset;
        offset = now;
        return timePassed;
    }


    function timeformat(timeInMs){
        let time = new Date(timeInMs);
        // zet de miliseconden om in munten en seconden convert to string om lengte te kunnen meten
        let houers = time.getUTCHours().toString();
        let minutes = time.getMinutes().toString();
        let seconds = time.getUTCSeconds().toString();
        let milliseconds = time.getMilliseconds().toString();

        if (houers.length < 2){
            houers = '0' + houers;
        }

        if (minutes.length < 2){
            minutes = '0' + minutes; 
        }
        console.log(minutes.length);

        if (seconds.length < 2){
            seconds = '0' + seconds; 
        }

        return houers + ' : ' + minutes + ' : ' + seconds;
    }

    function lasttime(){
        let formattedTime = timeformat(time);
            return formattedTime;
        }


    this.start = function(){
        console.log('Watch is starting!');
        if(!this.isCounting){
            interval = setInterval(update.bind(this), 10);
            offset = Date.now();
            this.isCounting = true;
        }
    };
    this.stop = function(){
        if(this.isCounting) {
            clearInterval(interval);
            interval = null;
            this.isCounting = false;
        }
        console.log('Watch is stoping!');
    };
    this.reset = function(){
        console.log('Watch is reseting!');
        time = 0;
    };

    this.save = function(){
        console.log('Watch is saved!');
        let timep = lasttime();
        console.log(timep);
        console.log(getname);
        let task = document.getElementById("taskd").innerHTML;
        let params = "time="+ timep + "&name="+ getname + "&disk="+ task + "&opdrachtgeverid="+ opdrid;
        console.log(params);
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'process.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
        xhr.onload = function(){
          console.log(this.responseText);
        }
  
        xhr.send(params);
        this.reset();
        loadingtabel();
        herlaadTabel(opdrid);
      };
};




