
   $.ajax({
    type: 'POST',
    url: 'ajax.php',
    data:{},
    success: function (data) {
      var arr = JSON.parse(data);
     console.log(arr);
   }
    });
    var divs = document.getElementById("box");
    var contents = document.querySelector(".content");
    for (let i = 1; i < 13; i++) {
      var btns = document.createElement("button");
      btns.innerHTML = i + "月";
      divs.appendChild(btns);
      btns.addEventListener("click", btnClick);
    }

    function btnClick(e) {
     
      contents.style.display = "block";
      var s_height = document.body.offsetHeight;
      // alert(s_height);
      contents.style.height = "310px";
      var inhtmls = e.target.innerHTML;
      var l = inhtmls.length - 1;
      var m = parseInt(inhtmls.substr(0, l));
      var me = divs.children[m - 1];
      me.style.backgroundColor = "#9eebeb";
      
      for (let j = 1; j < 13; j++) {
        if (j != m) {
          divs.children[j - 1].style.backgroundColor = "";
        }
      }
      if(m == 10){
        var totalDays = [
          {d:9,t:90+40},
        ];
      
      for(let k = 0;k<totalDays.length; k++){
        var lis = document.createElement("li");
        var lili = document.querySelector('li');
        // console.log(lili);
        if(lili == null){
          lis.innerHTML = totalDays[k].d + "号" + "&nbsp;&nbsp;&nbsp;overtime:"+ totalDays[k].t + "分钟" ;
          contents.appendChild(lis);
        }else{return;}
       
      }
      }
    }
    // function getVal(value) {
    //   iptVal = value;
    //   localStorage.setItem("setDays",iptVal);
    // }
    
    // var iptVals = localStorage.getItem("setDays");
     
      
    // function iptClick() {
    //   var lis = document.createElement("li");
    //   lis.innerHTML = iptVal + "号";
    //   contents.appendChild(lis);
    // }
   
//     $.ajax({
//     type: 'POST',
//     url: 'ajax.php',
//     data:{},
//     success: function (data) {
//      console.log(data);
//    }
//     });
//   function showHint()
// {
//     var xmlhttp=new XMLHttpRequest();
//      xmlhttp.onreadystatechange = function(){
//        if (xmlhttp.readyState==4 && xmlhttp.status==200)
//       {
//         document.getElementById("cs").innerHTML=xmlhttp.responseText;
//       }
//   }
//     xmlhttp.open("POST","ajax.php");
//     xmlhttp.send();
// }
// showHint();
  