// Set the date we're counting down to
var countDownDate = new Date("Jun 11, 2022 15:37:25").getTime();
var counter = document.querySelector("#countDown"); // the timer
const win = document.querySelector("#winner"); // show winner button

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  counter.innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    counter.innerHTML = "You are late";

    win.style.display = 'block'; // show the show-winner button
  }
}, 1000);











var myModal = new bootstrap.Modal(document.getElementById('modal'), {
  keyboard: false
})

// show the winner in the modal
win.addEventListener('click',function(){
  
  setTimeout(function(){
    myModal.show();
  },1000)
  
});





