const faqs = document.querySelectorAll(".faq");

faqs.forEach(faq =>{
    faq.addEventListener("click" , ()=>{
        faq.classList.toggle("active");
    })
})


/* var counter = 1;

setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if(counter >4){
        counter =1;
    }
} , 5000);
 */
function submitForm() {
    // Collect form data
    var webUrlInput = $("#webUrlInput").val();
    if(webUrlInput == ""){
        $("#errorMsg").html("website URL cannot be empty.");
        $("#errorModal").modal("show");
        return;
    }else if(!isValidURL(webUrlInput)){
        $("#errorMsg").html("Pleae enter valid URL.");
        $("#errorModal").modal("show");
        return;
    }
    var formData = {
        url: webUrlInput,
    };

    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Perform AJAX request
    $.ajax({
        url: window.appConfig.apiUrl+'/front-api/downloadWeb', // Replace with your server URL
        type: 'POST',
        data: formData,
        success: function(response) {
            // Handle success
            setTimeout(function(){ 
                window.location.href = window.appConfig.baseUrl+'/preview/'+response.url;
            },5000) 
            
            console.log('Success:', response);
        },
        error: function(xhr, status, error) {
            // Handle error
            $("#errorMsg").html("Pleae enter valid URL.");
            $("#errorModal").modal("show");
            return;
          //  console.error('Error:', status, error);
        }
    });
}

function isValidURL(url) {
    // Regular expression to validate URL
    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    
    // Check if the URL matches the pattern and starts with "http://" or "https://"
    return !!pattern.test(url) && url.startsWith('http://') || url.startsWith('https://');
}
