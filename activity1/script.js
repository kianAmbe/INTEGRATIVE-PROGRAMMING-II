document.addEventListener('DOMContentLoaded', function() {
    const registrationForm = document.getElementById('registrationForm');

    registrationForm.addEventListener('submit', function(e) {
        e.preventDefault();

      
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

     
        const user = {
            username: username,
            email: email,
            password: password
        };

       
        localStorage.setItem('user', JSON.stringify(user));

       
        registrationForm.reset();

        
        alert('Registration successful!');

     
        console.log(JSON.parse(localStorage.getItem('user')));
    });
});
