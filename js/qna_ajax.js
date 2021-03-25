$(function(){
  let url = "/gold/data/ajax/qna_ajax.php";
  $.get(
    url,
    {page:1},
    function(qna_data){
      $(".qnaList").html(qna_data);
    }
  ); 
});

let currentPage = 1;
let pageLength = $(".PgNum").length;
function getPage(no){
  let url = "/gold/data/ajax/qna_ajax.php";
  $(".PgNum").removeClass("active");
  $(".PgNum").eq(no-1).addClass("active");
  $.get(
    url,
    {page:no},
    function(qna_data){
      $(".qnaList").html(qna_data);
      currentPage = no;
    }
  ); 
}

function goNext(){
  if(currentPage == pageLength){
    getPage(pageLength);
  } else {
    getPage(currentPage + 1);
  }
}

function goPrev(){
  if(currentPage === 1){
    getPage(1);
  } else {
    getPage(currentPage - 1);
  }
}

function firstPage(){
  getPage(1);
}

function lastPage(){
  getPage(pageLength);
}

$(".PgNum").eq(0).trigger("click");