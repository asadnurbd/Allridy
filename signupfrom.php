
<?php
	session_start();
	error_reporting("E-NOTICE");
?>

<form method="post">
  <table>
    <tr>
      <td><h3>Full Name:</h3></td>
      <td><input type="text" name="fname" required></td>
    </tr>
    <tr>
      <td><h3>Phone Number:</h3></td>
      <td><input type="text" name="phone" required></td>
    </tr>
    <tr>
      <td><h3>Email Address:</h3></td>
      <td><input type="email" name="email" required></td>
    </tr>
    <tr>
      <td><h3>Password:</h3></td>
      <td><input type="text" name="pass_no" required></td>
    </tr>
		<tr>
			<td><h3>NID:</h3></td>
			<td><input type="text" name="nid_no" required></td>
		</tr>
    <tr>
      <td><h3>Gender:</h3></td>
      <td>
        <select name="gender">
          <option> <h4>Select Gender</h4> </option>
          <option> Male</option>
          <option> Female </option>
        </select>
      </td>
    </tr>
    <tr>
      <td><h3>Location:</h3></td>
      <td><input type="text" name="location" required></td>
    </tr>
    <tr>
      <td colspan="2" style="text-align:right"><input type="submit" name="save" value="Submit Details"></td>
    </tr>
  </table>
</form>
