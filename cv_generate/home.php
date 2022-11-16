<?php include 'header.php';?>


<body>
	<div id="form_container">
		<form class="container text-center p-5  " id="resumeform" class="resume" action="build.php" method="post">
		

    <h2> BUILD YOUR CV .. </h2>
<div id="form_resume" class="justify-content-center align-content-center">

    <div class="input-group d-inline-flex p-2 mb-3">
  <span  class="input-group-text"  style="font-size:20px;">First and last name</span>
  <input type="text"  aria-label="First name" class="form-control" name="full_name" value="">
  <input type="text" aria-label="Last name" class="form-control" name="lname" value="">
</div>
<div class="input-group p-2 mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">email</span>
  <input type="email" class="form-control"  name="email" placeholder="e.g.esteemed@gmail.com" value=""><br>

</div>
<div class="input-group p-2 mb-3">
  <span class="input-group-text" id="inputGroup-sizing-default">Phone Number</span>
  <input type="number" class="form-control" name="phonenumber"  value=""><br>

</div>

<div class="form-floating p-2 mb-3" >
  <textarea class="form-control" placeholder="Leave a comment here" name="floatingTextarea"></textarea>
  <label for="floatingTextarea">Give your career objective in few words</label>
</div>

<div class="input-group d-inline-flex p-2 mb-3">
  <span  class="input-group-text"  style="font-size:20px;">Enter the Degree name in which you are studying</span>
  <input type="text"   class="form-control" name="feild" value="">
</div>
<div class="input-group d-inline-flex p-2 mb-3">
  <span  class="input-group-text"  style="font-size:20px;">Enter the university name </span>
  <input type="text"   class="form-control" name="uni_name" value="">
</div>


<div class="input-group d-inline-flex p-2 mb-3">
  <span  class="input-group-text"  style="font-size:20px;">Enter your experience </span>
  <input type="text"   class="form-control" name="experience" value="">
  <input type="text"   class="form-control" name="experience2" value="">
  <input type="text"   class="form-control" name="experience3" value="">
  <input type="text"   class="form-control" name="experience4" value="">

</div>

</div>

<input id="saveForm" class="buttons" type="submit" name="submit" value="Submit" />
			
			
		
		</form>



<?php include 'footer.php';?>