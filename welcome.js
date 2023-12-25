
function openForm() 
{
    document.getElementById("myForm").style.display = "block";
}
function closeForm() 
{
    document.getElementById("myForm").style.display = "none";
}   

function openStoryForm() 
{
    document.getElementById("postform").style.display = "block";
}

function closeStoryForm() 
{
    document.getElementById("postform").style.display = "none";
} 

function like() 
{
    document.getElementById("like").style.fill = "#ff006a";
    if(document.getElementById("like").style.fill = "#ff006a")
    {
        document.getElementById("dislike").style.fill = "#ffffff55";    
    }

}
function dislike() 
{
    document.getElementById("dislike").style.fill = "#ff006a";
    if(document.getElementById("dislike").style.fill = "#ff006a")
    {
        document.getElementById("like").style.fill = "#ffffff55";    
    }
}

let text="";
  function fun1() 
  {
    let d1=document.getElementById("d1")
    text=d1.innerText;
    d1.innerText="Logout";
  }
  function fun2()
  {
    let d1=document.getElementById("d1")
    let tempText=d1.innerText
    d1.innerText=text;
    text=tempText;
  }
