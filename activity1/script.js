document.addEventListener('DOMContentLoaded', function() {
    const registrationForm = document.getElementById('registrationForm');

    registrationForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Get user input
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Create user object
        const user = {
            username: username,
            email: email,
            password: password
        };

        // Store user data in local storage
        localStorage.setItem('user', JSON.stringify(user));

        // Clear the form
        registrationForm.reset();

        // You can provide a confirmation message or redirect the user to another page
        alert('Registration successful!');

        // For demonstration purposes, you can log the user data to the console
        console.log(JSON.parse(localStorage.getItem('user')));
    });
});
