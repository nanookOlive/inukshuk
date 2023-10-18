<footer>
    <div>une application faîte à la patte par &copy;Zours 2023</div>
</footer>
</body>


<script>


    var item_click=document.getElementsByClassName('item-click');
    var tabi = Array.from(item_click);
    var show_pdf=document.getElementById('show-pdf');
    var show_pdf_mobile=document.getElementsByClassName('show-pdf-mobile');

    tabi.forEach(function(item){

        item.addEventListener('click',function(){

            const iframe = document.createElement("iframe");
            var chemin=item.getAttribute('value');

            // Set the attributes for the iframe
            iframe.src = "/mvc2/res/tunePdf/"+item.getAttribute('value')+'.pdf'; // Replace with the URL you want to embed
          

            // Append the iframe to the container
          

            if(window.getComputedStyle(show_pdf).display === 'block'){

            show_pdf.innerHTML='';
            // Create a new iframe element
            
            show_pdf.appendChild(iframe);}

           else{

            var tune = document.getElementById(item.getAttribute('value'));

            Array.from(show_pdf_mobile).forEach(function(element){
                element.innerHTML='';
            });

            //trying to set an id for the iframe to set width value in app.css
            //iframe.width="360";
            iframe.setAttribute("id",'iframe');
            tune.children[1].appendChild(iframe);
            
           }

        
            
            
        });
    })
</script>
</html>