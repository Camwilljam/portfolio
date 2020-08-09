<!-- TO DO!!! ADD LINKS TO THE DROP DOWN BOX-->
<form name="form" method="post">
	<fieldset>
		<label for="startDate">Assignment Start Date:</label>
		<input type="date" name="endDate" required>
		
		<label for="endDate">Assignment End Date:</label>
		<input type="date" name="endDate" required>
	</fieldset>
	
	<fieldset>
		<label for="type">Assignment Type:</label>
		<select name="type" id="type">
			<option value="0">Select Assignment Type</option>  
			<option value="1">Essay</option>    
			<option value="2">Report</option>
			<option value="3">Dissertation</option>
			<option value="4">Presentation</option>
			<option value="5">Reflection</option>
			<option value="6">Lab Report</option>
		</select>
	</fieldset>
	<input type="submit" name="submit" value="Plan Assignment">
</form>	
<script>
function message() {
		
		var t = document.getElementById('type');
			
			if(t.value == 0)
			{
				alert("Please choose an assignement type")
			}
</script>