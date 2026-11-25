
<?php require "header.html"; ?>

<h1>Smart IVR - Portal Access Request</h1>

<form action="request.php" method="post">

    <label for="mobile">Mobile Number</label>
    <input
        type="text"
        name="mobile"
        id="mobile"
        placeholder="01712345678"
        required
    >

    <button type="submit">Request Portal Access</button>

</form>

<?php require "footer.html"; ?>
