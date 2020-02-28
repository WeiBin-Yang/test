console.log("ddd");
const xhr = new XMLHttpRequest();
var file = "send.txt";
xhr.onreadystatechange = function(){
    if(xhr.readyState === 4 && xhr.status === 200){
        console.log("ddd");
        var receive_content = document.getElementById("receive_content");
        receive_content.value = xhr.responseText;
    }
}

xhr.open("GET",file,true);
xhr.send();

