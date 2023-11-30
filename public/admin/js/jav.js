
function checkbox(){  
    var ele=document.getElementsByName('sub');  
    let master = document.getElementById('master-checkbox');

    if(master.checked == true){
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox')  
                ele[i].checked=true;  
        }
    } else{
        var ele=document.getElementsByName('sub');  
            for(var i=0; i<ele.length; i++){  
                if(ele[i].type=='checkbox')  
                    ele[i].checked=false;  
                } 
    }
}

