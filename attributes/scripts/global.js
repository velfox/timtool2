console.log('global script is loaded');

var timer = document.getElementById('timer');
var toggelBtn = document.getElementById('toggel');
var resetBtn = document.getElementById('reset-timer');

var watch = new stopwacth(timer);

toggelBtn.addEventListener('click', function(){
    if (watch.isCounting){
        watch.stop();
        toggelBtn.textContent = 'start';
    } else {
        watch.start();
        toggelBtn.textContent = 'stop';
    }
});

resetBtn.addEventListener('click' , function(){
    watch.reset();
    timer.textContent = '00 : 00 . 000';
});