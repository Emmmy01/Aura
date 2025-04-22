<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Catering Quote | MR SEE CHICKEN FOOD</title>
   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
</head>
<style>
    /* General Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Form Container */
.container {
    background: #fff;
    width: 90%;
    max-width: 500px;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    animation: fadeIn 0.5s ease-in-out;
    margin-top:220px;
}

h2 {
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

p {
    font-size: 14px;
    color: #777;
    margin-bottom: 20px;
}

/* Form Fields */
.form-group {
    margin-bottom: 15px;
    text-align: left;
}

label {
    display: block;
    font-weight: 400;
    margin-bottom: 5px;
    color: #555;
}

input, textarea, select {
    width: 94%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    transition: all 0.3s ease;
}

input:focus, textarea:focus, select:focus {
    border-color: #FFD700;
    outline: none;
    box-shadow: 0 0 5px #FFD700;
}

textarea {
    resize: vertical;
    height: 80px;
}

/* Submit Button */
.submit-btn {
    background: #FFD700;
    color: #fff;
    border: none;
    padding: 12px;
    font-size: 16px;
    width: 100%;
    cursor: pointer;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.submit-btn:hover {
    background: #FFD700;
}

/* Success Popup */
.popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 300px;
}

.popup-content p {
    font-size: 16px;
    margin-bottom: 10px;
}

.popup-content button {
    background:#FFD700;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
}

.popup-content button:hover {
    background: #FFD700;
}

/* Fade In Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

</style>
<body>

    <div class="container">
        <h2>Request a Catering Quote</h2>
        <p>Fill out the form below, and we'll get back to you with a quote for your event.</p>
        
        <form id="quoteForm">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" name="phone" required>
            </div>

            <div class="form-group">
                <label for="event_type">Event Type:</label>
                <select name="event_type" required>
                    <option value="Wedding">Wedding</option>
                    <option value="Birthday">Birthday</option>
                    <option value="Corporate">Corporate Event</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="form-group">
                <label for="guests">Number of Guests:</label>
                <input type="number" name="guests" required>
            </div>

            <div class="form-group">
                <label for="preferred_dishes">Preferred Dishes:</label>
                <textarea name="preferred_dishes" required></textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="date" name="event_date" required>
            </div>

            <div class="form-group">
                <label for="special_requests">Special Requests:</label>
                <textarea name="special_requests"></textarea>
            </div>

            <button type="submit" class="submit-btn">Request Quote</button>
        </form>
    </div>

    <!-- Success Popup -->
    <div id="successPopup" class="popup">
        <div class="popup-content">
            <p>✅ Your catering quote request has been sent successfully!</p>
            <button onclick="closePopup()">OK</button>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#quoteForm").submit(function (event) {
                event.preventDefault(); // Prevent page reload
                
                $.ajax({
                    url: "submit_quote.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (response) {
                        $("#successPopup").fadeIn();
                        $("#quoteForm")[0].reset(); // Reset form after successful submission
                    },
                    error: function () {
                        alert("Error sending request. Please try again.");
                    }
                });
            });
        });

        function closePopup() {
            $("#successPopup").fadeOut();
        }
    </script>

</body>
</html>
