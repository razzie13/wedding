const chooseToAttend = () => {
    console.log('function chooseToAttend')
        document.getElementById('email-attend-input-section').classList.remove('hide');
        document.getElementById('email-attend-input-section').classList.add('show');
}

const chooseNotToAttend = () => {
    console.log('function chooseNotToAttend')
        document.getElementById('email-attend-input-section').classList.remove('show');
        document.getElementById('email-attend-input-section').classList.add('hide');
}