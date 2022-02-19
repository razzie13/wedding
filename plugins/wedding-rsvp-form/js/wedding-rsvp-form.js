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

const clickFormButtonOne = (e) => {

    console.log(e);
    document.getElementById('form-login').classList.remove('show');
    document.getElementById('form-login').classList.add('hide');
    document.getElementById('form-section-one').classList.remove('hide');
    document.getElementById('form-section-one').classList.add('show');
    document.getElementById('form-section-two').classList.remove('hide');
    document.getElementById('form-section-two').classList.add('show');
    document.getElementById('form-section-three').classList.remove('show');
    document.getElementById('form-section-three').classList.add('hide');
    document.getElementById('form-section-four').classList.remove('show');
    document.getElementById('form-section-four').classList.add('hide');
}

const clickFormButtonTwo = (e) => {

    console.log(e);
    document.getElementById('form-login').classList.remove('show');
    document.getElementById('form-login').classList.add('hide');
    document.getElementById('form-section-one').classList.remove('show');
    document.getElementById('form-section-one').classList.add('hide');
    document.getElementById('form-section-two').classList.remove('hide');
    document.getElementById('form-section-two').classList.add('show');
    document.getElementById('form-section-three').classList.remove('show');
    document.getElementById('form-section-three').classList.add('hide');
    document.getElementById('form-section-four').classList.remove('show');
    document.getElementById('form-section-four').classList.add('hide');
}

const clickFormButtonThree = (e) => {
    document.getElementById('form-login').classList.remove('show');
    document.getElementById('form-login').classList.add('hide');
    document.getElementById('form-section-one').classList.remove('show');
    document.getElementById('form-section-one').classList.add('hide');
    document.getElementById('form-section-two').classList.remove('show');
    document.getElementById('form-section-two').classList.add('hide');
    document.getElementById('form-section-three').classList.remove('hide');
    document.getElementById('form-section-three').classList.remove('show');
    document.getElementById('form-section-four').classList.remove('show');
    document.getElementById('form-section-four').classList.add('hide');
}

const clickFormBackButtonThree = (e) => {

    console.log(e);
    document.getElementById('form-login').classList.remove('show');
    document.getElementById('form-login').classList.add('hide');
    document.getElementById('form-section-one').classList.remove('show');
    document.getElementById('form-section-one').classList.add('hide');
    document.getElementById('form-section-two').classList.remove('hide');
    document.getElementById('form-section-two').classList.add('show');
    document.getElementById('form-section-three').classList.remove('show');
    document.getElementById('form-section-three').classList.add('hide');
    document.getElementById('form-section-four').classList.remove('show');
    document.getElementById('form-section-four').classList.add('hide');
}

const clickFormBackButtonFour = (e) => {

    console.log(e);
    document.getElementById('form-login').classList.remove('show');
    document.getElementById('form-login').classList.add('hide');
    document.getElementById('form-section-one').classList.remove('show');
    document.getElementById('form-section-one').classList.add('hide');
    document.getElementById('form-section-two').classList.remove('show');
    document.getElementById('form-section-two').classList.add('hide');
    document.getElementById('form-section-three').classList.remove('hide');
    document.getElementById('form-section-three').classList.add('show');
    document.getElementById('form-section-four').classList.remove('show');
    document.getElementById('form-section-four').classList.add('hide');
}

const validatePostalOrZipCode = () =>  {
    if (document.getElementById('postcode') == undefined || document.getElementById('postcode').length < 5)  {
        document.getElementById('postcode').disabled = true;
    }
}



const resetPostalZipField = () =>  {
    document.getElementById('postcode').innerText = '';
}