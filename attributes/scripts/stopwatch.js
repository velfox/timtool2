console.log('stopwacth-loaded');

function stopwacth(display) {
    var time = 0;
    var interval;
    var offset;
    this.isCounting = false;


    function update(){
        if (this.isCounting == true){
            time += timeCalculator();
            var formattedTime = timeformat(time);
            display.textContent = formattedTime;
        }

    };
    function timeCalculator(){
        var now = Date.now();
        var timePassed = now - offset;
        offset = now;
        return timePassed;
    }


    function timeformat(timeInMs){
        var time = new Date(timeInMs);
        // zet de miliseconden om in munten en seconden convert to string om lengte te kunnen meten
        var minutes = time.getMinutes().toString();
        var seconds = time.getUTCSeconds().toString();
        var milliseconds = time.getMilliseconds().toString();

        if (minutes.length < 2){
            minutes = '0' + minutes; 
        }

        if (seconds.length < 2){
            seconds = '0' + seconds; 
        }

        while (milliseconds.length < 3){
            milliseconds = '0' +milliseconds;
        }

        return minutes + ' : ' + seconds + ' . ' + milliseconds;
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
}

