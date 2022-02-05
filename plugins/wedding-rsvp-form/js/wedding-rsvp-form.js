const chooseToAttend = () => {
    console.log('function chooseToAttend')
        document.getElementById('rsvp-attending').classList.remove('hide');
        document.getElementById('rsvp-attending').classList.add('show');
        document.getElementById('rsvp-not-attending').classList.remove('show');
        document.getElementById('rsvp-not-attending').classList.add('hide');
}

const chooseNotToAttend = () => {
    console.log('function chooseNotToAttend')
        document.getElementById('rsvp-not-attending').classList.remove('hide')
        document.getElementById('rsvp-not-attending').classList.add('show');
        document.getElementById('rsvp-attending').classList.remove('show');
        document.getElementById('rsvp-attending').classList.add('hide');
}