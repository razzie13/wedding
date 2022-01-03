let countDownDate = new Date("Jul 23, 2022 16:00:00")

let x = setInterval(() => {
    let now = new Date().getTime()
    let distance = countDownDate - now
    
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("date").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
})




