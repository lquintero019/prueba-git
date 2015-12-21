$(document).ready(function(){
       
          var pos=0;
          var elementos =  $('div').find('.elemento');
          var bullet_slider = $('.bullets').find('.bullet_off');
         // var despla= $slideUp();
          
        setInterval(function(){
              
             
             if (pos==elementos.length-3 || pos == elementos.length-2){
                 elementos[pos].className='elemento';
                 elementos[pos+1].className='elemento visible';

                 bullet_slider[pos].className='bullet_off';
                 bullet_slider[pos+1].className= 'bullet_off bullet_active';
                 pos++;

             }else{
                
                elementos[pos].className='elemento';
                elementos[0].className='elemento visible';

                bullet_slider[pos].className='bullet_off';
                bullet_slider[0].className='bullet_off bullet_active';

                pos=0;

             }

          },2000);
       $('#anterior').click(function()
       {
        
          
           if (pos==0){
              
              elementos[0].className='elemento';
              elementos[elementos.length-1].className='elemento visible';
              bullet_slider[0].className='bullet_off';
              bullet_slider[bullet_slider.length-1].className='bullet_off bullet_active';
 
              pos=elementos.length-1;

           }else{
            
               elementos[pos].className='elemento';
               elementos[pos-1].className='elemento visible';
               bullet_slider[pos].className='bullet_off';
               bullet_slider[pos-1].className='bullet_off bullet_active';
               pos--;
            }



       });   
       $('#siguiente').click(function()
       {     
            
             if(pos==elementos.length-1){
               

                elementos[elementos.length-1].className='elemento';
              
                console.log($('elemento').slideUp());
                elementos[0].className='elemento visible';
                bullet_slider[bullet_slider.length-1].className='bullet_off';
                bullet_slider[0].className='bullet_off bullet_active';
                pos=0;
             }else{
                 elementos[pos].className='elemento';
                elementos[pos+1].className='elemento visible';
                bullet_slider[pos].className='bullet_off';
               bullet_slider[pos+1].className='bullet_off bullet_active';
                 pos++; 
             }
                    
       });

});