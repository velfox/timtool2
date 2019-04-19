console.log('stopwacth script loaded');

function stopwacth(display, clientName, clientId) {
    //setup variavles
    let time = 0;
    let interval;
    let offset;
    this.isCounting = false;

    console.log("new timer made for: " + clientName);

    //update the timer
    function update(){
        if (this.isCounting == true){
            time += timeCalculator();
            let formattedTime = timeFormat(time);
            display.textContent = formattedTime;
        }

    };

    // callculate the passed time
    function timeCalculator(){
        let now = Date.now();
        let timePassed = now - offset;
        offset = now;
        return timePassed;
    }

    //set the time to the good format
    function timeFormat(timeInMs){
        let time = new Date(timeInMs);
        //  convert to sting to messure the length of time
        let houers = time.getUTCHours().toString();
        let minutes = time.getMinutes().toString();
        let seconds = time.getUTCSeconds().toString();
        let milliseconds = time.getMilliseconds().toString();

        // add exstra 0 if ther is only one number
        if (houers.length < 2){
            houers = '0' + houers;
        }

         // add exstra 0 if ther is only one number
        if (minutes.length < 2){
            minutes = '0' + minutes; 
        }

         // add exstra 0 if ther is only one number
        if (seconds.length < 2){
            seconds = '0' + seconds; 
        }

        return houers + ' : ' + minutes + ' : ' + seconds;
    }

    // gives back the time the timer is on
    function lastTimeStatus(){
        let formattedTime = timeFormat(time);
            return formattedTime;
        }

    // start the timer counting
    this.start = function(){
        console.log('Timer is starting!');
        if(!this.isCounting){
            interval = setInterval(update.bind(this), 10);
            offset = Date.now();
            this.isCounting = true;
        }
    };

    // stop the timer loop from counting
    this.stop = function(){
        if(this.isCounting) {
            clearInterval(interval);
            interval = null;
            this.isCounting = false;
        }
        console.log('Timer is stoping!');
    };

    // reset the timer
    this.reset = function(){
        console.log('Timer is reseting!');
        time = 0;
    };

    // save the current time of the timer object to the database and reset the timer
    this.save = function(){
        console.log('Timer time saveing');
        let timep = lastTimeStatus();
        let task = document.getElementById("taskd").innerHTML;
        let params = "time="+ timep + "&name="+ clientName + "&disk="+ task + "&opdrachtgeverid="+ clientId;
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'process.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
        xhr.onload = function(){
          console.log(this.responseText);
        }
  
        xhr.send(params);

        // reset timer 
        this.reset();

        // reloud times in hours overvieuw
        ReloudingloadingTabel();
      };
};




