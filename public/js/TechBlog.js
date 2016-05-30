    function showElement(layer){
        var myLayer = document.getElementById(layer);
        if(myLayer.style.display=="none"){
            myLayer.style.display="block";
            myLayer.backgroundPosition="top";
        } else { 
            myLayer.style.display="none";
        }
    }
    
    function show(state){
        document.getElementById('window').style.display = state;			
        document.getElementById('wrap').style.display = state; 			
    }
    
    $(':password').keyup(function(){
        var pas1 = $('#fi5');
        var pas2 = $('#fi6');
        if (pas1.val() == pas2.val()) {
            pas2.next().replaceWith('<span></span>');
        } else {
            pas2.next().replaceWith('<span id="xxx"><strong></strong></span>');
        }
    });
    $('input[name=capcha]').change(function(){
        var capcha = $(this);
        if (capcha.val() === "55102") {
          capcha.next().replaceWith('<span></span>');
        } else {
          capcha.next().replaceWith('<span id="xxx"><strong>Неправильное число</strong> </span>');
        }
    });
   