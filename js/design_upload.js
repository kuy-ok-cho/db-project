$(document).ready(function(){

  let fileTarget = $(".uploadHidden");

  fileTarget.on('change', function(){
    let filename;
    if(window.FileReader){
      filename = $(this)[0].files[0].name;
    } else {
      filename = $(this).val().split('/').pop().split('\\').pop();
    }

    $(this).siblings('.uploadName').val(filename);
  });

  $("#mainImage").on("change", img1FileSelect);
  $("#subImage").on("change", img2FileSelect);
  $("#thumImage").on("change", thumbFileSelect);

});

//img1FileSelect function(){
let img1FileSelect = function(event){
  let input = event.target;
  let reader = new FileReader();

  reader.onload = function(){
    let dataURL = reader.result;
    let output = document.getElementById("img1");
    output.src=dataURL;
  };
  reader.readAsDataURL(input.files[0]);
}

//img2FileSelect function(){
  let img2FileSelect = function(event){
    let input = event.target;
    let reader = new FileReader();
  
    reader.onload = function(){
      let dataURL = reader.result;
      let output = document.getElementById("img2");
      output.src=dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  }

//thumbFileSelect function(){
  let thumbFileSelect = function(event){
    let input = event.target;
    let reader = new FileReader();
  
    reader.onload = function(){
      let dataURL = reader.result;
      let output = document.getElementById("thumb");
      output.src=dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  }