<form action="add_address._con.php" method="POST">
    <label>Full Name</label>
    <input type="text" name="full_name" required>

    <label>Phone Number</label>
    <input type="text" name="phone" required>

    <label>Address</label>
    <textarea name="address" required></textarea>

    <label>City</label>
    <input type="text" name="city" required>

    <label>State</label>
    <input type="text" name="state" required>

    <label>Postal Code</label>
    <input type="text" name="postal_code" required>

    <label>Set as Default</label>
    <input type="checkbox" name="is_default">

    <button type="submit">Save Address</button>
</form>
