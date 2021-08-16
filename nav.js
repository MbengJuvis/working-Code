closeSidebar();
function openSidebar() {
    document.getElementById("mySidebar").style.display = "block";
}
function closeSidebar() {
    document.getElementById("mySidebar").style.display = "none";
}

var dropdown = document.getElementsByClassName("ju_dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}


    $('#faculty').change(function(){
        var val = document.getElementById('faculty').value;

        $('#dept').load("php/loadOption.php",{value : val},function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            console.log(responseTxt);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });


      });

        $("#courses").click(function(){
          

          var dept = document.getElementById('dept').value;
        var level = document.getElementById('level').value;

        $('#loadedCourses').load("php/getCourse.php",{deptName: dept , levelValue : level },function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            console.log(responseTxt);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });


      });

          $("#addtobank").click(function(){
          var dept = document.getElementById('dept').value;
        var level = document.getElementById('level').value;
        
        $('#registered').load("php/addtocourses.php",{deptName: dept , levelValue : level },function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success")
            alert("Course Added Succesfully");
          document.location.reload(true);
        if(statusTxt == "error")
            alert("Error: " + xhr.status + ": " + xhr.statusText);
    });


      });
               
                    
               
          
              $("#myCourses").click(function(){
                $('#registered').show();
              $('#registered').load("php/displayadded.php",function(responseTxt, statusTxt, xhr){
                  if(statusTxt == "success")
                      console.log(responseTxt);
                                       if(statusTxt == "error")
                      alert("Error: " + xhr.status + ": " + xhr.statusText);
              });
});
                $('.modalElement').click(function(){

                  $('#id01').show();
                });


$("tr").on("click","button" ,function() {
   var id=$(this).attr('value');
   var answer = confirm("You are about to delete a course, there by loosing it.Do you want to proceed anyway");

   if (answer == true) {
  $('#registered').load("php/dropCourse.php",{ID : id},function(responseTxt, statusTxt, xhr){
                  if(statusTxt == "success")
                      alert("Course was Succesfully Deleted");
                    document.location.reload(true);
                  if(statusTxt == "error")
                      alert("Error: " + xhr.status + ": " + xhr.statusText);
              });
} else {
  alert('Operation Aborted');
} 
});
