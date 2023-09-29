<footer>
    <div>une application faîte à la patte par &copy;Zours 2023</div>
</footer>
</body>


<script>


    var item_click=document.getElementsByClassName('item-click');
    var tabi = Array.from(item_click);
    var show_pdf=document.getElementById('show-pdf');

    console.log(tabi);
    tabi.forEach(function(item){
        item.addEventListener('click',function(){

            show_pdf.innerHTML='';
           

            // Create a new iframe element
            const iframe = document.createElement("iframe");
            var chemin=item.getAttribute('value');
            console.log(chemin[0]);
            // Set the attributes for the iframe
            iframe.src = "/mvc2/res/tunePdf/"+item.getAttribute('value')+'.pdf'; // Replace with the URL you want to embed
            iframe.width = "500"; // Set the desired width
            iframe.height = "700"; // Set the desired height

            // Append the iframe to the container
            show_pdf.appendChild(iframe);

            
        })
    })
</script>
</html>