


// var duration_time = 1000;
var TTL = -50;
var target_size = null;

var check_interval = 10;





function load(data) {
    console.log(data);

    var duration_time = data.duration_time;
    var number_of_targets = data.number_of_targets;
    target_size = data.target_size;
    TTL = number_of_targets * duration_time;
    console.log(duration_time);

    // document.getElementById("dot").addEventListener("click", onClickDot);
    document.getElementById("playArea").addEventListener("click", onClickOut);


    for (i = 1; i < number_of_targets; i++) {
        setTimeout(createElement, duration_time * i);
    }

    setInterval(function () {
        var els = document.getElementsByClassName("dot");

        Array.prototype.forEach.call(els, function(element) {
            mili = element.getAttribute('milisec');
            if (mili <= 0) {
                display(element);
            } else {
                if (mili <= 1000) {
                    element.style.backgroundColor = "rgb(169, 169, 169)";
                }
                element.setAttribute('milisec', mili - check_interval);
            }
        })
    }, check_interval);

}

// document.addEventListener("DOMContentLoaded", function() {
//     // Retrieve URL parameters
//     const urlParams = new URLSearchParams(window.location.search);
//     const number_of_targets = parseInt(urlParams.get('number_of_targets')) || 5; // Default value: 5
//     const duration_time = parseInt(urlParams.get('duration_time')) || 500; // Default value: 500
//     const check_interval = parseInt(urlParams.get('check_interval')) || 500; // Default value: 500
//     const TTL = number_of_targets * duration_time;

//     // Call load() function with retrieved parameters
//     load(number_of_targets, duration_time, check_interval, TTL);
// });

function createElement() {
    dot = document.createElement("span");
    // dot.setAttribute("id", "x/" + i)
    dot.setAttribute("class", "dot");
    dot.addEventListener("click", onClickDot);

    document.getElementById("playArea").appendChild(dot);

    display(dot);
}

var clicks = 0;
var misClicks = 0;

function onClickOut(event) {
    event.stopPropagation();

    misClicks += 1;
    numberOfClicks(misClicks, "Errors", "misclick");
}

function onClickDot(event) {
    console.log(event);
    // event.srcElement.style.backgroundColor = "red";

    event.stopPropagation();


    event.srcElement.style.display = 'none';
    clicks += 1;

    numberOfClicks(clicks, "Count", "count");

    display(event.srcElement);
}

function display(element) {
    let top = Math.floor(Math.random() * 575);
    let left = Math.floor(Math.random() * 575);

    element.setAttribute("milisec", TTL);

    element.style.left = `${top}px`;
    element.style.top =  `${left}px`;
    element.style.display = "inline-block";
    element.style.height = `${target_size}px`;
    element.style.width = `${target_size}px`;
    element.style.animation = 'growDot 0.5s ease-in';
    // element.setAttribute("click", "ok");

    element.style.backgroundColor = "rgb(129, 133, 137)";
}

function numberOfClicks(number, text, element){

    document.getElementById(element).textContent = `${text}: ${number}`;

}

function rest() {

    const dbParam = JSON.stringify({"limit":5});
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      myObj = JSON.parse(this.responseText);
      let text = "";
      for (let x in myObj) {
        text += myObj[x].name + "<br>";
      }
      document.getElementById("test").innerHTML = text;
    }
    xmlhttp.open("POST", "./private/view.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);


    // Yaj.get(
    //   './private/view_rest.php' + window.location.search,
    //   null,
    //   function (data) {
    //       load(JSON.parse(data));
    //   }
    // );
}
document.addEventListener("DOMContentLoaded", rest);
