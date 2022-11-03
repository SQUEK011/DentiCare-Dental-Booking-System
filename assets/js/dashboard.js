/*-----------Dashboard--------- */
//Functions 
var editDate = document.getElementById("editDate");
var editDateStatus = false;

function checkEditDate(event){
  var input = event.currentTarget;
  var selectDate = new Date(input.value);
  const today = new Date();

  if (selectDate < today){
    alert("Select a current or future from today");
    editDateStatus = false;
    return false;
  }else {
    editDateStatus = true;
    return true;
  }
}

function editClear(event){
  if (!editDateStatus){
    event.preventDefault();
  }
}

editDate.addEventListener("change",checkEditDate,false);

//Side bar
let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
        sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
