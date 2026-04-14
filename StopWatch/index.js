const display = document.getElementById("display");

let timer = null;
let startTime = 0;
let elapsedTime = 0;
let isRunning = false;

//This will be the variable that I will use to calculate the total time and display it in the Study Statistics
let totalTime = 0;

function start(){
    if(!isRunning){
        startTime = Date.now() - elapsedTime;
        timer = setInterval(update, 10); //Call the update function every 10 miliseconds
        isRunning = true;
    }
    //Now to check if it is running, then the stopwatch will be paused.
}

function stop(){
    //Check to see if it's running

    if(isRunning){
        clearInterval(timer); //Stop it from running
        elapsedTime = Date.now() - startTime;
        isRunning = false;
    }
}

function reset(){
    //Copy everything we have from when we initially assigned these variables
    clearInterval(timer);
    startTime = 0;
    elapsedTime = 0;
    isRunning = false;
    display.textContent = "00:00:00:00";

    //NEED TO FIGURE OUT A WAY TO SAVE ALL THE TIME THAT PEOPLE STUDIED SO THAT I CAN DISPLAY IT
}

//Updates the display
function update(){
    const currentTime = Date.now(); //What is the date rn?
    elapsedTime = currentTime - startTime;

    //Convert Elapsed time to a readable format

    let hours = Math.floor(elapsedTime / (1000 * 60 * 60));
    let minutes = Math.floor(elapsedTime / (1000 * 60) % 60);
    let seconds = Math.floor(elapsedTime / 1000 % 60);
    let miliseconds = Math.floor(elapsedTime % 1000 / 10);

    //Adding some padding (zeros) by converting into strings
    hours = String(hours).padStart(2,"0");
    minutes = String(minutes).padStart(2,"0");
    seconds = String(seconds).padStart(2,"0");
    miliseconds = String(miliseconds).padStart(2,"0");

    totalTime += hours + minutes + seconds + miliseconds; //Adding it up in total

    display.textContent = `${hours}:${minutes}:${seconds}:${miliseconds}`;
}