const express = require('express');
const bodyParser = require('body-parser');
const session = require('express-session');
const bcrypt = require('bcrypt'); // You may want to use bcrypt for password hashing
const app = express();
const port = 5000;

app.use(bodyParser.json());
app.use(session({ secret: 'your_secret', resave: false, saveUninitialized: true }));

// Mock user database with hashed password
const users = [
    { email: "emmanueljerry707@gmail.com", password: bcrypt.hashSync("1445", 10) } // Example hashed password
];

app.post('/login', (req, res) => {
    const { email, password } = req.body;
    const user = users.find(u => u.email === email);
    
    if (user && bcrypt.compareSync(password, user.password)) {
        req.session.authenticated = true; // Save user session
        res.json({ success: true });
    } else {
        res.json({ success: false, message: "Invalid email or password" });
    }
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
